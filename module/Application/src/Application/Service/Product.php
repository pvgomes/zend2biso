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
        $productEntity->setName("Gears Of War XBOX 360");
        $productEntity->setDescription('O terceiro episódio de um dos melhores games da categoria é marcado pela volta dos protagonistas, que agora vêm acompanhados de diferentes aliados (com direito a modo cooperativo exclusivo para quatro jogadores), em busca da salvação da raça humana, esta limitada a apenas um navio.
Os tradicionais Locusts agora podem ser eliminados através de uma série de sequências de finalização (uma para cada arma), incluindo rajadas de fogo com lança-chamas e até mesmo cortes na garganta, feitos com a baioneta anexada à metralhadora. ');
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
