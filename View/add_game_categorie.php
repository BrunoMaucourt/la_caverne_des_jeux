<?php
    session_start();
    $title = "Ajouter une catégorie de jeu";
    require_once "../Controller/check_user_connected.php";
    require_once "../Controller/constant.php";
    require_once "../Controller/check_is_admin.php";
    require_once "../Element/header.php";
?>

<?php
    require_once "../Element/footer.php";
?>