<?php 
 
// Для того, чтобы ловить данные, нужные для обработки в контроллере, можно применить Request из файла Illuminate\Http\Request

namespace app\Http\Controllers;
use App\Http\Controllers\Controller;

use Dom\Document;
use Illuminate\Http\Request; // Обработка input-полей и других http полей
use NumberFormatter; // Помощь в переводе в буквенный формат


class HomeWorkController extends Controller {
    public function toHWPage() {
        return view('homework');
    }

    public function toFirstHW() {
        $numbers_list = [];

        for ($i = 0; $i < 10; $i++) {
            $num = rand(-100, 100);
            $numbers_list[] = $num;
        }
 
        return view('homework.firstHW', ['numbers_list' => $numbers_list]);
    }

    public function toSecondHW(Request $request) {
        $result = null;

        if ($request->has('nums')) {
            $user_num = $request->input('nums');
            
            if (is_numeric($user_num)) {
                $formatter = new NumberFormatter('ru', NumberFormatter::SPELLOUT);

                $result = $formatter->format($user_num);
            } else {
                $result = "Ошибка в вычислении";
            }
        }

        return view('homework.secondHW', ['result' => $result]);
    }

    // --------------------- #3
    public function toThirdHW(Request $request) {
        $readyDiv = null;

        if ($request->has('StartGeneration')) {
            if ($request->has('pointCount')) {
                $readyDiv = $this->createDivs($request->input('pointCount'));
            } else {
                $readyDiv = $this->createDivs();
            }
        }
        
        return view('homework.thirdHW', ['readyDiv' => $readyDiv]);
    }

    public function createDivs($count = 10, $html = '') {
        if ($count <= 0) {
            return "<div style='width: 300px; height: 300px; border: 1px solid black; margin-top: 10px; position: relative'>$html</div>";
        }

        $randw = rand(0, 270) . "px";
        $randh = rand(0, 270) . "px";

        $html .= "<div style='width: 30px; height: 30px; background-color: blue; position: absolute; top: {$randh}; left: {$randw}'></div>";

        return $this->createDivs($count - 1, $html);
    }

    // -------------------- #4 
}