<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP ФАЙЛ</title>
</head>
<body> 
    <progress max="1000" value="410" style="bac"></progress>
    <?php


    define("STARTCALLS", "Hello student! That's your first project, CONGRATULATIONS!");
    $start = "Hello! My name is Maksim.";
    echo STARTCALLS . "<br>";
    echo $start . " Строка кода: " . __LINE__ . "<br>";
    echo "Путевое имя файла: " . __FILE__ . "<br>";
    echo "DIR: " . __DIR__ . "<br>";
    echo "Это файл: " . __FILE__ . ". Строка: " . __LINE__ . "<br>";

    $b = true;
    $b ? print "True" . "<br>" : print "false" . "<br>"; // команда справа от двоеточия выпорлняется при истине, слева - при лжи 

    $temp = "Data: ";
    echo $temp . datetime(time()) . "<br>";
    function datetime($time) {
        return date("l F jS Y", $time); 
    }
    
    global $TIMES;
    $TIMES = 15; // Правилом хорошего тона принято обозначать глобальные переменные ЗАГЛАВНЫМ регистром, как константы, только константы без $

    function test() {
        static $count = 0; // static объявляет то, что переменная будет становиться нулем только после перезапуска функции. Пока работает функция, счетчик будет увеличиваться
        echo $count . "<br>";
        $count++;
    }

    /*$came_from = htmlentities($_SERVER("HTTP_REFERRER")); // htmlentities нужно для безопасности. Преобразует все символы в элементы HTML("<" в "&lt") 
    echo $came_from;*/

    echo <<< _END
    Здесь будет
    приведен пример многострочного
    вывода<br>
    _END;


    function pr() {
        global $plus;
        $plus = true;

        return $plus ? "Положительный" . "<br>" : "Отрицательный" . "<br>" ;
    }

    echo pr();
    
    $tr = false; // Можно и в верхнем регистре, но нижний более надежен за счет того, что его нельзя переопределить
    $x = 15;
    $y = 3*(abs(2*$x)+4);

    if ($tr) { 
        echo "Выражение равно: " . $y . "<br>";
    } else {
        echo "Выражение недоступно<br>";
    }
    
    echo "TRUE: [" . TRUE . "]<br>"; // вывод будет [1]
    echo "FALSE: [" . FALSE . "]<br>"; // вывод будет []

    echo "20>9: [" . (20>9) . "]<br>";
    echo "1==0: [" . (1==0) . "]<br>";
    echo "1==1: [" . (1==1) . "]<br>";

    $daynumber = 355;
    $days_to_NY = 366 - $daynumber;

    if($days_to_NY < 30) {
        echo "Скоро новый год!<br>";
    } else {
        echo "Новый год еще не скоро :(<br>";
        $days = 'Is-al';
    }


    $true = true;
    $maybefalse = true;

    if ($true > $maybefalse) {
        echo "Больше<br>";
    } else {
        echo "ошибка кароч<br>";
    }

    echo "Ответ: " . (1000 !== '1000') . "<br>";

    $a = 0;
    $b = 1;

    echo ($a || $b) . "<br>";
    echo ($a and $b) . "sldf<br>";
    echo ($a xor $b) . "<br>";
    echo (!$a) . '!$a' . __LINE__ . "<br>";


    $bank_balance = 110;
    $savings = 0;

    if ($bank_balance < 110) {
        $zp = 1000;
        $bank_balance += $zp*0.99;
        echo "На ваш баланс зачислено $zp$, так как на вашем счете осталось менее 110$.<br>";
        echo " Баланс: $bank_balance.";
    } 
    else if($bank_balance == 110) {
        $bank_balance = 0;
        echo ("Хохохо, ты 110, глупи манке<br>");
    }
    else {
        $save = 50;
        $bank_balance -= $save;
        $savings += $save*0.99;
        echo "<br>50$ было отправлено на сберегательный счет. Баланс: $bank_balance.<br>";
    }


    $man = "Home";
    switch ($man) : #Можно использовать switch () {case "": ... break;}, можно switch(): case "": ... break; endswitch;
        case "Home":
            echo "Dayn<br>";
            break;
        case "Links":
            echo "Динаху<br>";
            break;
        endswitch;
    

    $fuel = 40; // Тернарный оператор ?
    echo $fuel <= 40 ? "Требуется дозаправка<br>" : "Бак полный<br>";
    $enough = $fuel <= 40 ? true : false; 
    echo $enough . "<br>";



    $arr = array(15, 7, 2, 6, 8, 1243, 45, 15,);
    $maxnum = $arr[0];

    for($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] > $maxnum) {
            $maxnum = $arr[$i];
        }
    }

    echo $maxnum ."<br>";



    $fuel = 10;
    while($fuel >= 1) {
        echo $fuel > 5 ? "Топлива еще достаточно.<br>" : "Топливо заканчивается! Осталось: $fuel г.<br>";
        $fuel -= 1;
    }
    echo "Топливо кончилось. Вызовите эвакуатор по номеру ...<br>";

    $count = 1;
    do {
        echo "$count*12 = " . $count*12;
        echo "<br>";
    } while (++$count <= 12);



    $a = 56;
    $b = 15;
    $c = $a/$b; // НЕЯВНОЕ ПРЕОБРАЗОВАНИЕ ТИПОВ т.к PHP сам определяет, что ему выводить, float или int

    echo intval($c) . "<br>"; // intval заменяет (int) $c
    echo (float) ($a/$b) . "<br>"; // указание типа в скобках определяет, что будет выведено. Это называется ЯВОЕ ПРЕОБРАЗОВАНИЕ ТИПОВ 



    // ФУНКЦИИ

    echo date("l") . "<br>"; // День недели
    //echo phpinfo() . "<br>"; // данные про установленный PHP
    echo strrev("Hello World!") . "<br>"; // Переворот строки
    echo str_repeat("Hop", 15) . "<br>";
    echo strtoupper("asd") . "<br>"; // Преобразование символов строки в верхний регистр(en)
    echo ucfirst("Прикол прикол прикол прикол" . "<br>"); // первая буква строки в верхний регистр
    echo ucfirst(strtolower("wefwQDWQdwefQeF")) . "<br>";


    echo fix_names();
    function fix_names() {
        $first_n = "WilLiaM";
        $second_n = "gatEs";
        $third_n = "aduTioN";

        return ucfirst(strtolower($first_n)) . " " . ucfirst(strtolower($second_n)) . " " . ucfirst(strtolower($third_n)) . "<br>";
    }

    $na = fix_names2("WilLiaM", "gatEs", "aduTioN");
    echo $na[0] ." ". $na[1] ." ". $na[2] . " " . $na[3] . "<br>";

    function fix_names2($f, $s, $th) {
        $n1 = ucfirst(strtolower($f));
        $n2 = ucfirst(strtolower($s));
        $n3 = ucfirst(strtolower($th));

        return array($n1, $n2, $n3, __LINE__);
    }



    $a1 = "Max";
    $a2 = "Obos";
    $a3 = "Igo";

    $info = al_names($a1, $a2, $a3,);
    echo $info[0] ." ". $info[1] ." ". $info[2] . "<br>";

    function al_names(&$fi, &$se2, &$th) {  // Использование ссылки
        $fi = ucfirst(strtolower($fi));
        $se2 = ucfirst(strtolower($se2));
        $th = ucfirst(strtolower($th));
        return array($fi, $se2, $th);
    }

    /*
    include("library.php"); // включить в код. Если файл не найдет, просто проигнорит, да и пофиг.
    include_once("library.php"); //нужно для того, чтобы включить один раз нужный файл в код, и игнорировать все последующие запросы. Иначе, при многократных
    // запросах будут возникать ошибки.
    // Робин Никсон рекомендует использовать include_once и избегать include.

    require("library.php"); // потребовать включить в код. Если файл не будет найден, выдаст ошибку
    require_once("library.php"); // Также рекомендуется использовать require_once("");
    */


    function_exists("ИМЯ ФУНКЦИИ"); // Проверка на наличие функции "ИМЯ ФУНКЦИИ" в коде, проверка на его доступность

    $func_name = "123";
    $phpver = phpversion();

    if (function_exists($func_name)) {
        echo "Функция \"$func_name\" доступна<br>";
    } else {
        echo "Функция \"$func_name\" недоступна, так как ваша версия PHP: $phpver.<br>";
    }
     

    $first = 5;
    if ($first > 10) {
        echo "Больше 10";
    }
    else if ($first > 24) {
        echo "Большое 24";
    } 
    else {
        echo "Даун!";
    }


    #_________________________

    











    ?>
</body>
</html>