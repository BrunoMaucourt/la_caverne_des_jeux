<?php
    session_start();
    $title = "Modifier un jeu";
    require_once "../Controller/check_user_connected.php";
    require_once "../Controller/constant.php";
    require_once "../Controller/check_is_seller.php";
    require_once "../Element/header.php";
?>

<?php
    require_once "../Element/footer.php";
?>