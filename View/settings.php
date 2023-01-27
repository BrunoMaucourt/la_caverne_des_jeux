<?php
    session_start();
    $title = "Mes paramètres";
    require_once "../Controller/check_user_connected.php";
    // Recover data of user from database
    require_once "../Controller/db_connection.php";
    require_once "../Model/data_user.php";
    require_once "../Element/header.php";
?>
<h1>Modifier mes informations</h1>
<div class="col-lg col-xl-6 p-3 m-auto">
    <div class="border bg-secondary">
        <h2 class="text-center">Mes informations</h2>
        <form class="form-group" action="../Controller/user_update_data.php" method ="post" enctype="multipart/form-data">
            <label class="sr-only" for="user_email">Mon adresse email</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                <div class="input-group-text">@</div>
                </div>  
                <input type="email" class="form-control" name="user_email" id="user_login_email" value="<?php echo $user_data['email']; ?>">
            </div>

            <label for="user_password">Mon mot de passe*</label>
            <input type="password" class="form-control" name="user_password" id="user_password"  required="required" placeholder="Votre mot de passe">

            <label for="user_last_name">Mon nom*</label>
            <input type="text" class="form-control" name="user_last_name" id="user_last_name" required="required" value="<?php echo $user_data['last_name']; ?>">

            <label for="user_first_name">Mon prénom*</label>
            <input type="text" class="form-control" name="user_first_name" id="user_first_name" required="required" value="<?php echo $user_data['first_name']; ?>">

            <label for="user_birthdate">Ma date de naissance</label>
            <input type="date" class="form-control" name="user_birthdate" id="user_birthdate" value="<?php echo $user_data['birthdate']; ?>">

            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
            <label for="user_profil_picture">Ma photo de profil            (taille : 1Mo max / format : jpg,jpeg,png)</label>
            <figure>
                <img class="w-25" src="<?php echo $user_data['profil_picture']; ?>" alt="Photo de profil">
            </figure>
            <input type="file" class="form-control" name="user_profil_picture" id="user_profil_picture" accept="image/png, image/jpeg, image/jpg">                

            <fieldset class="form-group mt-3">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0" for="new_game_age_range">Thème du site</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="user_theme" id="user_theme_light" value="0" required>
                                <label class="form-check-label" for="user_theme_light">
                                    Thème clair
                                </label>
                        </div>   
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="user_theme" id="user_theme_dark" value="1">
                                <label class="form-check-label" for="user_theme_dark">
                                    Thème foncé
                                </label>
                        </div>     
                    </div>
                </div>
            </fieldset>

            <div class="d-flex justify-content-center mt-2 mb-2">
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </div>
        </form>
    </div>
    <p class="text-center">* sont obligatoires</p>
</div>
<?php
    require_once "../Element/footer.php";
?>