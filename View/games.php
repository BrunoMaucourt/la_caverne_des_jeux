<?php
    session_start();
    $title = "Caverne des jeux";
    require_once "../Element/header.php";
    require_once "../Controller/constant.php";

    $db_table = $_GET['page'];
    $db_table_plus = $_GET['page']."_id";
    $db_table_id = $_GET['id'];

    $query = "SELECT G.* FROM game G INNER JOIN $db_table A ON G.$db_table_plus = A.id WHERE A.id = $db_table_id";
    $editor_query = "SELECT * FROM editor WHERE 1";
    $stmt = $dbh_readonly->query($query);
    $games = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
?>

<?php
    foreach ($games as $game) {
        echo '<div class="row row-cols-12 text-center border m-3">
        <div class="col-2 border">
            <img src="../Picture/Avatar/default_avatar.jpg" class="card-img-top ">
        </div>
        <div class="col-6 m-auto">
            <div class="row">
                <h3>'.$game['name'].'</h3>
            </div>
            <div class="row">
                <h6>Déscription</h6>
                <p>'.$game['description'].'</p>
            </div>
        </div>
        <div class="col-2 m-auto">
            <div class="row">
                Editeur : '.$editors[$game['editor_id']-1]['name'].'
            </div>
            <div class="row">
                Catégorie : '.$categories[$game['category_id']-1]['name'].'
            </div>
            <div class="row">
                Age : '.$age_ranges[$game['age_range_id']-1]['age_range'].'
            </div>
            <div class="row">
                '.$player_numbers[$game['player_number_id']-1]['player_number'].'
            </div>
        </div>
        <div class="col-2 m-auto">
            <div class="row">
                <h4>'.number_format($game['price'],2). '€</h4>
            </div>';
            if(!isset($_SESSION['account_level_id']) || $_SESSION['account_level_id'] == CLIENT_LEVEL){
                echo '<a href="#" class="btn btn-primary">Ajouter au panier</a>';
            }else{
                echo '<a href="#" class="btn btn-primary">Modifier article</a>';
            }
            echo '
        </div> 
</div>';
    }
?>


<?php
    require_once "../Element/footer.php";
?>