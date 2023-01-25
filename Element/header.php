<?php
    require_once "../Controller/db_connection.php";
    if(!isset($_SESSION['user_id'])){
        $user_is_connected = false;
    }else{
        $user_is_connected = true;
        $query = "SELECT first_name FROM user WHERE id = ?";
        $stmt = $dbh_readonly->prepare($query);
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
       

    

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Style/style.css">
    <title><?php echo $title ?></title>
</head>
<body class="container">
    <header>
        <div id="banner" >
            <h2>Caverne des jeux</h2>
            <?php if($user_is_connected){
                echo "<h3>Bonjour ".$user['first_name']." !</h3>";
                echo'<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a href="../Controller/authentification.php">
                    <button type="button" class="btn btn-danger">Mon Profil</button>
                </a>
                <a href="./cart.php">
                    <button type="button" class="btn btn-warning">Panier</button>
                </a>
            </div>';
            }else{
                echo'<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a href="./authentification.php">
                    <button type="button" class="btn btn-danger">Connexion</button>
                </a>
                <a href="./cart.php">
                    <button type="button" class="btn btn-warning">Panier</button>
                </a>
            </div>';
            }?>
            
        </div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <!-- burger menu with responsive -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                    </li>

                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Catégorie
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Solo</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Famille</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Coopératif</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Expert</a></li>
                    </ul>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Editeur
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Solo</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Famille</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Coopératif</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Expert</a></li>
                    </ul>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Age
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Solo</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Famille</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Coopératif</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Expert</a></li>
                    </ul>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Durée
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Solo</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Famille</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Coopératif</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Expert</a></li>
                    </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">rechercher</button>
                </form>
                </div>
            </div>
        </nav>
    </header>
<main class="container">