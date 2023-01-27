<?php
    require_once "../Controller/db_connection.php";
    require_once "../Controller/constant.php";
    if(!isset($_SESSION['user_id'])){
        $user_is_connected = false;
    }else{
        $user_is_connected = true;
        $query = "SELECT first_name FROM user WHERE id = ?";
        $stmt = $dbh_readonly->prepare($query);
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

    }
    require_once "../Model/data_game.php";

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
    <link rel="icon" type="image/x-icon" href="../Picture/Website/favicon.svg">
    <title><?php echo $title ?></title>
</head>
<body class="container"
<?PHP require_once "../Controller/theme_connected_user.php"?>
>
    <header class="container">
        <div class="row">
            <div class="col-3 text-center">
                <h2>Caverne des jeux</h2>
            </div>
            <div class="col-5">
                
                <?php 
                    if($user_is_connected){
                        echo '<div class="row m-auto text-center d-flex justify-content-center align-item-center">
                                <div class="col m-auto">
                                    <h3>Bonjour '.$user['first_name'].' !</h3>
                                </div>
                                <div class="col m-auto">
                                    <figure class="m-auto">
                                        <img  style="max-height:35px;" src=" '. $user_data['profil_picture'] . ' " alt="Photo de profil">
                                    </figure>
                                </div>
                              </div>';
                    }
                ?>
            </div>
            <div class="col-4 d-flex justify-content-between m-auto">
                    <?php
                        if($user_is_connected){
                            echo '<a href="../View/profil.php">
                                    <button type="button" class="btn btn-danger">Mon Profil</button>
                                  </a>';
                            if($_SESSION['account_level_id'] == CLIENT_LEVEL){
                                echo'<a href="./cart.php">
                                        <button type="button" class="btn btn-success">Panier</button>
                                     </a>';
                            } 
                        }else{
                            echo '<a href="../View/authentification.php">
                                     <button type="button" class="btn btn-danger">Connexion</button>
                                  </a>
                                  <a href="./cart.php">
                                      <button type="button" class="btn btn-success">Panier</button>
                                  </a>';

                        }
                        echo '<form action="../Controller/theme_switch.php" method="post">
                                <input type="submit" class="btn btn-warning" value="Thème">
                               </form>';
                    ?>
            </div>
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
                    <a class="nav-link active" aria-current="page" href="../View/index.php">Accueil</a>
                    </li>

                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Catégorie
                    </a>
                    <a href=""></a>
                    <ul class="dropdown-menu">
                        <?php 
                            foreach ($categories as $key=>$category) {
                                if(count($categories)-1 == $key){
                                    echo '<li><a class="dropdown-item" href="./games.php?page=category&id='.$category['id'].'">'.$category['name']. '</a></li>';
                                }else{
                                    echo '<li><a class="dropdown-item" href="./games.php?page=category&id='.$category['id'].'">'.$category['name']. '</a></li><li><hr class="dropdown-divider"></li>';
                                }                                  
                            }
                        ?>
                    </ul>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Editeur
                    </a>
                    <ul class="dropdown-menu">
                        <?php 
                            foreach ($editors as $key=>$editor) {
                                if(count($editors)-1 == $key){
                                    echo '<li><a class="dropdown-item" href="./games.php?page=editor&id='.$editor['id'].'">'.$editor['name']. '</a></li>';
                                }else{
                                    echo '<li><a class="dropdown-item" href="./games.php?page=editor&id='.$editor['id'].'">'.$editor['name']. '</a></li><li><hr class="dropdown-divider"></li>';
                                }                                  
                            }
                        ?>
                    </ul>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Age
                    </a>
                    <ul class="dropdown-menu">
                        <?php 
                            foreach ($age_ranges as $key=>$age_range) {
                                if(count($age_ranges)-1 == $key){
                                    echo '<li><a class="dropdown-item" href="./games.php?page=age_range&id='.$age_range['id'].'">'.$age_range['age_range']. '</a></li>';
                                }else{
                                    echo '<li><a class="dropdown-item" href="./games.php?page=age_range&id='.$age_range['id'].'">'.$age_range['age_range']. '</a></li><li><hr class="dropdown-divider"></li>';
                                }                                  
                            }
                        ?>
                    </ul>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Nombre de Joueur
                    </a>
                    <ul class="dropdown-menu">
                        <?php 
                            foreach ($player_numbers as $key=>$player_number) {
                                if(count($player_numbers)-1 == $key){
                                    echo '<li><a class="dropdown-item" href="./games.php?page=player_number&id='.$player_number['id'].'">'.$player_number['player_number']. '</a></li>';
                                }else{
                                    echo '<li><a class="dropdown-item" href="./games.php?page=player_number&id='.$player_number['id'].'">'.$player_number['player_number']. '</a></li><li><hr class="dropdown-divider"></li>';
                                }                                  
                            }
                        ?>
                    </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search" method="get" action="../Controller/search.php">
                    <input class="form-control me-2" type="search" placeholder="Rechercher" name="search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">rechercher</button>
                </form>
                </div>
            </div>
        </nav>
    </header>
<main class="container">