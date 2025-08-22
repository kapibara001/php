<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FindController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\ReportController;

Route::get('/', [FindController::class, 'clickSearchBtn'])->name('clickBtn');
Route::post('/registration', [RegistrationController::class, 'indentification'])->name('identification');
Route::post('/signin', [SignInController::class, 'signin'])->name('signin');

Route::get('/reports', [ReportController::class, 'moderateReports']);
Route::post('/forReportCheck', [ReportController::class, 'reportCheck'])->name('reportCheck');

Route::get('/users', [UsersController::class, 'userList'])->name('userList');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
