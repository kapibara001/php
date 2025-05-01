<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Second 30.04</title>
</head>
<body>
    <?php 
    { // 1
        $a = 15;
        $b = 3;
        $c = 7;
    
        if ($a % $b == 0) {
            echo "$a кратно $b<br>";
        } else {
            echo "$a не кратно $b<br>";
        }

        if ($a % $c == 0) {
            echo "$a кратно $c<br>";
        } else {
            echo "$a не кратно $c<br>";
        }
    }

    { // 2
        $a = 15;
        $b = 152;

        if ($a >= $b) {
            echo $a**2 . "<br>";
        } else {
            echo $b**2 . "<br>";
        }
    }

    { // 3
        function monthDaysCounter($month) {
            if ($month > 0 && $month <= 12) {
                if ($month < 8) {
                    if ($month % 2 == 0) {
                        $days = 30;
                    } else {
                        $days = 31;
                    }
                } else if ($month >= 8 && $month <= 12) {
                    if ($month % 2 == 0) {
                        $days = 31;
                    } else {
                        $days = 30;
                    }
                }
                return "Month = $month<br>Days in the month: $days<br>";
            } else {
                return "Неправилный номер месяца.<br>";
            }
        }

        echo monthDaysCounter(8);
    }

    { // 4
        function isLeapYear($year) {
            return ($year % 4 === 0 && $year % 100 !== 0) || ($year % 400 === 0);
        }

        $year = 2025;
        if (isLeapYear($year)) {
            echo "$year - високосный<br>";
        } else {
            echo "$year - невисокосный<br>";
        }
    }

    { // 5
        function fiveth (float $first, float $sec) {
            if ($first % 3 == 0 && $sec % 3 == 0 && $sec != 0) {
                $result = $first + $sec;
                echo "$first + $sec = $result";
            } else { 
                if ($sec == 0) {
                    echo "Некорректный ввод";
                } else {
                    $result = $first / $sec;
                    echo "$result/$sec = $result";
                }
            }
        };

        echo fiveth(15, 3);
    }

    { // 6
        $isRegister = false;

        if (!$isRegister) {
            echo '<h1>Registration Form</h1>
                <form method="GET" action="./Registered.html">
                    <p>Session ID: Test</p>
                    <label>
                        <input type="text" placeholder="Login">
                    </label>
                    <label>
                        <input type="Password" placeholder="Password">
                    </label>
                    <input type="button" value="Отправить">
                </form>';
        } else {
            echo "<h1>You registered</h1>";
        }
    }
    ?>
</body>
</html>