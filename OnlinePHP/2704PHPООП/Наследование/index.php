<?php 
    // Наследование происходит при помощи конструкции 
    //      class CHILD_CLASS extends PARENT_CLASS {};

    class Animals {
        public string $name;
        public float $weight, $height;

        public function __construct(string $name, float $weight, float $height) {
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


    // _________________________________________________________________

    // protected - мод. доступа, доступен в этом классе и в классах дочерних
    class Gun {
        protected int $damage, $volume;
        protected string $typeShot;

        public function __construct(int $damage, int $volume, string $typeShot) {
            $this->damage = $damage;
            $this->volume = $volume;
            $this->typeShot = $typeShot;
        }

        public function infoAboutShot() {
            if ($this->volume >= 1 && $this->volume <= 10) {
                return "Damage: $this->damage. Need Reload";
            } else if($this->volume == 0) {
                return "RELOAD!!!";
            } else {
                return "Damage: $this->damage. $this->typeShot";
            }
        }
    }

    $m4 = new Gun('28', 21, 'auto');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        echo json_encode($cat) . "<br>"; // json_encode - местный JSON.strigify
        
        echo json_encode($dog);

        echo $m4->infoAboutShot();
    ?>
</body>
</html>