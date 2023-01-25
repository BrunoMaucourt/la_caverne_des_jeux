<?php
    // check if user is registrated if not redirect to authentification
    if(!isset($_SESSION['user_id'])){
        header("Location: authentification.php"); 
        exit();
        }