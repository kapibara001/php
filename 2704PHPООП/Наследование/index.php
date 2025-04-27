<?php 
    // Наследование происходит при помощи конструкции 
    //      class CHILD_CLASS extends PARENT_CLASS {};

    class Animals {
        public string $name;
        public float $weight, $height;

        function __construct(string $name, float $weight, float $height) {
            $this->name = $name;
            $this->weight = $weight;
            $this->height = $height;
        }
    }

    class Cat extends Animals {
        public $countlife;

        
        public function __construct(string $name, float $weight, float $height, int $countlife = 9) {
            // $this->name = $name;
            // $this->weight = $weight; Можно сделать и так, но можно сделать и по-другому
            // $this->height = $height;

            parent::__construct($name, $weight, $height); // Взяли конструктор родительского класса для удобства(предтавь, что там миллион полей, и подумай над удобством этой команды)
            $this->countlife = $countlife;
        }
    }

    class Dog extends Animals {
        public array $commands = [
            "Up", "Sleep", "Sit down",
        ];

        public function __construct(string $name, float $weight, float $height) {
            parent::__construct($name, $weight, $height);
        }

        public function AddCommand(string $command) {
            array_push($this->commands, $command);
        }
        
    }

    $cat = new Cat('Hello', 6.4, 50.4);

    $dog = new Dog('World!', 10, 70);
    $dog->AddCommand('RE');
?>

~<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        echo json_encode($cat);
        echo json_encode($dog);
    ?>
</body>
</html>