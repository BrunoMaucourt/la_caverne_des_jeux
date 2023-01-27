<?php
    session_start();
    require_once "db_connection.php";
    $search = $_GET["search"];

    //space search input are not allowed. send back to last visited page.
    if($search =="" || $search == " " || $search == "  " || $search == "   "){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    //if the input is correct
    }else{
        $query = "SELECT * FROM `game` WHERE name LIKE '%$search%' OR description LIKE '%$search%' ";
        $stmt = $dbh_readonly->query($query);
        $games = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    $_SESSION['searched_games'] = $games;
    header('Location: ../View/display_search.php');
?>