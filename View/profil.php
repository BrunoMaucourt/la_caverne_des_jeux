<?php
    session_start();
    $title = "Mon profil";
    define("ADMIN_LEVEL", 1);
    define("SELLER_LEVEL", 2);
    require_once "../Controller/check_user_connected.php";
    require_once "../Element/header.php";
?>
<h1>Mon profil</h1>

<div class="container">
    <div class="row mx-auto row-cols-1 row-cols-lg-2 text-center">
    <?PHP
            if($_SESSION['account_level_id'] == ADMIN_LEVEL){
                echo <<<HTML
                <div class="col p-3">
                    <div class="card text-bg-light">
                        <a href="" class="text-decoration-none">
                        <div class="card-header">Ajouter une catégorie de jeux</div>
                        <div class="card-body">
                        <p class="card-text">Ajouter une nouvelle catégorie de jeux</p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col p-3">
                    <div class="card text-bg-light">
                        <a href="" class="text-decoration-none">
                        <div class="card-header">Ajouter une tranche d'âge</div>
                        <div class="card-body">
                        <p class="card-text">Ajouter une nouvelle tranche d'âge</p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col p-3">
                    <div class="card text-bg-light">
                        <a href="" class="text-decoration-none">
                        <div class="card-header">Ajouter un éditeur</div>
                        <div class="card-body">
                        <p class="card-text">Ajouter un nouvel utilisateur</p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col p-3">
                    <div class="card text-bg-light">
                        <a href="" class="text-decoration-none">
                        <div class="card-header">Ajouter un nombre de joueurs</div>
                        <div class="card-body">
                        <p class="card-text">Ajouter un nouveau nombre de joueurs</p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col p-3">
                    <div class="card text-bg-light">
                        <a href="" class="text-decoration-none">
                        <div class="card-header">Modifier utilisateur</div>
                        <div class="card-body">
                        <p class="card-text">Modifier les informations d'un utilisateur</p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col p-3">
                    <div class="card text-bg-light">
                        <a href="" class="text-decoration-none">
                        <div class="card-header">Modifier le status d'un utilisateur</div>
                        <div class="card-body">
                        <p class="card-text">Accorder un nouveau status à un utilisateur</p>
                        </div>
                        </a>
                    </div>
                </div>
HTML;
            }elseif($_SESSION['account_level_id'] == SELLER_LEVEL){
                // vendeur
                echo <<<HTML
                <div class="col p-3">
                    <div class="card text-bg-light">
                        <a href="./add_game.php" class="text-decoration-none">
                        <div class="card-header">Ajouter un jeu</div>
                        <div class="card-body">
                        <p class="card-text">Ajouter un nouveau jeu</p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col p-3">
                    <div class="card text-bg-light">
                        <a href="./add_game.php" class="text-decoration-none">
                        <div class="card-header">Modifier un jeu</div>
                        <div class="card-body">
                        <p class="card-text">Modifier les informations d'un jeu ou le supprimer de la liste</p>
                        </div>
                        </a>
                    </div>
                </div>
HTML;
            }
        ?>
        <div class="col p-3">
            <div class="card text-bg-light">
                <a href="./settings.php" class="text-decoration-none">
                <div class="card-header">Mes informations</div>
                    <div class="card-body">
                        <p class="card-text text-decoration-none">Modifier les informations de mon profil</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col p-3">
            <div class="card text-bg-danger">
                <a href="../Controller/user_disconnect.php" class="text-decoration-none">
                <div class="card-header">Se déconnecter</div>
                    <div class="card-body">
                        <p class="card-text">Vous allez nous manquer</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<?php
    require_once "../Element/footer.php";
?>