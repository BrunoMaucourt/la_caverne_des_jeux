<?php
    session_start();
    $title = "Mon profil";
    require_once "../Controller/check_user_connected.php";
    require_once "../Element/header.php";
?>
<h1>Mon profil</h1>

<div class="container mx-auto row-cols-1 row-cols-lg-2">
    <div class="row text-center">
        <div class="col p-3">
            <div class="card text-bg-info">
                <a href="" class="text-decoration-none">
                <div class="card-header">Mes informations</div>
                    <div class="card-body">
                        <h5 class="card-title text-decoration-none">Info card title</h5>
                        <p class="card-text text-decoration-none">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col p-3">
            <div class="card text-bg-danger">
                <a href="" class="text-decoration-none">
                <div class="card-header">Se déconnecter</div>
                    <div class="card-body">
                        <h5 class="card-title">Info card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </a>
            </div>
        </div>
        <?PHP
            if($_SESSION['account_level_id'] == 1){
                // admin
                echo '<div class="col p-3">';
                echo '<div class="card text-bg-danger">';
                echo '<a href="" class="text-decoration-none">';
                echo '<div class="card-header">Se déconnecter</div>';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">Info card title</h5>';
                echo '<p class="card-text">Some quick example text to build on the card title and make up the bulk of the cardcontent.</p>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
                echo '</div>';

                // Ajouter tranche age
                // AJouter éditeur
                // AJouter nombre joueur
                // Modifier utilisateur
                // Modifier status utilisateur
            }elseif($_SESSION['account_level_id'] == 2){
                // vendeur
                echo <<<HTML
                <div class="col p-3">
                    <div class="card text-bg-danger">
                        <a href="" class="text-decoration-none">
                        <div class="card-header">Ajouter jeu</div>
                        <div class="card-body">
                        <h5 class="card-title">Info card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cardcontent.</p>
                        </div>
                        </a>
                    </div>
                </div>
HTML;
            }
            ?>
    </div>
</div>

<?PHP
if($_SESSION['account_level_id'] == 1){
    // admin
    // AJouter catégorie
    // Ajouter tranche age
    // AJouter éditeur
    // AJouter nombre joueur
    // Modifier utilisateur
    // Modifier status utilisateur
}elseif($_SESSION['account_level_id'] == 2){
    // vendeur
    // ajouter un jeu
}else{
    // Client
    // Mon Panier
}

    // Mes informations
    // Se déconnecter


?>




<?php
    require_once "../Element/footer.php";
?>