<?php

namespace App\Entity;

interface productInterface {
    public function addProductDB(string $product_type, int $product_price, int $product_stock);
    public function remProductDB($product_id);
}