<?php 
    class Category {
        private string $_name;
        private array $_list_products = [];

        public function __construct(string $name, array $list_products) {
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

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['categoryName'])) {
            $name = $_POST['categoryName'];
        }
    }
?>