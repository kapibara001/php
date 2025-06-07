<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class AdminController extends Controller {
    public function toAdminPage() {
        return view('adminPage');
    }
}