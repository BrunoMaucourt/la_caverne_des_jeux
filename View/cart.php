<?php
    session_start();
    $title = "Mon panier";
    if(!isset($_SESSION['user_id'])){
        require_once "../Element/header.php";
        
    }else{
        require_once "../Controller/check_is_client.php";
        require_once "../Element/header.php";

        $query = "SELECT user_id,UC.game_id, COUNT(*) quantity, G.name, G.price, G.game_picture, G.description FROM `user_cart` UC INNER JOIN game G ON G.id = UC.game_id WHERE UC.user_id = ? GROUP BY game_id";
        $stmt = $dbh_readonly->prepare($query);
        $stmt->execute([$_SESSION['user_id']]);
        $cart = $stmt->fetchAll(PDO::FETCH_ASSOC);


        echo "<h1>Mon panier</h1>";

        foreach ($cart as $product) {
            echo '<div class="row row-cols-12 m-3 border">
                    <div class="col-2 border d-flex justify-content-center align-items-center">
                        <img class="card-img-top" src="'.$product['game_picture'].'">
                    </div>
                    <div class="col-6 text-center m-auto">
                        <div class="row">
                            <h3>'.$product['name'].'</h3>
                        </div>
                        <div class="row">
                            <h6>Description</h6>
                            <p>'.$product['description'].'</p>
                        </div>
                    </div>
                    <div class="col-2 m-auto text-center">
                        <h3>Quantité : '.$product['quantity'].'</h3>
                        
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <form method="post" action="../Controller/modify_cart.php">
                                <input type="hidden" name="product_id" value="'.$product['game_id'].'">
                                <button type="submit" name="quantity_btn" value="less" class="btn btn-outline-primary">-</button>
                            </form>
                            <form method="post" action="../Controller/modify_cart.php">
                                <input type="hidden" name="product_id" value="'.$product['game_id'].'">
                                <button type="submit" name="quantity_btn" value="plus" class="btn btn-outline-primary">+</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-2 m-auto text-center">
                        <h3>Prix total</h3>
                        <p>'.number_format($product['price']*$product['quantity'],2).' €</p>
                    </div>  
                 </div>';
        }
    }
    
?>


<?php
    
?>
<div class="row row-cols-3 m-3 text-center">
    <div class="col-auto m-auto border">
        <div class="row">
            <h3>PRIX TOTAL DE VOTRE PANIER</h3>
        </div>
        <div class="row">
            <h3><?php  
                $total = 0;
                foreach ($cart as $product) {
                    $total += $product['price']*$product['quantity'];
                }
                echo number_format($total,2)."€";
            ?></h3>
        </div>
        

    </div>       
</div>
<div class="row row-cols-12 m-auto">
    <div class="col-2 m-auto">
        <button type="button" class="btn btn-success">Payer votre panier</button>
    </div>                      
</div>
<?php
    require_once "../Element/footer.php";
?>