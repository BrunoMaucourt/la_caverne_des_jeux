<?php
    // Choose color theme for bootstrap
    if(!isset($_SESSION['theme'])){
        $_SESSION['theme'] = 0;
    } 
    // if user is connected check in database, theme preference
    if(isset($_SESSION['user_id'])){
        require_once "db_connection.php";
        require_once "../Model/data_user.php";

        // update color theme
        if($user_data['light_dark'] == 0){
            $_SESSION['theme'] = 0;
        }else{
            $_SESSION['theme'] = 1;
        }
    }

    // Choose color theme
    if($_SESSION['theme'] == 0){
        echo 'data-bs-theme="light"';
    }else{
        echo 'data-bs-theme="dark"';
    }