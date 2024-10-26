<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClienteProductoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('blog', BlogController::class);

Route::patch('/blog/{id}/restore', [BlogController::class, 'restore'])->name('blog.restore');

//Admin 
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('productos', ProductoController::class);
});

// Cliente
Route::get('/productos', [ClienteProductoController::class, 'index'])->name('cliente.productos.index');

Route::get('/productos/{producto}', [ClienteProductoController::class, 'show'])->name('cliente.productos.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
