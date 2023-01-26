<?php

    $query = "SELECT * FROM game WHERE id = ?";
    $stmt = $dbh_readonly->prepare($query);
    $stmt->execute([$game_id]);
    $game_to_edit = $stmt->fetch(PDO::FETCH_ASSOC);