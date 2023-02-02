<?php

namespace App\Entity\AbstractEntity;

abstract class AbstractProduct {

    private int $id;
    private string $type;
    private int $price;
    private int $stock;

    public function setId($i)
    {
        $this->id = $i;
    }

    public function getId()
    {
        return ($this->id);
    }

    public function setType($t)
    {
        if (!$t=='fruit'){
            return ("choisir un fruit");
        } else {
            $this->type = $t;
        }
    }
    public function getType() : string
    {
        return($this->type);
    }

    public function setPrice($p)
    {
        $this->price = $p;
    }
    public function getPrice() : int
    {
        return($this->price);
    }

    public function setStock($s)
    {
        $this->stock = $s;
    }
    public function getStock() : int
    {
        return($this->stock);
    }
}
