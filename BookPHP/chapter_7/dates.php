<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //echo time(); # Время UNIX в секундах от 1 явнаря 1970 года
    //echo mktime(17, 0, 0, 10, 24, 2006); // отсчет в секундах от 01.01.1970 до моего др


    /*
    echo date("d.m.Y", time()); // использование библеотеки date()
    echo date(DATE_ATOM) . "<br>"; Формат для потока Atom. Являются константами по форме обозначения
    echo date(DATE_COOKIE) . "<br>";  Формат для cookie, принимаемый сервером или Js
    echo date(DATE_RSS) . "<br>"; 
    echo date(DATE_W3C);
    */


    /* Проверка возможности даты - checkdate()
    $day = 31;
    $month = 9;
    $year = 2000;
    if (checkdate($month, $day, $year)) {
        echo "Возможная дата!";
    } else {
        echo "невозможная дата!";
    }

    ?>
</body>
</html>
