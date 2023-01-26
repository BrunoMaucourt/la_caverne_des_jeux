<?php
    session_start();
    require_once "db_connection.php";
    require_once "../Model/data_user.php";

    //redirect to authentification.php if required data are missing.
    if( !isset($_POST['user_email']) ||
        !isset($_POST['user_password']) ||
        !isset($_POST['user_last_name']) ||
        !isset($_POST['user_first_name'])){
            header("Location: ../View/profil.php");
            exit();
        }

    //set data from setting form.
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_last_name = $_POST['user_last_name'];
    $user_first_name = $_POST['user_first_name'];
    $user_birthdate = $_POST['user_birthdate'];
    $user_theme = $_POST['user_theme'];
    
    // Change avatar if file send by user is correct
    if(isset($_FILES['user_profil_picture']) && $_FILES['user_profil_picture']["error"] == UPLOAD_ERR_OK){

        // set in a variable extension file
        switch ($_FILES['user_profil_picture']['type']){ 
            case 'image/png' :
                $picture_type = '.png';
                break;
            case 'image/jpg' :
                $picture_type = '.jpg';
                break;
            case 'image/jpeg' : 
                $picture_type = '.jpeg';
                break;
        }
        $user_profil_picture = "../Picture/Avatar/user_id_" . $_SESSION['user_id'] . $picture_type;

        // Move file send to a new location
        move_uploaded_file($_FILES['user_profil_picture']['tmp_name'],$user_profil_picture);
    }else{
        // If no picture upload, recover old picture from database
        $user_profil_picture = $user_data["profil_picture"];
    }

    // Update of database
    $query = "UPDATE `user` SET last_name = ?, first_name = ?, email = ?, password = ?, profil_picture = ?, birthdate = ?, light_dark = ?  WHERE id = ?";

    $stmt = $dbh_readwrite->prepare($query);
    $stmt->execute([$user_last_name, $user_first_name, $user_email, $user_password, $user_profil_picture, $user_birthdate, $user_theme, $_SESSION['user_id']]);

    header("Location: ../View/profil.php");
    exit();