<?php

namespace App\Repository;

use App\Connection;

class ProductRepository {

    private $connection;

    public function __construct(){
        $this->connection = Connection::getConnection();
    }

    public function findAllFruit() : array
    {
        $sql = "SELECT id, name, price, stock FROM product WHERE type = 'fruit' ORDER BY name";
        return $this->connection->query($sql)->fetchAll();
    }

    public function findFruit(string $name) : array
    {
        $sql = "SELECT name, price, stock FROM product WHERE type = 'fruit' AND name = '$name'";
        return $this->connection->query($sql)->fetchAll();
    }

    public function addFruit(int $id, int $price, int $stock, string $name){
        $sql = "INSERT INTO product values ($id, 'fruit', $price, $stock, NULL, '$name', NULL, NULL)";
        $this->connection->query($sql);
    }

    public function removeProduct(int $id){
        $sql = "DELETE FROM product WHERE id = $id"
        ;
        $this->connection->query($sql);
    }
}