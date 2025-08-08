<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FindController;

Route::get('/', [FindController::class, 'clickSearchBtn'])->name('clickBtn');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
