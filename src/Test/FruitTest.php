<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Fruit;

class FruitTest extends TestCase {

    public function testIdFruit(){
        $Fruit = new Fruit();
        $Fruit->setId(2);
        $this->assertEquals(2, $Fruit->getId());
    }

    public function testPriceFruit(){
        $Fruit = new Fruit();
        $Fruit->setPrice(2);
        $this->assertEquals(2, $Fruit->getPrice());
    }

    public function testStockFruit(){
        $Fruit = new Fruit();
        $Fruit->setStock(5);
        $this->assertEquals(5, $Fruit->getStock());
    }

    public function testNameFruit(){
        $Fruit = new Fruit();
        $Fruit->setName("banane");
        $this->assertEquals("banane", $Fruit->getName());
    }

}