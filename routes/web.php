<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index']);
Route::resource('products', ProductController::class);
Route::get('/insert', [ProductController::class, 'insert']);
Route::get('/update/{id}', [ProductController::class, 'update']);
Route::get('/delete/{id}', [ProductController::class, 'delete']);
Route::get('/create', [ProductController::class, 'create']);
Route::post('/store', [ProductController::class, 'store']);
Route::get('/edit', [ProductController::class, 'edit']);
Route::get('/destroy', [ProductController::class, 'destroy']);