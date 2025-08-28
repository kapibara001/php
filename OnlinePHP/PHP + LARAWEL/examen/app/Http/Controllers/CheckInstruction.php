<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\newInstruction;
use Storage;


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

    public function deleteorapove(Request $request) {
        if ($request->has('name') && $request->has('doing')) {
            $action = $request->input('doing');
            $fieldinDB = newInstruction::where('instName', $request->input('name'))->first();
            $message = '';

            if (!$fieldinDB) {
                return redirect('/checkinginstructions')->with('error', 'Инструкция не найдена.');
            }

            
            switch ($action) {
                case "delete":
                    $fieldinDB->delete();
                    $message .= 'Удалено.';
                    break;

                case "add":
                    $PDFfile = $fieldinDB->file;
                    $filename = $fieldinDB->instName;

                    if (Storage::disk('public')->exists('storage/Instructions/' . $filename)) {
                        $message .= 'Ошибка. Инструкция уже существует.';

                        return redirect('/checkinginstructions')->with('error', $message);
                    } 

                    Storage::disk('public')->put('storage/Instructions/' . $filename, $PDFfile);
                    $fieldinDB->delete();

                    $message .= $filename;
                    break;
            }

            return redirect('/checkinginstructions')->with('error', $message);
        } else {
            return redirect('/checkinginstructions')->with('error' ,'Ошибка. Не передано название инструкции или действие.');
        }
    }
}