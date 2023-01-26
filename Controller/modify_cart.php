<?php
session_start();
require_once "db_connection.php";

//if the user is not a client
if(!isset($_SESSION['user_id'])){
    //if the button pressed is the less-btn
    if($_POST['quantity_btn'] == 'less'){
        //we loop inside the non registered user cart to minus one the 
        //value of the quantity of the product_id
        foreach($_SESSION['non_registered_user_cart'] as $key => $value) {
            if($key == $_POST['product_id']){
                $value--;
                if($value == 0){
                    unset($_SESSION['non_registered_user_cart'][$key]);
                }else{
                    $_SESSION['non_registered_user_cart'][$key] = $value;
                } 
            }
        }
        //if the non registered user cart is empty, we delete it
        if(count($_SESSION['non_registered_user_cart']) == 0){
            unset($_SESSION['non_registered_user_cart']);
        } 
        header("Location: ../View/cart.php");
        exit();
    //if the button pressed is plus button    
    }elseif($_POST['quantity_btn']== 'plus'){
        $_SESSION['non_registered_user_cart'][$_POST['product_id']]++;
        header("Location: ../View/cart.php");
        exit();
    }
//if the user is a registered client
}else{
    $product_id = $_POST['product_id'];
    //check if the user is registered as a client
    if($_SESSION['account_level_id'] == 3){
        //if btn pressed is minus button
        if($_POST['quantity_btn']== 'less'){
            $query = "DELETE FROM `user_cart` WHERE game_id = $product_id LIMIT 1";
            $stmt = $dbh_readwrite->query($query);
            header("Location: ../View/cart.php");
            exit();
        //if btn pressed is plus button
        }elseif($_POST['quantity_btn']== 'plus'){
            $query = "INSERT INTO `user_cart`(`user_id`, `game_id`) VALUES (?,$product_id)";
            $stmt = $dbh_readwrite->prepare($query);
            $stmt->execute([$_SESSION['user_id']]);
            header("Location: ../View/cart.php");
            exit();
        }
    //if the use is not a client (admin or seller)
    }else{
        header("Location: ../View/index.php");
        exit();
    }
}

    
