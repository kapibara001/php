<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('app');

Route::get('/products', [ProductController::class, 'toProducts']) -> name('Продукты'); 

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
