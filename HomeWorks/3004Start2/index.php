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
            echo $a**2;
        } else {
            echo $b**2;
        }
    }

    { // 3
        $mounths = [
            'January': 
        ]
    }
    ?>
</body>
</html>