<?php

use App\Http\Controllers\Api\BooksController;
use App\Http\Controllers\Api\BorrowBooksController;
use App\Http\Controllers\Api\CategoriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API CATEGORIES BOOKS
Route::get("/data_categories", [CategoriesController::class, 'index']);
Route::post("/add_categories", [CategoriesController::class, 'store']);
Route::get("/show_idCategories/{id}", [CategoriesController::class, 'show']);
Route::put("/update_categories/{id}", [CategoriesController::class, 'update']);
Route::delete("/delete_categories/{id}", [CategoriesController::class, 'destroy']);

// API BOOKS
Route::get("/data_books", [BooksController::class, 'index']);
Route::post("/add_books", [BooksController::class, 'store']);
Route::get("/show_idBooks/{id}", [BooksController::class, 'show']);
Route::put("/update_books/{id}", [BooksController::class, 'update']);
Route::delete("/delete_books/{id}", [BooksController::class, 'destroy']);

// API BOOKS
Route::get("/data_borrow", [BorrowBooksController::class, 'index']);
Route::post("/add_borrow_books", [BorrowBooksController::class, 'store']);
Route::get("/show_idBooks/{id}", [BorrowBooksController::class, 'show']);
Route::put("/update_books/{id}", [BorrowBooksController::class, 'update']);
Route::delete("/delete_books/{id}", [BorrowBooksController::class, 'destroy']);
