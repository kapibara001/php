<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function actionWithUser(Request $request) {
        if (Auth::check() && $request->has('doing')) {
            $action = $request->input('doing');
            $user = $request->input('userrname');
            $message = '';

            $userinDB = User::where('username', $user)->first();

            if ($userinDB) {
                if($action) {
                    switch ($action) {
                        case 'delete':
                            if ($user == Auth::user()->username) {
                                return redirect('/users')->with('error', 'Ошибка. Удалить Вас может только другой администратор.');
                            };
    
                            $userinDB->delete();
                            break;

                        case 'block':
                            $userinDB->userstatus = 'block';
                            $userinDB->save();
                            break;

                        case 'unblock':

                            break;
                        }

                    
                    return redirect('/users')->with('success', $message);

                } else {
                    return redirect('/users')->with('error', 'Ошибка. Нет аутентификации или не выбрано действие.');
                }
            }
        }
    }
}