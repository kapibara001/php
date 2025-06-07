<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;


class ProductController extends Controller {
    public function toProducts() {

        $products = [ 
            ['name' => 'Ноутбук', 'price' => 1200, 'in_stock' => true, 'rating' => 4.8], 
            ['name' => 'Смартфон', 'price' => 800, 'in_stock' => false, 'rating' => 3.3], 
            ['name' => 'Наушники', 'price' => 150, 'in_stock' => true, 'rating' => 5.0], 
            ['name' => 'Мышь', 'price' => 50, 'in_stock' => true, 'rating' => 4.7], 
        ];

        return view('/products', ['products' => $products]);
    }
}