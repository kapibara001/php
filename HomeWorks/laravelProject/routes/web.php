<?php

use Carbon\Traits\Rounding;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('app');

Route::get('/products', [ProductController::class, 'toProducts']) -> name('Продукты'); 
Route::get('/adminPanel', [AdminController::class, 'toAdminPage']) -> name('АКТИВНОСТЬ АДМИНА');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
