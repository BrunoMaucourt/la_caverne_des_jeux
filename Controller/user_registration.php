<?php
    require_once "db_connection.php";

    //redirect to authentification.php if required data are missing.
    if( !isset($_POST['new_user_email']) ||
        !isset($_POST['new_user_password']) ||
        !isset($_POST['new_user_last_name']) ||
        !isset($_POST['new_user_first_name'])){
            header("Location: ../View/authentification.php");
            exit();
        }

    //set data from registration form.
    $new_user_email = $_POST['new_user_email'];
    $new_user_password = $_POST['new_user_password'];
    $new_user_last_name = $_POST['new_user_last_name'];
    $new_user_first_name = $_POST['new_user_first_name'];

    //if date value is empty , set the default value
    if($_POST['new_user_birthdate'] == ''){
        $new_user_birthdate = '2023-01-01';
    }else{
        $new_user_birthdate = $_POST['new_user_birthdate'];
    }
    
    /*query to create a new user in the database
    A default avatar is set by default
    */
    $query = "INSERT INTO `user`(`last_name`, `first_name`, `email`, `password`, `profil_picture`, `account_level_id`, `birthdate`, `registration_date`, `light_dark`) VALUES (?,?,?,?,'../Picture/Avatar/default_avatar.jpg',3,?,now(),0)";

    $stmt = $dbh_readwrite->prepare($query);
    $stmt->execute([$new_user_last_name,$new_user_first_name,$new_user_email,$new_user_password,$new_user_birthdate]);

    // Change default avatar if file send by user is correct
    if(isset($_FILES['new_user_profil_picture']) && $_FILES['new_user_profil_picture']["error"] = UPLOAD_ERR_OK){

        // query to get ID from new user to 
        $query = "SELECT id FROM user WHERE email = ?";
        $stmt = $dbh_readonly->prepare($query);
        $stmt->execute([$new_user_email]);
        $user_id = $stmt->fetch(PDO::FETCH_ASSOC);

        // set in a variable extension file
        switch ($_FILES['new_user_profil_picture']['type']){ 
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
        $new_user_profil_picture_new_location = "../Picture/Avatar/user_id_" . $user_id['id'] . $picture_type;

        // Move file send to a new location
        move_uploaded_file($_FILES['new_user_profil_picture']['tmp_name'],$new_user_profil_picture_new_location);

        // Update database with the new picture profil
        $query = "UPDATE user SET profil_picture = ? WHERE id = ?";
        $stmt = $dbh_readwrite->prepare($query);
        $stmt->execute([$new_user_profil_picture_new_location,$user_id['id']]);

    }
    header("Location: ../View/profil.php");
    exit();