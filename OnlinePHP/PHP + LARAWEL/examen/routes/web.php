<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FindController;

Route::get('/', [FindController::class, 'clickSearchBtn'])->name('clickBtn');
Route::post('/check', [RegistrationController::class, 'indentification'])->name('identification');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
