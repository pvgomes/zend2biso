<?php

namespace Application\Service;

use Application\Infrastructure as Infrastructure;

class Product
{

    /**
     * @var \Domain\Repository\Product
     */
    protected $productRepository;

    public function __construct($sm)
    {
        $config = $sm->get('config');
        $this->productRepository = new Infrastructure\Repository\PredisProduct(new \Predis\Client($config['redis']));
    }


    public function get($id)
    {
        return $this->productRepository->getById($id);
    }

    public function create($data)
    {
        $productEntity = new Infrastructure\Entity\Product();
        $productEntity->setId(1);
        $productEntity->setName("Gear Of War XBOX 360");
        $productEntity->setDescription('Jogo Gear Of War para XBOX 360');
        $productEntity->setQuantity(10);
        $productEntity->setCurrency('BRL');
        $productEntity->setWeight('20');
        $productEntity->setWidth('20');
        $productEntity->setSize('20');
        $productEntity->setOriginalPrice(99);
        $productEntity->setSpecialPrice(70);
        return $this->productRepository->persist($productEntity);
    }

}
