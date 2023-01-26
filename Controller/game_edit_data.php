<?php
    session_start();
    require_once "db_connection.php";

    //redirect to add_game.php if required data are missing.
    if( !isset($_POST['new_game_name']) ||
        !isset($_POST['new_game_description']) ||
        !isset($_POST['new_game_price']) ||
        !isset($_POST['new_game_duration'])||
        !isset($_POST['new_game_editor'])||
        !isset($_POST['new_game_categorie'])||
        !isset($_POST['new_game_age_range'])||
        !isset($_POST['new_game_player_number'])||
        !isset($_POST['new_game_publication_date'])
        ){
            header("Location: ../View/edit_game.php?game_id='. .'");
            exit();
        }
    
    //set data from new_game form.
    $new_game_name = $_POST['new_game_name'];
    $new_game_description = $_POST['new_game_description'];
    $new_game_price = $_POST['new_game_price'];
    $new_game_duration = $_POST['new_game_duration'];
    $new_game_editor = $_POST['new_game_editor'];
    $new_game_categorie = $_POST['new_game_categorie'];
    $new_game_age_range = $_POST['new_game_age_range'];
    $new_game_player_number = $_POST['new_game_player_number'];
    $new_game_publication_date = $_POST['new_game_publication_date'];
    $new_game_id = $_POST['game_to_edit_id'];
    
    // Change avatar if file send by user is correct
    if(isset($_FILES['new_game_picture']) && $_FILES['new_game_picture']["error"] == UPLOAD_ERR_OK){

        // set in a variable extension file
        switch ($_FILES['new_game_picture']['type']){ 
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
        $new_game_picture = "../Picture/Game/game_id_" . $new_game_id . $picture_type;

        // Move file send to a new location
        move_uploaded_file($_FILES['new_game_picture']['tmp_name'],$new_game_picture);
    }else{
        // If no picture upload, recover old picture from database
        $user_profil_picture = $user_data["profil_picture"];
    }

    // Update of database
    $query = "UPDATE `game` SET name = ?, price = ?, game_picture = ?, category_id = ?, editor_id = ?, description = ?, age_range_id = ?, publication_date = ?, game_duration = ?, player_number_id = ? WHERE id = ?";
    $stmt = $dbh_readwrite->prepare($query);
    $stmt->execute([$new_game_name, $new_game_price, $new_game_picture, $new_game_categorie, $new_game_editor, $new_game_description, $new_game_age_range, $new_game_publication_date, $new_game_duration, $new_game_player_number, $new_game_id]);

    header("Location: ../View/profil.php");
    exit();