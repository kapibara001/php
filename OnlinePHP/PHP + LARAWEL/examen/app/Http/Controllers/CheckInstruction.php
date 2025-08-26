<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\newInstruction;


class CheckInstruction extends Controller {
    public function openNewInsts() {
        $instructions = newInstruction::all();
        
        return view('checkinstructions', ["instructions" => $instructions]);
    }

    public function checkNewInstruction(Request $request) {
        if (!Auth::check()) {
            return redirect('/')->with('logininfo', 'Пользователь не авторизован.');
        } 

        $validated = $request->validate([
            'uploaded_user' => 'required',
            'instructionFile' => 'required|file|mimes:pdf',
            'instructionName' => 'required',
            'instructionDescription' => 'required',
        ]);

        $binaryData = file_get_contents($request->file('instructionFile')->getRealPath());

        newInstruction::create([
            "uploaded_user" => $validated['uploaded_user'],
            "instName" => $validated['instructionName'],
            "userDescription" => $validated['instructionDescription'],
            "file" => $binaryData,
        ]);

        return redirect('/')->with('logininfo', 'Инструкция предложена и уже проходит модерацию. Ожидайте!');
    }
}