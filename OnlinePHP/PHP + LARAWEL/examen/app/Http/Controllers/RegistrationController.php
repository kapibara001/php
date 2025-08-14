<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrationController extends Controller {
    public function indentification(Request $request) {
        $request->validate(
        [ // Установка правил
            'name' => 'required|min:3|max:20',
            'password' => 'required|min:8',
        ], 
        [
            'name.required' => 'Введите имя',
            'name.min' => 'Имя должно быть длинее 3 символов',
            'name.max' => 'Имя не может быть длинее 20 символов',
            
            'password.required' => 'Введите пароль',
            'password.min' => 'Пароль не может быть короче 8 символов',
        ]);

        return view('checkuser', [
            'name' => $request->input('name'), 'password' => $request->input('password')
        ]);
    }
}