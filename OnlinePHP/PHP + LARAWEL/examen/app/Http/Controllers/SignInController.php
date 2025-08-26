<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SignInController extends Controller {
    public function signin(Request $request) {
        if ($request->has('name') && $request->has('password')) {
            $request->validate([ // Установка правил
                'name' => 'required',
                'password' => 'required',
                // 'reCAPTCHA' => 'required',
            ]);
        }

        $user = User::where('username', $request->name)->first();

        if (!$user) {
            return redirect()->back()->with('logininfo', 'Такого пользователя не существует. Зарегистрируйтесь или попробуйте снова!');
        } else {
            if (!Hash::check($request->password, $user->userpass)) {
                return redirect()->back()->with('logininfo', "Неверный пароль. Попробуйте снова!");
            }
        }

        if ($user->userstatus == 'block') {
            return redirect('/')->with('logininfo', 'Вы заблокированы за нарушение правил.');
        } else {
            Auth::login($user);
            return redirect('/')->with('logininfo', "Вы успешно авторизовались!");
        }

        
    }
}