<?php 
 
// Для того, чтобы ловить данные, нужные для обработки в контроллере, можно применить Request из файла Illuminate\Http\Request

namespace app\Http\Controllers;
use App\Http\Controllers\Controller;

use Dom\Document;
use finfo;
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

    public function toFourth() {
        $db = [
            [
                'name' => 'Iphone 16 pro',
                'color' => 'black',
                'size' => '256GB',
                'price' => '$1300',
                'image' => 'https://a66.ru/catalogue/1209/18023_large.jpeg?1745824689',
            ],
            [
                'name' => 'Samsung S25 Ultra',
                'color' => 'black',
                'size' => '512GB',
                'price' => '$1200',
                'image' => 'https://a66.ru/catalogue/1306/19186_large.jpeg?1745833696',
            ],
            [
                'name' => 'Google Pixel 9',
                'color' => 'black',
                'size' => '256GB',
                'price' => '$720',
                'image' => 'https://a66.ru/catalogue/1220/18224_large.jpeg?1741449109',
            ],
            [
                'name' => 'Iphone 15 pro',
                'color' => 'white',
                'size' => '512GB',
                'price' => '$980',
                'image' => 'https://a66.ru/catalogue/1011/15016_large.jpeg',
            ],
        ];

        $readyDivs = $this->createDivsPhones($db, count($db));

        return view('homework.fourthHW', ['readyDivs' => $readyDivs]);
    }

    public function createDivsPhones($dbase, $count, $html = '') {
        for($i = 0; $i < $count; $i++) {
            $im = $dbase[$i]['image'];
            $name = $dbase[$i]['name'];
            $color = $dbase[$i]['color'];
            $size = $dbase[$i]['size'];
            $price = $dbase[$i]['price'];

            $html .=    "<div class\"maincont\" style=\"padding: 10px; border: 1px solid black; border-radius: 20px;\">
                            <div class=\"imgclass\" style=\"display: flex; justify-content: center; height: 200px\">
                                <img src=\"$im\">
                            </div>
                            <div class=\"parameters\" style=\"width=100%; margin-top: 10px\">
                                <p style=\"font-size: 25px; margin: 0\"><b>Price</b>: $price</p>
                                <p style=\"font-size: 25px; margin: 0\"><b>$name</b></p>
                                <p style=\"font-size: 25px; margin: 0\"><b>Color</b>: $color</p>
                                <p style=\"font-size: 25px; margin: 0\"><b>Size</b>: $size</p>
                            </div>
                            <button style=\"width: 100%; height: 50px; border-radius: 20px; font-size: 20px; background-color: green; margin-top: 10px; color: white; border: none\">В корзину</button>
                        </div>";
        }

        return $html;
    }
}