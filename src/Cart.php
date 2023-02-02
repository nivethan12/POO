<?php

// namespace App\Entity;

// use App\Interface\CartInterface;


// class Cart implements CartInterface{

//     private  $products =  [];

//     public function addProduct(Product $product)
//     {
//         if($product->getStock() > 0) {
//             array_push($this->products, $product);
//             $product->setStock($product->getStock() - 1);
//             echo "Le produit a bien été ajouté" . PHP_EOL;
//         }else{
//             echo "Le produit n'est plus en stock" . PHP_EOL;
//         }
//     }

//     public function removeProduit(Product $product)
//     {
//         if(($key = array_search($product, $this->products)) !== false) {
//             unset($this->products[$key]);
//             $product->setStock($product->getStock() + 1);
//             echo "Le produit a bien été supprimé". PHP_EOL;
//         }
//     }

//     public function listProducts(){
//         if(empty($this->products)){
//             echo "Le panier est vide" . PHP_EOL;
//     }else{
//         foreach($this->products as $product){
//             echo $product->getName() . " " . $product->getPrice() . "€" . PHP_EOL;
//             }
//         }
//     }

//     public function checkout()
//     {
//     if(empty($this->products)){
//         echo "Vous avez rien dans votre panier" . PHP_EOL;
//     }else{
//         echo"en cours ...";
//         $total = 0;
//         foreach($this->products as $product){
//           $total += $product->getPrice();
//         }
//         echo "Total : " . $total . "€" . PHP_EOL;
//         echo"Paiement réussi";
//         exit;
//     }
// }
// }


namespace App\Entity;

class Cart {

    private int $id;
    private array $list_product= array();

    public function setId($i)
    {
        $this->id = $i;
    }
    public function getId() : int
    {
        return($this->id);
    }

    public function addProduct($p) : mixed
    {
        if ($p->stock <= 0){
            return('rupture');
        } else {
            $p->stock -=1;
            array_push($this->list_product, $p);
        }
    }
    public function removeProduct($p)
    {
        if (!in_array($p, $this->list_product)) {
            return false;
        }
        $p->stock++;
        unset($this->list_product[array_search($p, $this->list_product)]);
        return true;
    }
    
}