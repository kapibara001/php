<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Document</title>
</head>
<body>
    <?php
    // Классы
    /*
    $object = new User(); // Создание класса
    print_r($object); echo "<br>";//Выдает на экран инфу, которая содержится в переменной

    $object->name = "Joe"; // Надо заметить, что перед именами свойств и методов при объявлении их знак $ не ставится 
    $object->email = "trostikshop@gmail.com";
    $object->password = "12345678";
    print_r($object); echo "<br>";

    $object->save_user();

    class User { // Правилом хорошего тона является помещать все конструкции(функции, классы и тп) ближе к концу файла
        public $name, $email, $password;

        function save_user() {
            echo "Код, предназначенный для выполнения программы";
        }
    */



    /*
    $object1 = new New_User();
    $object1->name = "Alice";
    $object1->pass = "mainmain@22222123";
    $object2 = clone $object1; // clone создает новый экзепляр класса и копирует значения свойств из исходного класса в новый экземпляр
    $object2->name = "Amy"; // Хоть я и не создавал свойство pass у object2, но оно унаследуется от object1 и будет равно 123

    //echo "Object1 name = " . $object1->name . ". Pass: " . $object1->pass .  ". Object2 name = " . $object2->name . ". Pass: " . $object1->pass . ". <br>"; // Если объект уже создан - то в качестве параметра он передается по ссылке
    echo print_r($object1) . "<br>";
    echo print_r($object2) . "<br>";

    class New_User {
        public $name, $pass;
    }
    */



    // Конструктор
    /*
    class User {
        function __construct($param1, $param2) { // Конструктору передается перечень аргументов и дальнейшая их инициализация
            // код конструктора
        }
    }
    */



    // Деструктор
    /*
    class User {
        function __destruct() {
            // Код деструктора. Выполнеяется в самый последний момент, в момент окончания работы класса, всех методов и тд
        }
    }
    */



    # $this 
    /*
    $object = new User;
    $object->password = "Secret";

    echo $object->get_password();

    class User {
        public $name, $password;
        function get_password() {
            return "Ваш пароль: " . $this->password; //$this — это зарезервированное ключевое слово в PHP, которое ссылается на вызывающий объект.
            
        }
    }
    */



    // Объявление констант в классах
    /*
    #Translate::lookup(); // Вызывает класс напрямую без предварительного создания экземпляра класса. Ниже написано то, что эта конструкция заменяет
    //$object = new Translate;
    //echo $object->lookup();

    class Translate {
        const ENGLISH = 0;
        const FRENCH = 1;
        const ITALIC = 2;
        const UNDERLINE = 3;

        static function lookup() {
            echo self::ITALIC; // Прямое обращение к константе ITALIC через self::
        }
    } // Константа после ее определения не может быть изменена
    */



    /*
    class Example {
        var $name = "Michael"; // Взаимозаменяемо с public. Все методы, свойства доступны во всем коде
        public $age = 15;
        protected $anyinfo = $usercount; // Все методы, свойства доступны только расширенным классам
        private function adimn() { // Все методы, свойства доступны только в этом классе и не могут быть унаследованы
            // admin() code there
        }
    }
    */



    /*
    User::pwd_string();
    User::start();

    class User {
        static function pwd_string() {  # Объявление статического метода означает то, что он вызывается при применении класса, то есть классом, а не объектом
            echo "Пожалуйста, введите ваш пароль<br>";  # Статический метод не имеет доступа к свойствам(переменным) объекта
        }
        static function start() {
            echo "Ваш пароль введен<br>";
        }
    */



    /*
    $temp = new Test;
    echo "Тест А: " . Test::$static_property . "<br>";
    echo "Tест B: " . $temp->get_sp() . "<br>";
    echo "Тест С: " . $temp->$static_property . "<br>"; # Выдает ошибку так как $static_property недоступно  переменной $temp
    class Test {
        public $norm = "Hello World!";
        static $static_property = "Это статическое свойство";
        function get_sp() {
            return self::$static_property; # Этим способом можно получить доступ в классе к статическому свойству или константе
        }
    }
    */



    /*
    $substatus = true;
    $user = new SubUser();
    $user->name = "Fred";
    $user->pass = "12345678";
    $user->views = 90000;
    $user->subtime = 196;
    if (!$substatus) {
        $user->start();
    } else {
        $user->start();
        $user->inf();
    }

    class User {
        public $name, $pass;
        function start() {
            echo "Name: " . $this->name . "<br>";
            echo "Password: " . $this->pass . "<br>";
        }
    }

    class SubUser extends User {
        public $views, $subtime;

        function inf() {
            echo "Views: " . $this->views . "<br>";
            echo "Subscribe: " . $this->subtime . "<br>";
        }
    }
    */



    /*
    $object = new Son;
    $object->test();
    $object->test2();
    class Dad {
        function test() {
            echo "[Class Dad]Я твой отец<br>";
        }
    }

    class Son extends Dad {
        function test() { # опять метод test() как в Dad, что же делать?
            echo "[Class Son]Я Люк<br>";
        }
        function test2() {
            parent::test(); # Благодаря parent:: мы как бы копируем метод test() из класса Dad потому что test() у нас уже присутвует в дочернем классе
        } # Если написать self:: 2 раза выведется "[Class Son]Я Люк<br>", т.к self:: работает только с текущим классом
    }
    */


     
    /* Массивы с числовой индексацией
    $paper[] = "Copier";  
    $paper[] = "Inkjet";
    $paper[] = "Laser";
    $paper[] = "Photo"; // Можно в скобки ставить индексы(0,1...), но PHP сам может заняться этим

    for ($j = 0; $j < 4; $j++) {
        echo "$j: $paper[$j]<br>";
    }

    print_r($paper); # Array ( [0] => Copier [1] => Inkjet [2] => Laser [3] => Photo )
    */



    /* Ассоциативные массивы
    $paper["copier"] = "Cpoier and Multipurpose<br>";
    $paper["inkjet"] = "Inkjet Printer";

    echo $paper["copier"];
    echo $paper["inkjet"];
    */



    /* Присваивание ассоциативных идентификаторов с помощью array();
    $p1 =array("Copier", "Inkjet", "Laser", "Photo");
    echo "Элемент массива p1: " . $p1[2] . "<br>";

    $p2 = array(                                            #Формат индекс => значение
                'copier' => "Cpoier and Multipurpose<br>",
                'inkjet' => "Inkjet Printer",
                'laser' => "Laser Printer",
    );
    echo "Элемент массива p2: " . $p2['copier'] . "<br>";           #!!!!!!!!!!!!!!!!!!!!!!!!!
    */



    /* foreach ($список as $ЭлементВнутриНего) 
    $paper = array("Copier", "Inkjet", "Laser", "Photo");
    $j = 0;

    foreach ($paper as $item) {
        ++$j;
        echo "$j: $item<br>";
    }
    // Действе foreach .. as .. заканчивается при проходе всего списка
    */



    /*   Конструкция foreach ($список as $имяиндекса => $значениеиндекса)
    $paper = array(
                'copier' => "Cpoier and Multipurpose<br>",
                'inkjet' => "Inkjet Printer",
                'laser' => "Laser Printer",);

    foreach ($paper as $item => $description) { // $paper["Ключ"] => Значение
        echo "$item: " . "$description<br>";  // copier: Cpoier and Multipurpose
    }
    */

    /*
    $cars = array(
                n  > "V8",
                "Bugatti" => "V16",
                "Mercedes-Benz" => "V6",
    );

    foreach ($cars as $car => $engine) {
        echo "Автомобиль $car обладает двигателем $engine<br>";
    }
    echo $cars["BMW"];
    */


    /* Многомерные массивы
    $products= array( 
        "paper" => array(
            "copier" => "Cpoier and Multipurpose",
            "inkjet"=> "Inkjet Printer",
            "laser" => "Laser Printer",

        ),
        "pens" => array(
            "ball" => "Ball point",
            "hilite" => "Highlighters",
            "marker" => "Markers",
        ),
        "misc" => array(
            "tape" => "Sticky Tape",
            "glue" => "clips",
        ),
    );

    foreach ($products as $section => $items) {
        foreach ($items as $key => $value) {
            echo "<pre>$section:\t$key\t($value)<br>";
        }
        echo "<pre>";
    }
    echo $products["paper"]["laser"];
    */
    ?>
</body>
</html>