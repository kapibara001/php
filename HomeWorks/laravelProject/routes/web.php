<?php
/**
 * 1. Обозначение (ссылка на страницу в разметке - <a href='ссылка на разметку'></a>)
 * 2. Подтверждение адреса и того, что на нем что-то вообще есть (Route::get(адрес, откуда брать инфу))
 * 3. Наполнение страницы в файле контроллера
 * 4. Создание страницы на основе передеанных из контроллера данных
 */
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
