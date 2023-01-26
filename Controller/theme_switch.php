<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        require_once "db_connection.php";
        require_once "../Model/data_user.php";

        // update color theme
        if($user_data['light_dark'] == 0){
            $_SESSION['theme'] = 1;
        }else{
            $_SESSION['theme'] = 0;
        }
        require_once "../Model/data_user_theme_color.php";
    }else{
        // Choose color theme
        if($_SESSION['theme'] == 0){
            $_SESSION['theme'] = 1;
        }else{
            $_SESSION['theme'] = 0;
        } 
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();