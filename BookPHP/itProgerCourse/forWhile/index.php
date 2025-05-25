<?php 
{ // do .. while 
    $i = 100;
    do {
        echo $i . "\n"; // Просто добавило пробел
        $i--;
    } while ($i >= 50); // От 100 до 50


    $i2 = 100;
    do {
        echo $i2  . "\n";
        $i2--;
    } while ($i2 < 50); // Только 100. Произошло это потому, что "сначала сделал, потом подумал, и остановился"
    echo "<br>";
}

{ // for
    for ($i = 100; $i > 10; $i /= 2) {
        if ($i < 15) {
            echo "Конец<br>";
            break;
        } else if ($i % 2 == 0) {
            continue; // Просто пропус четного по значению элемента 
        } else {
            echo $i . "<br>";
        }
    }


    $mylist = [1, 6, 2, "same", "clowns"];
    for ($i = 0; $i < count($mylist); $i++) {
        echo $i+1 . ": " . $mylist[$i] ."<br>";
    }
}

{ // Ассоциативный массив и цикл "foreach"
    // ДАнный масив работает ТОЛЬКО с массивами(одномерными, многомерными, ассоциативными)
    $list = [
        "age" => 15,
        "name" => "Maxim",
    ];

    foreach($list as $values) { // Достаем только значения ключей
        echo "$values<br>"; // 15 Maxim - достали таким синтаксисом только значения
    };

    foreach ($list as $key => $value) { // разбитие массива $list на $key и $value (название говорит само за себя)
        echo "$key: $value<br>"; // age: 15 name: Maxim
    };


    $array = [1, 2, 6, 2, 8, 1];
    foreach ($array as $value) {
        echo $value."<br>";
    }
    foreach ($array as $key => $value) { // Вывод вместе с ИНДЕКСОМ значений 
        echo "$key: $value<br>";
    }
}
?>