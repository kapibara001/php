<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller {
    public function reportCheck(Request $request) {
        if ($request->has('reportName') && $request->has('reportText') && Auth::check()) {
            $validated = $request->validate(
                [
                    'reportName' => 'required|string|min:5|max:128',
                    'reportText' => 'required|string|min:5|max:512',
                ],
                [
                    'reportName.required' => 'Название инструкции обязательно.',
                    'reportName.string' => 'Название инструкции должно быть текстом.',
                    'reportName.max' => 'Название инструкции не должно превышать 255 символов.',
                    'reportText.required' => 'Текст жалобы обязателен.',
                    'reportText.string' => 'Текст жалобы должен быть текстом.',
                    'reportText.min' => 'Текст жалобы должен содержать минимум 10 символов.',
                ]
            );

            Report::create([
                'reportName' => $validated['reportName'],
                'reportText' => $validated['reportText'],
                'reportedUser' => $request->input('reportedUser'),
            ]);

            return redirect()->back()->with('success', 'Жалоба отправлена! Спасибо!');
        } else {
            return redirect('/')->with('logininfo', 'Сначала авторизуйтесь!');
        }
    }

    public function moderateReports() {
        if (Auth::check() && Auth::user()->userstatus === 'admin') { 
            $reports = Report::all();

            return view('reports', ["reports" => $reports]);
        } else {
            redirect('/');
        }
    }

}