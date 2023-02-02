<?php

namespace App\Repository;

use App\Connection;

class CartRepository {

    private $connection;

    public function __construct(){
        $this->connection = Connection::getConnection();
    }

    public function getContent(int $id_cart) : array
    {
        $sql_fruit = "SELECT name, price, stock, quantity FROM product, cart WHERE cart.num_product=product.id AND type = 'fruit' ORDER BY name";
        return array_merge($this->connection->query($sql_fruit)->fetchAll());
    }

    public function addToCart(int $id_cart, int $id_produit, int $quantity){
        $sql_check = "SELECT num_product, quantity FROM cart WHERE num_product=" . $id_produit;
        $liste_items_in_cart = $this->connection->query($sql_check)->fetch();
        if ($liste_items == array()){
            $sql_insert = "INSERT INTO cart values ($id_cart, $id_produit, $quantity)";
            $this->connection->query($sql_insert);
        } else {
            $sql_modify_quantity = "UPDATE cart SET quantity = " . ($quantity + $liste_item[0][1]);
            $this->connection->query($sql_modify_quantity);
        }
    }

    public function removeFromCart(int $id_cart, int $id_produit, $quantity){
        $sql_check = "SELECT num_product, quantity FROM cart WHERE num_product=" . $id_produit;
        $liste_items_in_cart = $this->connection->query($sql_check)->fetch();
        if ($liste_items == array()){
            return('erreur');
        } else if ($liste_item[0][1] > $quantity) {
            $sql_modify_quantity = "UPDATE cart SET quantity = " . ($liste_item[0][1] - $quantity);
            $this->connection->query($sql_modify_quantity);
        } else {
            $sql_drop_product = "DELETE FROM cart WHERE num_product=$id_produit";
            $this->connection->query($sql_drop_product);
        }
    }
}