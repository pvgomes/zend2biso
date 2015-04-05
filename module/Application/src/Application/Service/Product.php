<?php

namespace Application\Service;

use Application\Infrastructure as Infrastructure;

class Product
{

    protected $productRepository;

    public function __construct($sm)
    {
        $this->productRepository = new Infrastructure\Repository\InMemoryProduct();
    }


    public function get($id)
    {
        return $this->productRepository->getById($id);
    }

}
