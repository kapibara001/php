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

            public function addProductInCategory($key, $value): void {
                $this->_list_products[$key] = "$" . $value;
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
            } 

            if (isset($_POST['categoryName']) && !empty(trim($_POST['categoryName']))) {     
                    $name = trim($_POST['categoryName']);

                    $category = new Category($name);
                    $_SESSION["categories"][] = $category;
            }

            if (isset($_POST['AddInCategory'])) {
                $index = $_POST["elementsInCategories"];
                $elName = trim($_POST["elName"]);
                $elPrice = trim($_POST["elPrice"]);
            
                if (
                    is_numeric($index) &&
                    isset($_SESSION["categories"][$index]) &&
                    $elName !== '' &&
                    $elPrice !== ''
                ) {
                    $_SESSION['categories'][$index]->addProductInCategory($elName, $elPrice);
                } else {
                    echo "<script>alert('Нарушен формат элемента')</script>";
                }
            }
        }
    ?>

<!DOCTYPE html>
<lang="ru">
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

    <form action="#" method="POST" class="myform"> <!-- Форма добавления вещей в категорию -->
    <select name="elementsInCategories" class="selectCategory">
    <?php 
        if (count($_SESSION['categories']) == 0) { 
            echo '<option value="none">Список пуст</option>';
        } else {
            for ($i = 0; $i < count($_SESSION['categories']); $i++) {
                $catName = $_SESSION['categories'][$i]->getCategoryName();
                echo '<option value="' . $i . '">' . htmlspecialchars($catName) . '</option>';
            }
        }
    ?>
    </select>
        <br>
        <input type="text" name="elName" placeholder="Name">
        <input type="text" name="elPrice" placeholder="Price">

        <h3>Список элементов в категории</h3>
        <?php 
            if (count($_SESSION["categories"]) <= 0) {
                echo "Элементов в категории нет<br>";
            } else { 
                foreach ($_SESSION["categories"] as $category) {
                    echo "<h4>" . htmlspecialchars($category->getCategoryName()) . "</h4>";
                    echo "<ul>";
            
                    foreach ($category->getCategoryProcuts() as $prodname => $prodprice) {
                        echo "<li>" . htmlspecialchars($prodname) . " — " . htmlspecialchars($prodprice) . "</li>";
                    }
            
                    echo "</ul>";
                }
            }
            ?>
        <button type="submit" name="AddInCategory">Добавить</button>
    </form>
</body>
</html>