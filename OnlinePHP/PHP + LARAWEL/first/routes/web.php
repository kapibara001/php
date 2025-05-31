<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () { // Главная страница пока что 
    return "Hello";
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});


// _____________________________________________________ Мои эксперементики
Route::get('/home', function () {
    return "Hello World!"; 
});

Route::get('/test', function() {
    return view('test'); // Обращение к файлу views внутри команды view и получение оттуда разметки в файле test.blade.php
});

Route::get('/Auth', function() {
    return view('myFolder.auth');
});

Route::get('/Arrays', function() {
    return view('forArrays', [
        "role"=>"admin", // Если удалим, будет выведена разметка "Обратитесь к админам"
        "first_name"=>"Maxim",
        "last_name"=>"Sokolov",
        "message"=>"Hello world!",
        "age"=>"18",
        "db"=> [
            "dbname"=>"Sakila",
            "port"=>5555,
        ]
    ]);
});


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
