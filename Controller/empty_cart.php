<?php
    session_start();
    require_once "db_connection.php";

    if(!isset($_SESSION['user_id'])){
        unset($_SESSION['non_registered_user_cart']);
    }else{
        $user_id = $_SESSION['user_id'];
        $query = "DELETE FROM `user_cart` WHERE user_id = $user_id";
        $stmt = $dbh_readwrite->query($query);
    }
    header("Location: ../View/cart.php");
    exit();
