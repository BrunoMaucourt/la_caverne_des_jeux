<?php
    // query to get data from user based on id
    $query = "SELECT * FROM user WHERE email = ?";
    $stmt = $dbh_readonly->prepare($query);
    $stmt->execute([$_SESSION['user_id']]);
    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);