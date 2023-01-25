<?php
    session_start();
    unset($_SESSION["user_id"]);
    unset($_SESSION["account_level_id"]);
    header('Location: ../View/index.php');