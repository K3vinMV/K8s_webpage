<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas temporales
Route::get('/productos', function () {
    return 'Lista de productos';
})->name('productos.index');

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