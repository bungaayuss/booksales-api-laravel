<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

// PUBLIC ROUTES (tanpa login)
Route::apiResource('authors', AuthorController::class)->only(['index', 'show']);
Route::apiResource('genres', GenreController::class)->only(['index', 'show']);
Route::apiResource('books', BookController::class)->only(['index', 'show']);

// ROUTES KHUSUS CUSTOMER (harus login)
Route::middleware(['auth:api', 'role:customer'])->group(function () {
    Route::apiResource('transactions', TransactionController::class)->only(['store', 'update', 'show']);
});

// ROUTES KHUSUS ADMIN (harus login + role admin)
Route::middleware(['auth:api', 'role:admin'])->group(function () {
    Route::apiResource('authors', AuthorController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('genres', GenreController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('books', BookController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('transactions', TransactionController::class)->only(['index', 'destroy']);
});