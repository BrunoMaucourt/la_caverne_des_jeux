<?php

    $query = "SELECT name, id FROM category WHERE 1";
    $stmt = $dbh_readonly->query($query);
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $query = "SELECT name, id FROM editor WHERE 1";
    $stmt = $dbh_readonly->query($query);
    $editors = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $query = "SELECT age_range, id FROM age_range WHERE 1";
    $stmt = $dbh_readonly->query($query);
    $age_ranges = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $query = "SELECT player_number, id FROM player_number WHERE 1";
    $stmt = $dbh_readonly->query($query);
    $player_numbers = $stmt->fetchAll(PDO::FETCH_ASSOC);