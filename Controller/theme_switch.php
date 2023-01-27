<?php
    session_start();
    // Switch between light and dark theme
    if(isset($_SESSION['user_id'])){
        // If user is connected switch and update database
        require_once "db_connection.php";
        require_once "../Model/data_user.php";

        // switch color theme
        if($user_data['light_dark'] == 0){
            $_SESSION['theme'] = 1;
        }else{
            $_SESSION['theme'] = 0;
        }
        // Update new theme in user database
        require_once "../Model/data_user_theme_color.php";
    }else{
        // switch color theme
        if($_SESSION['theme'] == 0){
            $_SESSION['theme'] = 1;
        }else{
            $_SESSION['theme'] = 0;
        } 
    }

    // Redirect to the last page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();