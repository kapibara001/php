<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeWorkController;

Route::get("/", [WelcomeController::class, 'toWelcome'])->name('welcomePage');

Route::get('/homework', [HomeWorkController::class, 'toHWPage'])->name('pageWithAllHW');

Route::get('/homework/fistHW', [HomeWorkController::class, 'toFirstHW'])->name('First'); // Имя нужно чтобы обратиться к функции внутри action(передать аргумент, просто зайти в эту функцию в других файлах)
Route::get('/homework/secondHW', [HomeWorkController::class, 'toSecondHW'])->name('Second'); 
Route::get('/homework/thirdHW', [HomeWorkController::class, 'toThirdHW'])->name('Third');
Route::get('/homework/fourth', [HomeWorkController::class, 'toFourth'])->name('Fourth');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
