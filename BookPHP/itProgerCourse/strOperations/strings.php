<?php
{
    $str = "Hello";
    
    // Измерить длину строки - strlen(наша строка);
    $lenght = strlen((string)$str);
    echo "Длина строки \"$str\": $lenght<br>"; // Длина строки "Hello": 5
}

{
    // Удалить все строки до и после нащей строки - trim(строка);
    $str = "               Hello!              <br>";
    echo trim($str); // Hello!
}

{
    // Перевести строку в строчные/заглавные буквы - strtolower/strtoupper
    $mystr = "ItS mAxImaL Hard StRiNg";

    echo strtolower($mystr) . "<br>" . strtoupper($mystr) . "<br>"; // its maximal hard string
                                                                                    // ITS MAXIMAL HARD STRING
}

{
    // Комбинации
    $mystr = "         ItS mAxImaL Hard StRiNg<br>";

    echo trim(strtolower($mystr)); // Удаление пробелов + перевод в нижний регистр
}

{
    // Чтобы закешировать информацию(пароли и прочее) - md5
    $mypswd = "24102006";
    echo md5($mypswd) ." - Это мой пароль через хэширование md5<br>";
}

?>