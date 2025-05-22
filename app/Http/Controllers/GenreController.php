<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class GenreController extends Controller
{
    public function index(){
        $genres = Genre::all();
        
        if ($genres->isEmpty()){
        return response()->json([
            "succes" => true,
            "message" => "Resource Data Not Found"
        ], 200);
        }

        return response()->json([
            "succes" => true,
            "message" => "Get All Resource",
            "data" => $genres
        ], 200);
    }

    public function store(Request $request)
    {
        // 1. Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'description' => 'required|string',
        ]);

        // 2. Check Validator Error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        // 3. Insert Genre Data
        $genre = Genre::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // 4. Response
        return response()->json([
            'success' => true,
            'message' => 'Genre added successfully!',
            'data' => $genre
        ], 201);
    }

    public function show(string $id) {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
            'success'=> false,
            'message'=>'Resource not found'
        ], 404);
        }

        return response()->json([
            'success'=> true,
            'message'=>'Get detail resource',
            'data'=> $genre
        ], 200);
    }

    public function update(string $id, Request $request){
        // 1. Mencari data
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        // 2. Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // 3. Siapkan data yang ingin di-update
        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        // 4. Update data ke database
        $genre->update($data);

        // 5. Return response
        return response()->json([
            'success' => true,
            'message' => 'Genre updated successfully',
            'data' => $genre
        ], 200);
    }

    public function destroy(string $id) {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
            'success'=> false,
            'message'=>'Resource not found'
            ], 404);
        }

        $genre->delete();

        return response()->json([
            'success'=> true,
            'message'=>'Delete resource successfully'
        ], 200);
    }
}
