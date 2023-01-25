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
<form action="" method="post">
    <div class="form-group row mt-3">
    <label for="" class="col-sm-2 col-form-label">Le nom du jeu</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="" placeholder="Le nom du jeu">
    </div>
    </div>

    <div class="form-group row mt-3">
        <label for="" class="col-sm-2 col-form-label">Description du jeu</label>
        <div class="col-sm-10">
            <input type="textarea" class="form-control" id="" placeholder="Description du jeu">
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="" class="col-sm-2 col-form-label">Le prix du jeu</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="" min="0" step="1.00" placeholder="0.00">
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="" class="col-sm-2 col-form-label">Durée d'une partie</label>
        <div class="col-sm-10">
            <input type="time" class="form-control" id="" placeholder="Durée d'une partie">
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="" class="col-sm-2 col-form-label">Editeur du jeu</label>
        <select class="custom-select">
            <option selected>Editeur du jeu</option>
            <?php
                foreach($editors as $key => $editor){
                    echo '<option value="editeur' . $key .'">' . $editor['name'] . '</option>';
                }
                ?>   
        </select>
    </div>

    <fieldset class="form-group mt-3">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Catégorie du jeu</legend>
            <div class="col-sm-10">
            <?php
                foreach($categories as $key => $categorie){
                    echo '<div class="form-check">';
                    echo '<input class="form-check-input" type="radio" name="categorie" id="categorie' . $key .'" value="categorie'. $key .'">';
                    echo '<label class="form-check-label" for="categorie' . $key .'">';
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
            <legend class="col-form-label col-sm-2 pt-0">/legend>
            <div class="col-sm-10">
            <?php
                foreach($editors as $key => $editor){
                    echo '<div class="form-check">';
                    echo '<input class="form-check-input" type="radio" name="editeur" id="editeur' . $key .'" value="option' . $key .'">';
                    echo '<label class="form-check-label" for="editeur' . $key .'">';
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
            <legend class="col-form-label col-sm-2 pt-0">Rang d'âge du jeu</legend>
            <div class="col-sm-10">
            <?php
                foreach($age_ranges as $key => $age_range){
                    echo '<div class="form-check">';
                    echo '<input class="form-check-input" type="radio" name="age_range" id="age_range' . $key .'" value="age_range' . $key .'">';
                    echo '<label class="form-check-label" for="age_range' . $key .'">';
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
            <legend class="col-form-label col-sm-2 pt-0">Nombre de joueurs</legend>
            <div class="col-sm-10">
            <?php
                foreach($player_numbers as $key => $player_number){
                    echo '<div class="form-check">';
                    echo '<input class="form-check-input" type="checkbox" name="player_number" id="player_number' . $key .'" value="age_range' . $key .'">';
                    echo '<label class="form-check-label" for="player_number' . $key .'">';
                    echo $player_number['player_number'];
                    echo '</label>';
                    echo '</div>';
                }
            ?>        
            </div>
        </div>
    </fieldset>

    <div class="form-group row mt-3">
        <label for="">Date de publication du jeu</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name="" id="">
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="">Photo du jeu          (taille : 1Mo max / format : jpg,jpeg,png)</label>
        <div class="col-sm-10">
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">   
            <input type="file" class="form-control" name="" id="" accept="image/png, image/jpeg, image/jpg">
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