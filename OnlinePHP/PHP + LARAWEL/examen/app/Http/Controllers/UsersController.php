<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use app\Models\User;

class UsersController extends Controller {
    public function userList() {
        if (Auth::check() && Auth::user()->userstatus === 'admin') {
            $users = User::all();

            return view('/users', ['users' => $users]);
        } else {
            return redirect('/');
        }
    }
}