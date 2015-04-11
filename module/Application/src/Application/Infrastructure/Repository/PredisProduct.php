<?php

namespace Application\Infrastructure\Repository;

use \Domain;
use Application\Infrastructure\Entity;
use Predis\PredisException;

class PredisProduct implements Domain\Repository\Product
{

    /**
     * @var \Predis\Client
     */
    private $predisClient;

    public function __construct(\Predis\Client $predisClient)
    {
        $this->predisClient = $predisClient;
    }

    public function getById($id){

        try {
            $product = new Entity\Product();
            $product->setId($id);
            $product->setName($this->predisClient->get('product:'.$id.':name'));
            $product->setDescription($this->predisClient->get('product:'.$id.':description'));
            $product->setQuantity($this->predisClient->get('product:'.$id.':quantity'));
            $product->setCurrency($this->predisClient->get('product:'.$id.':currency'));
            $product->setWeight($this->predisClient->get('product:'.$id.':weight'));
            $product->setWidth($this->predisClient->get('product:'.$id.':width'));
            $product->setSize($this->predisClient->get('product:'.$id.':size'));
            $product->setOriginalPrice($this->predisClient->get('product:'.$id.':originalPrice'));
            $product->setSpecialPrice($this->predisClient->get('product:'.$id.':specialPrice'));
            $product = Domain\Factory\Product::build($product->toArray());
        } catch(PredisException $e)
        {
            die("Redis exception ". $e->getMessage());
        } catch(\Exception $e)
        {
            var_dump($e);
            die("Exception ". $e->getMessage());
        }

        return $product;
    }

    public function persist(Entity\Product $product)
    {
        try {
            $response = $this->predisClient->mset(array(
                    'product:'.$product->getId().':name' => $product->getName(),
                    'product:'.$product->getId().':description' => $product->getDescription(),
                    'product:'.$product->getId().':quantity' => $product->getQuantity(),
                    'product:'.$product->getId().':currency' => $product->getCurrency(),
                    'product:'.$product->getId().':weight' => $product->getWeight(),
                    'product:'.$product->getId().':width' => $product->getWidth(),
                    'product:'.$product->getId().':size' => $product->getSize(),
                    'product:'.$product->getId().':originalPrice' => $product->getOriginalPrice(),
                    'product:'.$product->getId().':specialPrice' => $product->getSpecialPrice(),
            ));
        } catch(PredisException $e)
        {
            die("Redis exception ". $e->getMessage());
        } catch(\Exception $e)
        {
            die("Exception ". $e->getMessage());
        }

        return $response;
    }

    public function set($key, $value)
    {
        return $this->predisClient->set($key, $value);
    }


}