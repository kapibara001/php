<?php 
    class Category {
        private string $name;
        private array $filters, $listProducts;
        private int $price;

        public function __construct($name, array $filters, $price) {
            $this->name = $name;
            $this->price = $price;

            $filters["Price"] = $price;
            $this->filters = $filters;
        }

        public function getName(): string { 
            return $this->name;
        }
        
        public function getInfo(): array {
            return $this->filters;
        }
    } 