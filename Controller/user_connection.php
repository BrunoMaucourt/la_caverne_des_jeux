<?php

    session_start();
    require_once "db_connection.php";

    //redirect to authentification.php if required data are missing.
    if( !isset($_POST['user_login_email']) ||
        !isset($_POST['user_login_password'])){
            header("Location: ../View/authentification.php");
            exit();
        }

    //set data from connection form.
    $user_login_email = $_POST["user_login_email"];
    $user_login_password = $_POST["user_login_password"];

    /*query to check if
    password AND email wrote by the user exist on the database
    */
    $query = "SELECT COUNT(*) AS nb FROM user WHERE email = ? AND password = ? ";
    $stmt = $dbh_readonly->prepare($query);
    $stmt->execute([$user_login_email,$user_login_password]);
    $is_registration_correct = $stmt->fetch(PDO::FETCH_ASSOC);
    
    /*if both email and password are not in database 
    redirect to authentification.php
     if they are, redirect to profil.php
    */
    if($is_registration_correct['nb'] == 0){
        $_SESSION["registration_error"] = "L'utilsateur ou le mot de passe est incorrect.";
        header("Location: ../View/authentification.php");
        exit();
    }else{
        $query = "SELECT id, account_level_id FROM user WHERE email = ? AND password = ? ";
        $stmt = $dbh_readonly->prepare($query);
        $stmt->execute([$user_login_email,$user_login_password]);
        $user= $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION["user_id"] = $user['id'];
        $_SESSION["account_level_id"] = $user['account_level_id'];
        header("Location: ../View/profil.php");
        exit();
    }