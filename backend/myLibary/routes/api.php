<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BooksController;
use App\Http\Controllers\Api\BorrowBooksController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\ReturnBooksController;
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

// AUTH
Route::post("/registration", [AuthController::class, 'registration']);
Route::post("/login", [AuthController::class, 'login']);

Route::middleware(["auth:sanctum"])->group(function () {

    Route::middleware("isAdmin")->group(function () {
        // cat
        Route::post("/add_categories", [CategoriesController::class, 'store']);
        Route::put("/update_categories/{id}", [CategoriesController::class, 'update']);
        Route::delete("/delete_categories/{id}", [CategoriesController::class, 'destroy']);

        // books
        Route::post("/add_books", [BooksController::class, 'store']);
        Route::put("/update_books/{id}", [BooksController::class, 'update']);
        Route::delete("/delete_books/{id}", [BooksController::class, 'destroy']);

        // borrow
        Route::get("/data_borrow", [BorrowBooksController::class, 'index']);
    });

    // API CATEGORIES BOOKS
    Route::get("/data_categories", [CategoriesController::class, 'index']);
    Route::get("/show_idCategories/{id}", [CategoriesController::class, 'show']);

    // API BOOKS
    Route::get("/data_books", [BooksController::class, 'index']);
    Route::get("/show_idBooks/{id}", [BooksController::class, 'show']);

    // API BORROW BOOKs
    Route::post("/add_borrow_books", [BorrowBooksController::class, 'store']);
    Route::post("/list_borrow_byUser", [BorrowBooksController::class, 'list_borrow_byUser']);

    // API RETURN BOOKS
    Route::post("/add_return_books", [ReturnBooksController::class, 'store']);
});
