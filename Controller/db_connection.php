<?php

// Login informations
define('DB_HOST','localhost');
define('DB_NAME','la_caverne_des_jeux');
define('DB_USERNAME_READ','readonly');
define('DB_USERNAME_READWRITE','readwrite');
define('DB_PASSWORD_READ','readonly');
define('DB_PASSWORD_READWRITE','readwrite');
define('DB_DSN','mysql:dbname='.DB_NAME.';host='.DB_HOST.';port=3306;charset=UTF8');

// connection to database
$dbh_readonly = new PDO(DB_DSN, DB_USERNAME_READ, DB_PASSWORD_READ);

$dbh_readwrite = new PDO(DB_DSN, DB_USERNAME_READWRITE, DB_PASSWORD_READWRITE);