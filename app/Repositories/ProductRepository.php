<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository{

    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function storeProduct()
    {

    }


}
