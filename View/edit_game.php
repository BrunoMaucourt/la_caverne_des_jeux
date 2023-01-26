<?php
    session_start();
    $title = "Modifier un jeu";
    // Check if user is allowed to go to this page
    require_once "../Controller/check_user_connected.php";
    require_once "../Controller/constant.php";
    require_once "../Controller/check_is_seller.php";
    // recover data about game
    if(isset($_GET['game_id'])){
        $game_id = $_GET['game_id'];
        require_once "../Controller/db_connection.php";
        require_once "../Model/data_game_to_edit.php";
    }else{
        header("Location: ./index.php");
    }
    require_once "../Element/header.php";
?>
<h1>Modifier les informations d'un jeu</h1>

<form action="../Controller/game_edit_data.php" method="post" enctype="multipart/form-data">
    <div class="form-group row mt-3">
    <label for="new_game_name" class="col-sm-2 col-form-label">Le nom du jeu</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="new_game_name" id="new_game_name" placeholder="Le nom du jeu" required='required' value="<?php echo $game_to_edit['name']; ?>">
    </div>
    </div>

    <div class="form-group row mt-3">
        <label for="new_game_description" class="col-sm-2 col-form-label">Description du jeu</label>
        <div class="col-sm-10">
            <textarea type="" class="form-control" name="new_game_description" id="new_game_description" required='required'><?php echo $game_to_edit['description']; ?></textarea>
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="new_game_price" class="col-sm-2 col-form-label">Le prix du jeu</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="new_game_price" id="new_game_price" min="0" step="0.01" value="<?php echo $game_to_edit['price']; ?>" required='required'>
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="new_game_duration" class="col-sm-2 col-form-label">Durée d'une partie (en minutes)</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="new_game_duration" min="0" id="new_game_duration" value="<?php echo $game_to_edit['game_duration']; ?>" required='required'>
        </div>
    </div>

    <fieldset class="form-group mt-3">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0" for="new_game_categorie">Editeur du jeu</legend>
            <div class="col-sm-10">
            <?php
                foreach($editors as $key => $editor){
                    echo '<div class="form-check">';
                    // Check if current editor is egal to old editor in database.
                    if($game_to_edit['editor_id'] == $editor['id']){
                        echo '<input class="form-check-input" type="radio" name="new_game_editor" id="new_game_editor' . $key .'" value=" '. $editor['id'] . '" checked>';
                    }else{
                        echo '<input class="form-check-input" type="radio" name="new_game_editor" id="new_game_editor' . $key .'" value=" '. $editor['id'] . '">';
                    }
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
                    if($game_to_edit['category_id'] == $categorie['id']){
                        echo '<input class="form-check-input" type="radio" name="new_game_categorie" id="new_game_categorie' . $key .'" value="  '. $categorie['id'] .' " checked>';
                    }else{
                        echo '<input class="form-check-input" type="radio" name="new_game_categorie" id="new_game_categorie' . $key .'" value="  '. $categorie['id'] .' ">';
                    }
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
                    if($game_to_edit['age_range_id'] == $age_range['id']){
                        echo '<input class="form-check-input" type="radio" name="new_game_age_range" id="new_game_age_range' . $key .'" value=" '. $age_range['id'] .' " checked>';
                    }else{
                        echo '<input class="form-check-input" type="radio" name="new_game_age_range" id="new_game_age_range' . $key .'" value=" '. $age_range['id'] .' ">';
                    }
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
                    if($game_to_edit['player_number_id'] == $player_number['id']){
                        echo '<input class="form-check-input" type="radio" name="new_game_player_number" id="new_game_player_number' . $key .'" value=" ' . $player_number['id'] . ' " checked>';
                    }else{
                        echo '<input class="form-check-input" type="radio" name="new_game_player_number" id="new_game_player_number' . $key .'" value=" ' . $player_number['id'] . ' ">';
                    }
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
            <input type="date" class="form-control" name="new_game_publication_date" id="new_game_publication_date" value="<?php echo $game_to_edit['publication_date']; ?>" required='required'>
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="new_game_picture">Photo du jeu          (taille : 1Mo max / format : jpg,jpeg,png)</label>
        <figure>
                    <img class="w-25" src="<?php echo $game_to_edit['game_picture']; ?>" alt="Photo du jeu">
                </figure>
        <div class="col-sm-10">
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">   
            <input type="file" class="form-control" name="new_game_picture" id="new_game_picture" accept="image/png, image/jpeg, image/jpg" required='required'>
        </div>
    </div>

    <input type="hidden" name="game_to_edit_id" value="<?php echo $game_id; ?>"> 

    <div class="form-group row mt-5">
        <div class="col-sm-10 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Ajouter le jeu</button>
        </div>
    </div>
</form>
<?php
    require_once "../Element/footer.php";
?>