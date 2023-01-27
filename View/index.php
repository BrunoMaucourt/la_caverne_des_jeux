<?php
    session_start();
    $title = "Caverne des jeux";
    require_once "../Element/header.php";

    $query = "SELECT * FROM game WHERE 1 ORDER BY publication_date DESC";
    $stmt = $dbh_readonly->query($query);
    $recent_games = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $query = "SELECT * FROM game WHERE 1 ORDER BY sold DESC";
    $stmt = $dbh_readonly->query($query);
    $best_seller_games = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="row g-6">
    <div id="carouselExampleCaptions" class="carousel slide col">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="../Picture/Website/slider1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3>Risk : un incontournable</h3>
                <p>Publié en 1957, Risk reste un incontournable pour tous les joueurs et joueuses.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="../Picture/Website/slider2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3>Notre top 100 des jeux de plateaux</h3>
                <p>Voici notre top 100 des jeux de plateaux.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="../Picture/Website/slider3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3>Les jeux de cartes à emporter en vacances</h3>
                <p>Les vacances approchent, quels jeux de cartes emportés avec vous ?</p>
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

    <div class="row text-center row-cols-1 row-cols-lg-2">
        <div class="col">
            <h2>Meilleures ventes</h2>
            <div class="row text-center">
                <?php
                    for ($i=0; $i < 3; $i++) {
                        echo '<div class="col-4">
                                <p>'.$best_seller_games[$i]["name"].'</p>
                                <img src="'.$best_seller_games[$i]["game_picture"].'" class="w-100 m-2">
                                <p>'.$best_seller_games[$i]["description"].'</p>
                              </div>';
                    }
                ?>
            </div>
        </div>
        <div class="col">
            <h2>Nouveautés</h2>
            <div class="row text-center">
                <?php
                    for ($i=0; $i < 3; $i++) {
                        echo '<div class="col-4">
                                <p>'.$recent_games[$i]['name'].'</p>
                                <img src="'.$recent_games[$i]["game_picture"].'" class="w-100 m-2">
                                <p>'.$recent_games[$i]["description"].'</p>
                            </div>';
                    }
                ?>
            </div>
        </div>
    </div>  

<?php
    require_once "../Element/footer.php";
?>