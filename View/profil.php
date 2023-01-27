<?php
    session_start();
    $title = "Mon profil";
    require_once "../Controller/check_user_connected.php";
    require_once "../Controller/constant.php";
    require_once "../Element/header.php";
?>
<h1>Mon profil</h1>
<div class="container">
    <div class="row mx-auto row-cols-1 row-cols-lg-2 text-center">
    <?PHP
            if($_SESSION['account_level_id'] == ADMIN_LEVEL){
                echo <<<HTML
                <div class="col p-3">
                    <div class="card text-bg-secondary">
                        <a href="./add_game_categorie.php" class="text-decoration-none">
                        <div class="card-header text-white">Ajouter une catégorie de jeux</div>
                            <div class="card-body">
                                <p class="card-text text-white">Ajouter une nouvelle catégorie de jeux</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col p-3">
                    <div class="card text-bg-secondary">
                        <a href="./add_age_range.php" class="text-decoration-none">
                        <div class="card-header text-white">Ajouter une tranche d'âge</div>
                            <div class="card-body">
                                <p class="card-text text-white">Ajouter une nouvelle tranche d'âge</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col p-3">
                    <div class="card text-bg-secondary">
                        <a href="./add_game.php" class="text-decoration-none text-white">
                        <div class="card-header">Ajouter un éditeur</div>
                            <div class="card-body">
                                <p class="card-text text-white">Ajouter un nouvel utilisateur</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col p-3">
                    <div class="card text-bg-secondary">
                        <a href="./add_player_number.php" class="text-decoration-none">
                        <div class="card-header text-white">Ajouter un nombre de joueurs</div>
                            <div class="card-body">
                                <p class="card-text text-white">Ajouter un nouveau nombre de joueurs</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col p-3">
                    <div class="card text-bg-secondary">
                        <a href="./modify_user.php" class="text-decoration-none">
                        <div class="card-header text-white">Modifier utilisateur</div>
                            <div class="card-body">
                                <p class="card-text text-white">Modifier les informations d'un utilisateur</p>
                            </div>
                        </a>
                    </div>
                </div>
HTML;
            }elseif($_SESSION['account_level_id'] == SELLER_LEVEL){
                // vendeur
                echo <<<HTML
                <div class="col p-3">
                    <div class="card text-bg-secondary">
                        <a href="./add_game.php" class="text-decoration-none">
                        <div class="card-header text-white">Ajouter un jeu</div>
                            <div class="card-body">
                                <p class="card-text text-white">Ajouter un nouveau jeu</p>
                            </div>
                        </a>
                    </div>
                </div>
HTML;
            }
        ?>
        <div class="col p-3">
            <div class="card text-bg-secondary">
                <a href="./settings.php" class="text-decoration-none">
                <div class="card-header text-white">Mes informations</div>
                    <div class="card-body">
                        <p class="card-text text-decoration-none text-white">Modifier les informations de mon profil</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col p-3">
            <div class="card text-bg-danger">
                <a href="../Controller/user_disconnect.php" class="text-decoration-none">
                <div class="card-header text-white">Se déconnecter</div>
                    <div class="card-body">
                        <p class="card-text text-white">Vous allez nous manquer</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<?php
    require_once "../Element/footer.php";
?>