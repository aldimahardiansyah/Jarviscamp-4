<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PustakawanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route untuk menampilkan data pustakawan
Route::get('/pustakawan', [PustakawanController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    // Get all resources
    Route::get('/books', [BookController::class, 'index']);

    // Add resource
    Route::post('/books', [BookController::class, 'store']);

    // Get detail resource
    Route::get('/books/{id}', [BookController::class, 'show']);

    // Edit resource
    Route::put('/books/{id}', [BookController::class, 'update']);

    // Delete Resource
    Route::delete('/books/{id}', [BookController::class, 'destroy']);

    // Search resource by title
    Route::get('/books/search/{title}', [BookController::class, 'search']);
});

// Register
Route::post('/register', [AuthController::class, 'register']);

// Login
Route::post('/login', [AuthController::class, 'login']);
