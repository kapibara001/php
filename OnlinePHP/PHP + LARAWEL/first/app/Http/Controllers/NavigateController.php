<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class NavigateController extends Controller {
    public function toAbout() {
        return view('pages.about');
    }

    public function toContact() {
        return view('pages.contact');
    }

    public function toBucket() {
        return view('pages.bucket');
    }
}