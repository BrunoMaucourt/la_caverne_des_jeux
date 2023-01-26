<?php
    session_start();
    $title = "Mon panier";
    if(!isset($_SESSION['user_id'])){
        
    }else{
        require_once "../Controller/check_is_client.php";
    }
    require_once "../Element/header.php";
?>
<h1>Mon panier</h1>
<div class="row row-cols-1 row-cols-lg-2">
    <div class="col-8 p-3">
        <div class="border bg-light">

        </div>
    </div>
    <div class="col-4 p-3">
        <div class="border bg-light">
            <button type="button" class="btn btn-success">Payer votre panier</button>            
        </div>
    </div>
</div>
<?php
    require_once "../Element/footer.php";
?>