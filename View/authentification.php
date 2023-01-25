<?php
    $title = "Authentification";
    include "header.php";
?>

<h1>Authentifiez vous</h1>
<div class="row row-cols-1 row-cols-lg-2">
    <div class="col p-3">
        <div class="border bg-light">
            <h2 class="text-center">Se connecter</h2>
            <form class="form-group">
                <label class="sr-only" for="inlineFormInputGroupUsername2">Votre adresse email</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                    </div>
                    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Votre adresse email">
                </div>

                <label for="exampleInputPassword1">Mot de passe</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Votre mot de passe">

                <div class="d-flex justify-content-center mt-2 mb-2">
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col p-3">
        <div class="border bg-light">
            <h2 class="text-center">S'inscrire</h2>
            <form class="form-group">
                <label class="sr-only" for="inlineFormInputGroupUsername2">Votre adresse email</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                    </div>
                    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Votre adresse email">
                </div>

                <div class="d-flex justify-content-center mt-2 mb-2">
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    include "footer.php";
?>