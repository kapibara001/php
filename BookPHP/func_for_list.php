<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    /*
    $fred = array();
    echo is_array($fred) ? "Это массив!" : "Это не массив!"; // Проверка на массив 
    */

    

    /*
    $fred = array(
        array(15, 22), 
        array(5, 6, 1),
        array(235, "Hello"), 
    );
    echo count($fred) . "<br>"; // Количество элементов в массиве
    echo count($fred, 1) . "<br>"; // Количество элементов в МНОГОМЕРНОМ массиве
    */



    /*
    $cards = array("King", "6", "Tuz",);
    $text = explode(" ", "Это Предложение из 5 слов");//Позволяет взять строку, содержащую несколько элементов, отделенных друг от друга
                                                                        //одиночным символом, или строкой символов(первый аргумент в функции), а затем поместить каждый из символов в массив
    echo sort($cards) . "<br>";  // Сортировка возвращает TRUE при сортировке и FALSE при ошибках
    echo sort($cards, SORT_STRING) . "<br>"; // Предписывание только строковой сортировки. SORT_NUMERIC - числовой
    echo rsort($cards, SORT_STRING) . "<br>"; // Сортировка в обратном порядке - rsort
    shuffle($cards); // Случайное перемешение. Возвращает TRUE при сортировке и FALSE при ошибках
    foreach ($cards as $card) {
        echo $card ."<br>";
    }
    */



    /*
    extract($_GET); //При отправке данных веб-сервер данные из переменных добавляет в большой массив. 
                            //Сохранение отправленных значений в переменных
    extract($_GET, EXTR_PREFIX_ALL, 'fromget'); 
    // Для безопасности. В этом случае именна всех новых переменных будут начинаться с заданного строкового префикса, за которым следует символ подчеркивания,
    // В результате которого $q превратится в fromget_q
    */


    /*
    $fname = "Doctor";
    $sname = "Who";
    $planet = "Gallifrey";

    $contact = compact('fname', 'sname', 'planet'); // Противоположноть функции extract. extract разбивает все на переменные, а compact помещает их переменные и значения в ассоциативный список
    echo $contact['fname']; // compact нужны именно имена переменных, т.к функция ищет имя переменных, а не их значения;
    */



    /*
    $j = 23;
    $temp = "Hello";
    $address = "1 Old Street";
    $age = 61;

    print_r (compact((explode(' ', "j temp address age")))) ;
    */


    
    /*
    $array = [10, 20, 30, 40];
    $current = reset($array); // возвращает 10 и устанавливает указатель на первый элемент
    $last = end($array); // возвращает 40 и устанавливает указатель на последний элемент
    echo $current . " " . "$last";
    */



    

    ?>
</body>
</html>