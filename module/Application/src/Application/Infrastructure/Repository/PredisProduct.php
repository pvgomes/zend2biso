<?php

namespace Application\Infrastructure\Repository;

use \Domain;

class Product implements Domain\Repository\Product
{

    private $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function persist($entity){

        if ($entity->getId()) {
            $this->entityManager->merge($entity);
        } else {
            $this->entityManager->persist($entity);
        }

        $this->entityManager->flush($entity);
    }

    public function getById($id){
        throw new Exception('Not implemented');
    }



}