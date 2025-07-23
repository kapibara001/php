<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FindController extends Controller{
    public function clickSearchBtn(Request $request)  {
        $instructions = [];
        $folder = base_path("app/Instructions");

        if ($request->has('NameInstruction') && trim($request->input('NameInstruction')) != '') {

            $files = scandir($folder);

            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..' && is_file($folder . '/' . $file)) {
                    $filenameForSearch = strtolower(trim($file));
                    $instructions[] = [
                        "filename" => $file,
                        // "content" => file_get_contents($folder . '/' . $file),

                        "filenameForSearch" => $filenameForSearch,
                    ];
                }
            }
        }

        return view('page', ['instructions' => $instructions]);
        
    }
}