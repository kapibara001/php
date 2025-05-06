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
            <input type="text" placeholder="Name" name="categoryName">
            <button type="submit">Add</button>
        </div>
        
        <h3>Список категорий:</h3>
        <ul>
            <?php 
            if (count($_SESSION['categories']) == 0) {
                echo '<h4>Список категорий пуст</h4>';
            } else { 
                foreach ($_SESSION['categories'] as $cat): ?>
                    <li>
                        <h4><?= htmlspecialchars($cat->getCategoryName()) ?></h4>
                    </li>
                <?php endforeach; } ?>
        </ul>
        
        <button type="submit" name="CLEAR">Очистить</button>
    </form> 

    <form action="#" class="myform"> <!-- Форма добавления вещей в категорию -->
        <select name="elementsInCategories">
        <?php 
        if (count($_SESSION['categories']) == 0) { 
            echo '<option value="none">Список пуст</option>';
        } else {
            for ($i = 0; $i < count($_SESSION['categories']); $i++) {
                $catName = $_SESSION['categories'][$i]->getCategoryName();
                echo '<option value="' . htmlspecialchars($catName) . '">' . htmlspecialchars($catName) . '</option>';
            }
        }
        ?>
        <input type="text" name="elName" placeholder="Name">
        <input type="text" name="elPrice" placeholder="Price">
        </select>
    </form>
</body>
</html>