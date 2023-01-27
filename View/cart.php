<?php
    session_start();
    $title = "Mon panier";

    //var to display or not user cart
    $display_cart = false;

    //if the user is not connected
    if(!isset($_SESSION['user_id'])){
        require_once "../Element/header.php";
        
        //check if a session cart exist
        //if not we set the display to false
        if(!isset($_SESSION['non_registered_user_cart'])){
            $display_cart = false;

        //else we set the display to true
        //with the SESSION card, making a array with same keys as a SQLquery array
        }else{
            $display_cart = true;
            $non_registered_user_cart = $_SESSION['non_registered_user_cart'];
            $temp_cart = array();
            $cart = array();
            $index = 0;
            foreach ($non_registered_user_cart as $key => $game) {
                $query = "SELECT name, price, game_picture, description FROM game WHERE game.id = $key";
                $stmt = $dbh_readonly->query($query);
                $cart[$index] = $stmt->fetch(PDO::FETCH_ASSOC);
                $cart[$index]['quantity'] = $game;
                $cart[$index]['game_id'] = $key;
                $index++;
            }            
        } 
    //if user is connected               
    }else{
        require_once "../Controller/check_is_client.php";
        require_once "../Element/header.php";

        //first sql query to get all the product the user cart DB
        $query = "SELECT COUNT(*) number FROM user_cart WHERE user_id = ?";
        $stmt = $dbh_readonly->prepare($query);
        $stmt->execute([$_SESSION['user_id']]);
        $cart = $stmt->fetch(PDO::FETCH_ASSOC);

        //if there is no product in the array we set the display to false
        if($cart['number'] == 0){
            $display_cart = false;

        //if there is at least one product,we set the display to true
        //then we make an assoc array wi the different product ant their quantities
        }else{
            $display_cart = true;
            $query = "SELECT user_id,UC.game_id, COUNT(*) quantity, G.name, G.price, G.game_picture, G.description FROM `user_cart` UC INNER JOIN game G ON G.id = UC.game_id WHERE UC.user_id = ? GROUP BY game_id";
            $stmt = $dbh_readonly->prepare($query);
            $stmt->execute([$_SESSION['user_id']]);
            $cart = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }    
        
    
    //at this point, in both case (connected or not) we have an array named $cart
    //we generate a dynamic html with it.
    echo "<h1>Mon panier</h1>";

    if(!$display_cart){
        echo '<div class="row row-cols-4 m-5 text-center">
        <div class="col-4 m-auto border">
            <h3> Votre Panier est vide </h3>
        </div>
    </div>';
    }else{
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
        echo '<div class="row row-cols-5 m-3 text-center">
            <div class = "col-2 m-auto">
                <a href = "../Controller/empty_cart.php">
                    <button type="button" class="btn btn-danger">Vider le panier</button>
                </a>
            </div>
            <div class="col-3 m-auto border">
                <div class="row">
                    <h3>PRIX TOTAL DE VOTRE PANIER</h3>
                </div>
                <div class="row">
                    <h3>';
                        $total = 0;
                        foreach ($cart as $product) {
                            $total += $product['price']*$product['quantity'];
                        }
                        echo number_format($total,2)."€".'
                    </h3>
                </div>
            </div>
            
        </div>
        <div class="row row-cols-12 m-auto">
    <div class="col-2 m-auto">
        <button type="button" class="btn btn-success">Payer votre panier</button>
    </div>                      
</div>';
    }    
?>




<?php
    require_once "../Element/footer.php";
?>