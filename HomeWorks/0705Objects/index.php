<?php 
        class Category {
            private string $_name;
            private array $_list_products = [];

            public function __construct(string $name, array $list_products = []) {
                $this->_name = $name;
                $this->_list_products = $list_products;
            }
                
            public function getCategoryName(): string {
                return $this->_name;
            }

            public function getCategoryProcuts(): array {
                return $this->_list_products;
            }
        }

        session_start();
        if (!isset($_SESSION["categories"])) {
            $_SESSION["categories"] = []; // Сохранение между сессиями списка категорий 
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST["CLEAR"])) {
                $_SESSION["categories"] = [];
            } else {
                if (isset($_POST['categoryName']) && !empty(trim($_POST['categoryName']))) {
                    $name = trim($_POST['categoryName']);

                    $category = new Category($name);
                    $_SESSION["categories"][] = $category;
                } else {
                    echo "<script>alert('Список не может быть пустым')</script>";
                }
            }
        }
    ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Document</title>
</head>
<body>
    <form action="#" method="POST" class="myform">
        <div>
            <input type="text" placeholder="Name" name="categoryName" requaried>
            <button type="submit">Add</button>
        </div>
        
        <h3>Список категорий:</h3>
        <ul>
            <?php foreach ($_SESSION['categories'] as $cat): ?>
                <li>
                    <h4><?= htmlspecialchars($cat->getCategoryName()) ?>
                </h4>
            </li>
            <?php endforeach; ?>
        </ul>
        
        <button type="submit" name="CLEAR">Очистить</button>

        <form action="#" method="POST" class="myform">
            <button type="submit">а</button>
        </form>
    </form>
</body>
</html>