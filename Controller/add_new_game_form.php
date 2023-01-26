<?PHP
session_start();
require_once "db_connection.php";

//redirect to add_game.php if required data are missing.
if( !isset($_POST['new_game_name']) ||
    !isset($_POST['new_game_description']) ||
    !isset($_POST['new_game_price']) ||
    !isset($_POST['new_game_duration'])||
    !isset($_POST['new_game_editor'])||
    !isset($_POST['new_game_categorie'])||
    !isset($_POST['new_game_age_range'])||
    !isset($_POST['new_game_player_number'])||
    !isset($_POST['new_game_publication_date'])||
    !isset($_FILES['new_game_picture'])){
        header("Location: ../View/add_game.php");
        exit();
    }

//set data from new_game form.
$new_game_name = $_POST['new_game_name'];
$new_game_description = $_POST['new_game_description'];
$new_game_price = $_POST['new_game_price'];
$new_game_duration = $_POST['new_game_duration'];
$new_game_editor = $_POST['new_game_editor'];
$new_game_categorie = $_POST['new_game_categorie'];
$new_game_age_range = $_POST['new_game_age_range'];
$new_game_player_number = $_POST['new_game_player_number'];
$new_game_publication_date = $_POST['new_game_publication_date'];

//query to create a new user in the database
$query = "INSERT INTO `game`(`name`, `price`, `game_picture`, `category_id`, `editor_id`, `description`, `age_range_id`, `publication_date`, `game_duration`,`player_number_id`,`sold`) VALUES (?,?,'../Picture/Avatar/default_avatar.jpg',?,?,?,?,?,?,?,0)";
$stmt = $dbh_readwrite->prepare($query);
$stmt->execute([$new_game_name, $new_game_price, $new_game_categorie, $new_game_editor, $new_game_description, $new_game_age_range, $new_game_publication_date, $new_game_duration, $new_game_player_number]);

// Change default avatar if file send by user is correct
//    if(isset($_FILES['new_user_profil_picture']) && $_FILES['new_user_profil_picture']["error"] == UPLOAD_ERR_OK){
if(isset($_FILES['new_game_picture']) && $_FILES['new_game_picture']["error"] == UPLOAD_ERR_OK){

    // query to get ID from new user to 
    $query = "SELECT id FROM game WHERE name = ?";
    $stmt = $dbh_readonly->prepare($query);
    $stmt->execute([$new_game_name]);
    $game_id = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "game ID" . $game_id['id'];
    // set in a variable extension file
    switch ($_FILES['new_game_picture']['type']){ 
        case 'image/png' :
            $picture_type = '.png';
            break;
        case 'image/jpg' :
            $picture_type = '.jpg';
            break;
        case 'image/jpeg' : 
            $picture_type = '.jpeg';
            break;
    }
    $new_game_picture_new_location = "../Picture/Game/game_id_" . $game_id['id'] . $picture_type;

    // Move file send to a new location
    move_uploaded_file($_FILES['new_game_picture']['tmp_name'],$new_game_picture_new_location);

    // Update database with the new picture profil
    $query = "UPDATE game SET game_picture = ? WHERE id = ?";
    $stmt = $dbh_readwrite->prepare($query);
    $stmt->execute([$new_game_picture_new_location,$game_id['id']]);
}

header("Location: ../View/profil.php");
exit();