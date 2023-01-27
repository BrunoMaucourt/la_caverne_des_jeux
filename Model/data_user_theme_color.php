<?php
    // query to get data from user based on id
    $query = "UPDATE `user` SET light_dark = ?  WHERE id = ?";
    $stmt = $dbh_readwrite->prepare($query);
    $stmt->execute([$_SESSION['theme'], $_SESSION['user_id']]);