<?php

namespace Core\Infrastructure;


interface RepositoryInterface
{

    public function persist($entity);

    public function get($id);

    public function remove($entity);

    public function listAll();

}