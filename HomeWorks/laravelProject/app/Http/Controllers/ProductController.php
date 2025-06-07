<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;


class ProductController extends Controller {
    public function toProducts() {

        $products = [ 
            ['name' => 'Ноутбук', 'price' => 1200, 'in_stock' => true], 
            ['name' => 'Смартфон', 'price' => 800, 'in_stock' => false], 
            ['name' => 'Наушники', 'price' => 150, 'in_stock' => true], 
            ['name' => 'Мышь', 'price' => 50, 'in_stock' => true], 
        ];

        return view('/products', ['products' => $products]);
    }
}