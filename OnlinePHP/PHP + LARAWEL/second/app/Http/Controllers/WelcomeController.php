<?php 

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller {
    public function toWelcome(){
        return view('welcome');
    }
}