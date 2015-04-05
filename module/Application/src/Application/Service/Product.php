<?php

namespace Application\Service;


class Product
{

    protected $productRepository;

    public function __construct($sm)
    {
        //$this->userRepository = new Domain\Repository\User($sm->get('Doctrine\ORM\EntityManager'));
    }


    public function get($id)
    {

        $productArray = array(
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
        $product = \Domain\Factory\Product::build($productArray);
        return $product;
    }

}
