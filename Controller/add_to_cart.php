<?php
session_start();
require_once "db_connection.php";

$product_id = $_POST['product_id'];

//we check if the addtocart click is from the display_search php
//if not :
if(!isset($_POST['from_search'])){
    $db_table = $_POST['db_table'];
    $db_table_id = $_POST['db_table_id'];

//if the user  is not connected 
    if(!isset($_SESSION['user_id'])){
        if(!isset($_SESSION['non_registered_user_cart'])){
            $non_registered_user_cart = array();
            $non_registered_user_cart = [$product_id => 1];
            $_SESSION['non_registered_user_cart'] = $non_registered_user_cart;
        }else{
            $non_registered_user_cart = $_SESSION['non_registered_user_cart'];
            if(array_key_exists($product_id,$non_registered_user_cart)){
                $non_registered_user_cart[$product_id] += 1;
            }else{
                $non_registered_user_cart[$product_id] = 1;
            }
            $_SESSION['non_registered_user_cart'] = $non_registered_user_cart;
        } 
    //if the user is connected as a client   
    }else{
        if($_SESSION['account_level_id'] == 3){
            $query = "INSERT INTO user_cart(user_id, game_id) VALUES (?,$product_id)";
            $stmt = $dbh_readwrite->prepare($query);
            $stmt->execute([$_SESSION['user_id']]);
        }else{
            header("Location: ../View/index.php");
            exit();
        }
    }
    header("Location: ../View/games.php?page=".$db_table."&id=".$db_table_id);
    exit();

 //if the add to cart click is from se display_search.php :   
}else{
//if the user is not connected
    if(!isset($_SESSION['user_id'])){
        if(!isset($_SESSION['non_registered_user_cart'])){
            $non_registered_user_cart = array();
            $non_registered_user_cart = [$product_id => 1];
            $_SESSION['non_registered_user_cart'] = $non_registered_user_cart;
        }else{
            $non_registered_user_cart = $_SESSION['non_registered_user_cart'];
            if(array_key_exists($product_id,$non_registered_user_cart)){
                $non_registered_user_cart[$product_id] += 1;
            }else{
                $non_registered_user_cart[$product_id] = 1;
            }
            $_SESSION['non_registered_user_cart'] = $non_registered_user_cart;
        } 
//if the user is connected as a client   
    }else{
        if($_SESSION['account_level_id'] == 3){
            $query = "INSERT INTO user_cart(user_id, game_id) VALUES (?,$product_id)";
            $stmt = $dbh_readwrite->prepare($query);
            $stmt->execute([$_SESSION['user_id']]);
        }else{
            header("Location: ../View/index.php");
            exit();
        }
    }
    header("Location: ../View/display_search.php");
}

 

    
