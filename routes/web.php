<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClienteProductoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Blog
Route::resource('blog', BlogController::class);

// Admin Blog
Route::patch('/blog/{id}/restore', [BlogController::class, 'restore'])->name('blog.restore');

//Admin Productos
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('productos', ProductoController::class);
});

// Cliente Productos
Route::get('/productos', [ClienteProductoController::class, 'index'])->name('cliente.productos.index');

// Mostrar un producto
Route::get('/productos/{producto}', [ClienteProductoController::class, 'show'])->name('cliente.productos.show');

//Crear un producto con autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
