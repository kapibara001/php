<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FindController extends Controller
{
    public function clickSearchBtn(Request $request)
    {
        $instructions = [];
        $folder = base_path("public/storage/Instructions");
        $search = trim($request->input('NameInstruction'));

        if ($search !== '') {
            $files = scandir($folder);
            $search = strtolower($search);

            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..' && is_file($folder . '/' . $file)) {
                    if (str_contains(mb_strtolower($file), mb_strtolower($search))) {
                        $instructions[] = [
                            "filename" => $file,
                            "content" => file_get_contents($folder . '/' . $file),
                        ];
                    }
                }
            }
        } else {
            $search = null;
        }

        return view('page', [
            'instructions' => $instructions,
            'find' => $search
        ]);
    }
}