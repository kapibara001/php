<?php
/* ДО ОБНОВЛЕНИЯ ДО PHP8
class newRecord 
{
    public string $username;
    public string $email;

    public function __construct(
        string $username,
        string $email,
    ) {
        $this->username = $username;
        $this->email = $email;
        echo "$username $email";
    }
}
$new_user = new newRecord(username: "Rob", email: "1234@mail.ru");
*/


/* После обновы PHP8
$new_user = new newRecord("rob", "1234");
class newRecord
{
    public function __construct(
        public string $username,
        public string $email,
    ) {
        echo "$username $email";
    }
}
*/


/*          strpos, str_contains, str_starts_with - для обнаружения  чего-то в строке.
if (strpos("Once upon a time", "Once") !== false) {
    echo "Found";
}
if (str_contains("Once upon  a time", "Once")) { # str_contains чувствителен к регистру, поэтому желательно к обоим параметрам функции применить strtolower
    echo "Found!";
}
if (str_starts_with("In my mind", "In")) { # тоже чувствтелен к регистру. Желателен strtolower()
    echo "Found";
*/

/*
if (!function_exists("str_contains")) {
    function str_contains(string $heystack, string $needle): bool {
        return $needle || strpos($heystack, $needle) !== false;
    }
}
*/













?>