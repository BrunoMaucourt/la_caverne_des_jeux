<?php
    session_start();
    $title = "Nous contacter";
    require_once "../Element/header.php";
?>
<h1>Nous contacter</h1>
<div class="col-lg-8 col-xl-10 p-3 m-auto">
    <div class="border bg-secondary">
        <form action="./contact_form_sumary.php" method="post">

            <label for="contact_last_name">Votre nom *</label>
            <input type="text" class="form-control" name="contact_last_name" id="contact_last_name" required="required" placeholder="Votre nom">

            <label for="contact_first_name">Votre prénom *</label>
            <input type="text" class="form-control" name="contact_first_name" id="contact_first_name" required="required" placeholder="Votre prénom">

            <label class="sr-only" for="contact_email">Votre adresse email *</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                <div class="input-group-text">@</div>
                </div>  
                <input type="email" class="form-control" name="contact_email" id="contact_email" placeholder="Votre adresse email" required="required">
            </div>

            <div class="form-group row mt-3">
                <label for="" class="col-sm-2 col-form-label">La raison de votre message</label>
                <select class="custom-select w-75" name="contact_motif" id="contact_motif" required='required'>
                    <option value="">Nous poser une question</option>
                    <option selected>Candidater pour un emploi</option>
                    <option value="">Candidature pour un stage non rémunéré</option>
                    <option value="">Engager deux supers développeurs full-stack</option>
                    <option value="">Nous proposer un jeu</option>
                    <option value="">Supprimer son profil</option>
                </select>
            </div>

            <div class="form-group row mt-3">
                <label for="contact_message" class="col-sm-2 col-form-label">Votre message</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="contact_message" id="contact_message" required='required'>Votre message</textarea>
                </div>
            </div>

            <fieldset class="form-group mt-3">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0" for="new_game_categorie">Vous voulez votre réponse par</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="contact_type_email" id="Email" value="Email">
                            <label class="form-check-label" for="Email">
                                Email
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="contact_type_téléphone" id="Téléphone" value="Téléphone">
                            <label class="form-check-label" for="Téléphone">
                                Téléphone
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="contact_type_fumées" id="Signaux de fumées" value="Signaux de fumées">
                            <label class="form-check-label" for="Signaux de fumées">
                                Signaux de fumées
                            </label>
                        </div>                  
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="contact_type_piegons" id="Piegons voyageurs" value="Piegons voyageurs">
                            <label class="form-check-label" for="Piegons voyageurs">
                                Piegons voyageurs
                            </label>
                        </div>         
                    </div>
                </div>
            </fieldset>

            <div class="form-group row mt-5 mb-5">
                <div class="col-sm-10 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Envoyer votre message</button>
                </div>
            </div>

        </form>
    </div>
</div>
<?php
    require_once "../Element/footer.php";
?>