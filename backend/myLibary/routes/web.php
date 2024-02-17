<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing_page.index');
});

Route::get('/login', function () {
    return view('auth.login_page');
});

Route::get('/all_books', function () {
    return view('admin.all_books');
});

Route::get('/categories', function () {
    return view('admin.categories_books');
});
