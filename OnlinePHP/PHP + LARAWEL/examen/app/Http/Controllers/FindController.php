<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class FindController extends Controller {
    public function clickSearchBtn(Request $request) {
        $question = Null;

        if ($request->has('NameInstruction') && trim($request->input('NameInstruction')) != '') {
            // Обработка из базы данных...
            $question = 'Инструкция по запросу: ' . $request->input('NameInstruction');

            return view('page', ['question' => $question]);
        } 

        return view('page', ['question' => $question]); 
    }
}