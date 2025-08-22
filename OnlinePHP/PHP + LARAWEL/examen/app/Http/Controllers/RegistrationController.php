<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller {
    public function indentification(Request $request) {
        $validated = $request->validate(
        [ // Установка правил
            'name' => 'required|min:3|max:20',
            'password' => 'required|min:8',
            // 'reCAPTCHA' => 'required',
        ], 
        [
            'name.required' => 'Введите имя',
            'name.min' => 'Имя должно быть длинее 3 символов',
            'name.max' => 'Имя не может быть длинее 20 символов',
            
            'password.required' => 'Введите пароль',
            'password.min' => 'Пароль не может быть короче 8 символов',
        ]);

        if (!User::where('username', $validated['name'])->exists()) {

            if ($validated['name'] === 'admin') {
                User::create([
                    "username" => $validated['name'],
                    "userpass" => bcrypt($validated['password']), // Хэширование пароля
                    "userstatus" => "admin",
                ]);
            } else {
                User::create([
                    "username" => $validated['name'],
                    "userpass" => bcrypt($validated['password']), // Хэширование пароля
                    "userstatus" => "user",
                ]);
            }

            return redirect()->back()->with('registerinfo', "Пользователь зарегистрирован. Теперь войдите!");

        } else {
            return redirect()->back()->with('registerinfo', "Такой пользователь уже существует. Выполните вход.");
        }

    }
}