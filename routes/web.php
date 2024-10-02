<?php

use App\Http\Controllers\ClienteProductoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

//Route::resource('productos', ProductoController::class);

// Admin 
//Route::resource('admin/productos', ProductoController::class)->middleware('auth'); 

// Cliente
Route::get('/productos', [ClienteProductoController::class, 'index'])->name('productos.clientes');

// Rutas temporales

Route::get('/productos/tennis', function () {
    return 'Productos de Tennis';
})->name('productos.tennis');

Route::get('/productos/padel', function () {
    return 'Productos de Pádel';
})->name('productos.padel');

Route::get('/productos/accesorios', function () {
    return 'Accesorios';
})->name('productos.accesorios');

Route::get('/contacto', function () {
    return 'Página de contacto';
})->name('contacto');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
