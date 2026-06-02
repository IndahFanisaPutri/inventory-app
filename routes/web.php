<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController; 

// Route Public
Route::get('/', function () {
    return view('home');
})->name('home');

// Route::get('/products', [ProductController::class, 'index']);
// Route::resource('products', ProductController::class);
// Route::get('/insert', [ProductController::class, 'insert']);
// Route::get('/update/{id}', [ProductController::class, 'update']);
// Route::get('/delete/{id}', [ProductController::class, 'delete']);
// Route::get('/create', [ProductController::class, 'create']);
// Route::post('/store', [ProductController::class, 'store']);
// Route::get('/edit', [ProductController::class, 'edit']);
// Route::get('/destroy', [ProductController::class, 'destroy']);

// // Route::resource otomatis akan membuat 7 rute CRUD standar (index,
// //create,
// // store, show, edit, update, destroy) ke dalam aplikasi.
// Route::resource('categories', CategoryController::class);

Route::middleware(['auth.manual'])->group(function () {
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/create', [ProductController::class, 'create']);
    // ... route lainnya 
});

// Route untuk autentikasi (tidak memerlukan login) 
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); 
Route::post('/login', [AuthController::class, 'login'])->name('login.process'); 
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 

// Route Terproteksi (hanya bisa diakses jika sudah login)
Route::middleware(['auth.manual'])->group(function () { 
 
    // Route yang dapat diakses oleh semua pengguna yang sudah login 
    Route::get('/products', [ProductController::class, 'index']) 
        ->name('products.index'); 
    Route::get('/categories', [CategoryController::class, 'index']) 
        ->name('categories.index'); 
 
    // Route yang hanya dapat diakses oleh admin 
    Route::middleware(['role:admin'])->group(function () { 
 
        // CRUD Produk (khusus admin) 
        Route::get('/products/create', [ProductController::class, 'create']) 
            ->name('products.create'); 
        Route::post('/products', [ProductController::class, 'store']) 
            ->name('products.store'); 
        Route::get('/products/{product}/edit', [ProductController::class, 'edit']) 
            ->name('products.edit'); 
        Route::put('/products/{product}', [ProductController::class, 'update']) 
            ->name('products.update'); 
        Route::delete('/products/{product}', [ProductController::class, 'destroy']) 
            ->name('products.destroy'); 
 
        // CRUD Kategori (khusus admin) 
        Route::get('/categories/create', [CategoryController::class, 'create']) 
            ->name('categories.create'); 
        Route::post('/categories', [CategoryController::class, 'store']) 
            ->name('categories.store'); 
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit']) 
            ->name('categories.edit'); 
        Route::put('/categories/{category}', [CategoryController::class, 'update']) 
            ->name('categories.update'); 
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy']) 
            ->name('categories.destroy'); 
    }); 
}); 