<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <?php 
    require_once("categoryClass.php"); // Проверяю на ОБЯЗАТЕЛЬНОЕ наличие файла 1 раз

    class PhoneCategory extends Category {
        private string $Ram, $OS;
        private int $CountSim, $HDD;

        public function __construct($name, array $filters, $price, $Ram, $OS, $CountSim, $HDD) {
            $filters["OS"] = $OS;
            $filters["Ram"] = $Ram;
            $filters["CountSim"] = $CountSim;
            $filters["HDD"] = $HDD;
            
            parent::__construct($name, $filters, $price);
        }

        public function getInfo(): array {
            return parent::getInfo();
        }
    }

    class MonitorCategory extends Category {
        private string $Diagonal;
        private int $Frequency;

        public function __construct($name, array $filters, $price, $Diagonal, $Frequency) {
            $filters["Diagonal"] = $Diagonal;
            $filters["Frequency"] = $Frequency;

            parent::__construct($name, $filters, $price);
        }
    }

    $Iphone = new PhoneCategory(
        "Iphone 14 Pro", [], 1200, 6, "IOS", 2, 256
    );

    echo "<div class='as'>";
        echo "<h2>" . $Iphone->getName() . "</h2>";
        foreach ($Iphone->getInfo() as $key => $value) {
            if ($key == "Price") {
                echo "<h3>" . $key .": $". $value ."</h3><br>";
            } else {
                echo "<h3>" . $key .": ". $value ."</h3><br>";
            }
        }
    echo "</div>";
?>
</body>
</html>
