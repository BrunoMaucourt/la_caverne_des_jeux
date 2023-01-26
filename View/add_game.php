<?php
    session_start();
    $title = "Ajouter un jeu";
    require_once "../Controller/check_user_connected.php";
    require_once "../Controller/constant.php";
    require_once "../Controller/check_is_seller.php";
    require_once "../Controller/db_connection.php";
    require_once "../Model/data_game.php";
    require_once "../Element/header.php";
?>
<h1>Ajouter un nouveau jeu</h1>
<form action="../Controller/add_new_game_form.php" method="post" enctype="multipart/form-data">
    <div class="form-group row mt-3">
    <label for="new_game_name" class="col-sm-2 col-form-label">Le nom du jeu</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="new_game_name" id="new_game_name" placeholder="Le nom du jeu" required='required'>
    </div>
    </div>

    <div class="form-group row mt-3">
        <label for="new_game_description" class="col-sm-2 col-form-label">Description du jeu</label>
        <div class="col-sm-10">
            <textarea type="" class="form-control" name="new_game_description" id="new_game_description" required='required'>Description du jeu</textarea>
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="new_game_price" class="col-sm-2 col-form-label">Le prix du jeu</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="new_game_price" id="new_game_price" min="0" step="0.01" placeholder="0,00" required='required'>
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="new_game_duration" class="col-sm-2 col-form-label">Durée d'une partie (en minutes)</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="new_game_duration" min="0" id="new_game_duration" placeholder="Durée d'une partie (en minutes)" required='required'>
        </div>
    </div>
    <!--
    <div class="form-group row mt-3">
        <label for="new_game_editor" class="col-sm-2 col-form-label">Editeur du jeu</label>
        <select class="custom-select" name="new_game_editor" id="new_game_editor" required='required'>
            <option selected>Editeur du jeu</option>
            <?php
                //foreach($editors as $key => $editor){
                //    echo '<option value="editeur' . $key .'">' . $editor['name'] . '</option>';
                //}
                ?>   
        </select>
    </div>
    -->

    <fieldset class="form-group mt-3">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0" for="new_game_categorie">Editeur du jeu</legend>
            <div class="col-sm-10">
            <?php
                foreach($editors as $key => $editor){
                    echo '<div class="form-check">';
                    echo '<input class="form-check-input" type="radio" name="new_game_editor" id="new_game_editor' . $key .'" value=" '. $editor['id'] . '">';
                    echo '<label class="form-check-label" for="new_game_editor' . $key .'">';
                    echo $editor['name'];
                    echo '</label>';
                    echo '</div>';
                }
            ?>        
            </div>
        </div>
    </fieldset>

    <fieldset class="form-group mt-3">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0" for="new_game_categorie">Catégorie du jeu</legend>
            <div class="col-sm-10">
            <?php
                foreach($categories as $key => $categorie){
                    echo '<div class="form-check">';
                    echo '<input class="form-check-input" type="radio" name="new_game_categorie" id="new_game_categorie' . $key .'" value="  '. $categorie['id'] .' ">';
                    echo '<label class="form-check-label" for="new_game_categorie' . $key .'">';
                    echo $categorie['name'];
                    echo '</label>';
                    echo '</div>';
                }
            ?>        
            </div>
        </div>
    </fieldset>

    <fieldset class="form-group mt-3">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0" for="new_game_age_range">Rang d'âge du jeu</legend>
            <div class="col-sm-10">
            <?php
                foreach($age_ranges as $key => $age_range){
                    echo '<div class="form-check">';
                    echo '<input class="form-check-input" type="radio" name="new_game_age_range" id="new_game_age_range' . $key .'" value=" '. $age_range['id'] .' ">';
                    echo '<label class="form-check-label" for="new_game_age_range' . $key .'">';
                    echo $age_range['age_range'];
                    echo '</label>';
                    echo '</div>';
                }
            ?>        
            </div>
        </div>
    </fieldset>

    <fieldset class="form-group mt-3">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0" for="new_game_player_number">Nombre de joueurs</legend>
            <div class="col-sm-10">
            <?php
                foreach($player_numbers as $key => $player_number){
                    echo '<div class="form-check">';
                    echo '<input class="form-check-input" type="radio" name="new_game_player_number" id="new_game_player_number' . $key .'" value=" ' . $player_number['id'] . ' ">';
                    echo '<label class="form-check-label" for="new_game_player_number' . $key .'">';
                    echo $player_number['player_number'];
                    echo '</label>';
                    echo '</div>';
                }
            ?>        
            </div>
        </div>
    </fieldset>

    <div class="form-group row mt-3">
        <label for="new_game_publication_date">Date de publication du jeu</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name="new_game_publication_date" id="new_game_publication_date" required='required'>
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="new_game_picture">Photo du jeu          (taille : 1Mo max / format : jpg,jpeg,png)</label>
        <div class="col-sm-10">
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">   
            <input type="file" class="form-control" name="new_game_picture" id="new_game_picture" accept="image/png, image/jpeg, image/jpg" required='required'>
        </div>
    </div>

  <div class="form-group row mt-5">
    <div class="col-sm-10 d-flex justify-content-center">
      <button type="submit" class="btn btn-primary">Ajouter le jeu</button>
    </div>
  </div>
</form>
<?php
    require_once "../Element/footer.php";
?>