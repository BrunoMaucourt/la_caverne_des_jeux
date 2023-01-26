<?php
    $query = "SELECT * FROM game WHERE 1";
    $stmt = $dbh_readonly->query($query);
    $games = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $query = "SELECT * FROM category WHERE 1";
    $stmt = $dbh_readonly->query($query);
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $query = "SELECT * FROM editor WHERE 1";
    $stmt = $dbh_readonly->query($query);
    $editors = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $query = "SELECT * FROM age_range WHERE 1";
    $stmt = $dbh_readonly->query($query);
    $age_ranges = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $query = "SELECT * FROM player_number WHERE 1";
    $stmt = $dbh_readonly->query($query);
    $player_numbers = $stmt->fetchAll(PDO::FETCH_ASSOC);