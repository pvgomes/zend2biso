<?php

namespace Application\Infrastructure\Repository;

use \Domain;

class InMemoryProduct implements Domain\Repository\Product
{

    private $products;

    public function __construct()
    {
        $this->loadProducts();
    }


    public function getById($id){

        $product = null;
        if (array_key_exists($id, $this->products)) {
            $product = \Domain\Factory\Product::build($this->products[$id]);
        }
        return $product;
    }

    private function loadProducts()
    {
        $this->products[1] = array(
            'id' => 1,
            'name' => 'Vestido milon',
            'description' => 'Vestido milon lindo',
            'quantity' => 10,
            'currency' => 'BRL',
            'size' => '10',
            'width' => '8',
            'weight' => '5',
            'originalPrice' => 150,
            'specialPrice' => 100,
        );
    }


}