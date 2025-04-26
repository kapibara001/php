<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css.css">
    <title>Document</title>
</head>
<body>
    <?php 
        // 1 Задание
        $name = "Maxim";
        echo "Hello, \"" . $name . "\"!";


        // 2 Задание
        $age = 15;
        echo "<br>I'm " . $age . " y.o";

        // 3 Задание
        $a = 15;
        $b = 414;
        $result = $a + $b;
        
        echo "<br>$a + $b = $result";

        // 4 Задание
        $a = 3;
        $b = 8;

        $a = $a + $b;
        $b = $a - $b;
        $a = $a - $b;
        
        echo "<br>a = $a, b = $b";
        ?>

    <!-- 5 Задание -->
    <h1>Викторина</h1>
    <form action="#" method="post" class="formCss">

        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fiveth = $_POST['question1'] ?? null;

            if ($fiveth == '8') {
                echo "Правильный ответ!";
            } else {
                echo "Неправильный ответ. Правильный ответ был \"8 ног\".";
            }
        }
        ?>

        <h2>Сколько ног у паука?</h2>
        <label for="">
            <input type="radio" name="question1" value="4"> 
            4 ноги
        </label>
        <br>

        <label for="">
        <input type="radio" name="question1" value="6"> 
            6 ног
        </label>
        <br>

        <label for="">
        <input type="radio" name="question1" value="8"> 
            8 ног
        </label>
        <br>

        <label for="">
        <input type="radio" name="question1" value="10"> 
            10 ног
        </label>
        <br>

        <button type="submit">Проверить</button>

    </form>



    <form action="" class="formCss">

        <?php 

        ?>

        <h2>Что из приведенного ниже списка относится к ЯП (языкам программирования)?</h2>
        <label for="">
        <input type="checkbox" name="question1" value="CSS"> 
            CSS
        </label>
        <br>

        <label for="">
        <input type="checkbox" name="question1" value="Python"> 
            Python
        </label>
        <br>

        <label for="">
        <input type="checkbox" name="question1" value="PHP"> 
            PHP
        </label>
        <br>

        <label for="">
        <input type="checkbox" name="question1" value="JAVA"> 
            JAVA
        </label>
        <br>

        <button type="submit">Проверить</button>
    </form>
</body>
</html>