<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::with(['user', 'book'])->get();

        if ($transactions->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Resource data not found',
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get All resources',
            'data' => $transactions
        ], 200);
    }

    public function store(Request $request){

        //1. Validasi Input
        $validator = Validator::make(request()->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        //2. Generate order number
        $uniqueCode = 'ORD-' . strtoupper(uniqid());

        //3. Ambil yang sedang login
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 401);
        }

        //4. Ambil data buku
        $book = Book::find($request->book_id);

        //5. Cek stok buku
        if ($book->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Stok tidak cukup',
            ], 400);
        }

        //6. Hitung total harga
        $totalAmount = $book->price * $request->quantity;
        
        //7. Kurangi stok buku
        $book->stock -= $request->quantity;
        $book->save();

        //8. Simpan transaksi
        $transaction = Transaction::create([
            'order_number' => $uniqueCode,
            'customer_id' => $user->id,
            'book_id' => $request->book_id,
            'total_amount' => $totalAmount,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaction created successfully',
            'data' => $transaction
        ], 201);
    }

    public function show($id){
        $transaction = Transaction::with(['user', 'book'])->find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'No transaction found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Transaction',
            'data' => $transaction
        ], 200);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'No transaction found',
            ], 404);
        }

        $data = Book::find($transaction->book_id);
        $newdata = Book::find($request->book_id);

        $data->stock += $transaction->quantity;
        $data->save();

        if ($newdata->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Stok tidak cukup',
            ], 400);
        }

        $newdata->stock -= $request->quantity;
        $newdata->save();

        $totalAmount = $newdata->price * $request->quantity;

        $transaction->update([
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'total_amount' => $totalAmount,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaction updated successfully',
            'data' => $transaction
        ]);
    }

    public function destroy($id){
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'No transaction found',
            ], 404);
        }

        $book = Book::find($transaction->book_id);
        $book->stock += $transaction->quantity;
        $book->save();

        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaction deleted successfully',
        ], 200);
    }
}
