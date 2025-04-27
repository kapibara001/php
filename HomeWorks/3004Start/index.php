<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .questionForm {
            width: 600px;
            padding: 10px;
            border: 2px solid black;
            border-radius: 10px;
            gap: 10px;
            margin-bottom: 10px
        }
        .true {
            padding: 10px;
            background-color: green;
            color: white;
        }
        .false {
            padding: 10px;
            background-color: red;
            color: white;
        }
        .butn {
            width: 100%;
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <?php 
        // 1 ex
        $name = "maxim";
        echo "Hello, $name!<br>";

        // 2 ex
        $age = 15;
        echo "Your age is $age<br>";
        
        // 3 ex
        $a = 15;
        $b = 20;
        $rez = $a + $b;
        echo "$a + $b = $rez<br>";  

        // 4 ex
        $c = 5;
        $d = 15;

        $c += $d;
        $d = $c - $d;
        $c -= $d;
        
        echo "a) $c б) $d"
        ?>

    <h1>Викторина (задание 5)</h1>
    <form method="POST" class="questionForm">
        <h2>Сколько у паука ног?</h2>
        <?php 
            if (isset($_POST['question1'])) { // Проверка на то, есть ли какое-то значение при отправке ответа
                $answer1 = $_POST['question1'];
                
                if ($answer1 == 8) {
                    echo "<div class='true'>Правильный ответ!</div>";
                } else {
                    echo "<div class='false'>Неправильно! У наука 8 ног (3 вариант)</div>";
                }
            }
            ?>
        <br>
        <!-- <div class='true'>as</div> -->
        <label>
            <input type="radio" value="4" name="question1">
            <span>4 ноги</span>
        </label>
        <br>
        
        <label>
            <input type="radio" value="6" name="question1">
            <span>6 ног</span>
        </label>
        <br>
        <label>
            <input type="radio" value="8" name="question1">
            <span>8 ног</span>
        </label>
        <br>
        <label>
            <input type="radio" value="10" name="question1">
            <span>10 ног</span>
        </label>
        <br>

        <h2>Какие элементы из списка являются языками программирования? (доступен выбор нескольких вариантов)</h2>
            
        <?php 
            if (isset($_POST['question2'])) {
                $answer2 = $_POST['question2'];
    
                if (in_array('Python', $answer2) && in_array('C++', $answer2) && in_array('JAVA', $answer2)) {
                    echo "<div class='true'>Правильный ответ!</div>";
                } else {
                    echo "<div class='false'>Неправильный ответ!<br>
                        Правильный ответ:<br>
                        Python<br>
                        C++<br>
                        JAVA
                        </div>";
                }
            }
                
        ?>
    
        <label>
            <input type="checkbox" value="Python" name="question2[]">
            <span>Python</span>
        </label>
        <br>
    
        <label for="">
            <input type="checkbox" value="CSS" name="question2[]">
            <span>CSS</span>
        </label>
        <br> 
    
        <label for="">
            <input type="checkbox" value="C++" name="question2[]">
            <span>C++</span>
        </label>
        <br>
    
        <label for="">
            <input type="checkbox" value="JAVA" name="question2[]">
            <span>JAVA</span>
        </label>
        <br>

        <h2>Какого роста был император Пётр I?</h2>
        
        <?php 
            if (isset($_POST['question3'])) {
                $answer3 = $_POST['question3'];
                if ($answer3 == "true") {
                    echo "<div class='true'>Правильный ответ!</div>";
                } else {
                    echo "<div class='false'>Неправильно! Рост Петра I был 2 метра 3 сантиметра!</div>";
                }
            }
        ?>
        <label>
            <input type="radio" name="question3" value="notTrue">
            <span>1.83м</span>
        </label>
        <br>
        <label>
            <input type="radio" name="question3" value="true">
            <span>2.03м</span>
        </label>
        <br>
        <label>
            <input type="radio" name="question3" value="notTrue">
            <span>1.43м</span>
        </label>
        <br>
        <label>
            <input type="radio" name="question3" value="notTrue">
            <span>1.63м</span>
        </label>
        <br>

        
        <div style="width: 100%; display: flex; justify-content: center">
            <button type="submit" class="btn btn-warning" class="butn" >Проверить</button>
        </div>
    </form>
</body>
</html>