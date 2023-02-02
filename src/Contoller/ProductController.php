<?php

namespace App\Controller;

use App\Entity\Fruit;
use App\Repository\ProductRepository;

class ProductController{

    private $productRepository;

    public function __construct(){
        $this->productRepository = new ProductRepository();
    }

    public function handleRequest(){
        $errors = [];
        if($_SERVER["REQUEST_METHOD"] = "POST"){
            if(empty($_POST['id']) or ($_POST['type']) or empty($_POST['price']) or empty($_POST['stock']))
            {
                $errors[] = "Veuillez remplir tous les champs";
                return $errors;
            }

            if ($_POST['type'] == 'fruit'){
                if(empty($_POST['id'])){
                    $errors[] = "Veuillez insérer un nom";
                    return $errors;
                } else {
                    $fruit= new Fruit();
                    $fruit->setId($_POST['id']);
                    $fruit->setPrice($_POST['price']);
                    $fruit->setStock($_POST['stock']);
                    $this->productRepository->addFruit($fruit->getId(), $fruit->getPrice(), $fruit->getStock());
                }
            } 
            exit();
        }
    }

    public function getFruit(){
        return $this->productRepository->findAllFruit();
    }
}

// namespace App\Controller;

// use App\Entity\User;
// use App\Entity\Message;
// use App\Repository\MessageRepository;

// class MessageController{

//     private MessageRepository $messageRepository;

//     public function __construct()
//     {
//         $this->messageRepository = new MessageRepository;

//     }

//     public function handleRequest()
//     {
//         $errors = [];
//         if($_SERVER["REQUEST_METHOD"] == "POST"){
      
//             if(empty($_POST['name']) or empty($_POST['message']) or strlen($_POST['message']) < 3 )
//             {
//                 $errors[] = "Veuillez remplir tous les champs";
//                 return $errors;
//             }else{
//                 $user = new User();
//                 $message = new Message();
//                 $user->setName($_POST['name']);
//                 $message->setAuthor($user);
//                 $message->setContent($_POST['message']);
//                 $this->messageRepository->addMessages($message->getContent(), $user->getName(), $message->getCreatedAt()->format('Y-m-d H:i:s'));
//                 header('Location: /');
//                 exit();
//             }
//         }
//     }
    
//     // lister les messages
//     public function getMessages()
//     {
//         return $this->messageRepository->findAll();
//     }
// }