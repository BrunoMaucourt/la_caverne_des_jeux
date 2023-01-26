<?php
session_start();
require_once "db_connection.php";

if(!isset($_SESSION['user_id'])){
    if(!isset($_SESSION['non_registered_user_cart'])){
        echo "pas de panier";
        //$non_registered_user_cart = array();
        //$non_registered_user_cart = [$product_id => 1];
        //$_SESSION['non_registered_user_cart'] = $non_registered_user_cart;
    }else{
        echo "un panier";
        //$non_registered_user_cart = $_SESSION['non_registered_user_cart'];
        //if(array_key_exists($product_id,$non_registered_user_cart)){
          //  $non_registered_user_cart[$product_id] += 1;
        //}else{
         //   $non_registered_user_cart = [$product_id => 1];
        //}
        //$_SESSION['non_registered_user_cart'] = $non_registered_user_cart;
        //var_dump($_SESSION['non_registered_user_cart']);
    }   
}else{
    $product_id = $_POST['product_id'];
    if($_SESSION['account_level_id'] == 3){
        if($_POST['quantity_btn']== 'less'){
            $query = "DELETE FROM `user_cart` WHERE game_id = $product_id LIMIT 1";
            $stmt = $dbh_readwrite->query($query);
            header("Location: ../View/cart.php");
            exit();
        }elseif($_POST['quantity_btn']== 'plus'){
            $query = "INSERT INTO `user_cart`(`user_id`, `game_id`) VALUES (?,$product_id)";
            $stmt = $dbh_readwrite->prepare($query);
            $stmt->execute([$_SESSION['user_id']]);
            header("Location: ../View/cart.php");
            exit();
        }
        
    }else{
        header("Location: ../View/index.php");
        exit();
    }
}

    
