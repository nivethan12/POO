<?php

namespace App\Entity;

use App\Entity\AbstractEntity\AbstractProduct;

class Fruit extends AbstractProduct{

    private string $name;

    public function __construct()
    {
        $this->setType('fruit');
    }

    public function setName($n)
    {
        $this->name = $n;
    }
    public function getName() : string 
    {
        return($this->name);
    }
}