<?php

namespace App\tests;

use PHPUnit\Framework\TestCase;
use App\Repository\ProductRepository;

class ProductRepositoryTest extends TestCase {

    public function testFindFruit()
    {
        $repository = new ProductRepository();
        $result = $repository->findFruit("banane");
        $this->assertEquals([["name"=>"banane", "price" => 10, "stock"=>15]], $result);
    }

    public function testAddFruit(){
        $repository = new ProductRepository();
        $repository->addFruit(1, 1, 1, "clémentine");
        $result = $repository->findFruit("clémentine");
        $this->assertEquals([["name"=>"clémentine", "price" => 11, "stock"=>15]], $result);
        $repository->removeProduct(1);
    }

}