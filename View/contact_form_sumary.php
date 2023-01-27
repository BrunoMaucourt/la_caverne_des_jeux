<?php
    session_start();
    $title = "récapitulatif de votre message";
    // Redirect to contact form if no data
    if(empty($_POST['contact_last_name'])){
        header("Location: ./contact_form.php");
    }
    require_once "../Element/header.php";
?>
<h1>Merci pour votre message</h1>
<div class="col-lg-8 col-xl-10 p-3 m-auto">
    <div class="border bg-secondary">
        <h2>Votre message a bien été envoyé</h2>
        <?php
            echo "Votre nom : " . $_POST['contact_last_name'] . "<br>"; 
            echo "Votre prénom : " . $_POST['contact_first_name'] . "<br>"; 
            echo "Votre email : " . $_POST['contact_email'] . "<br>"; 
            echo "Le motif de votre message : " . $_POST['contact_motif'] . "<br>"; 
            echo "Votre message : " . $_POST['contact_message'] . "<br>"; 
            if(isset($_POST['contact_type_email'])){
                echo "Nous vous contacterons par : " . $_POST['contact_type_email'] . "<br>";  
            }
            if(isset($_POST['contact_type_téléphone'])){
                echo "Nous vous contacterons par : " . $_POST['contact_type_téléphone'] . "<br>";  
            }
            if(isset($_POST['contact_type_fumées'])){
                echo "Nous vous contacterons par : " . $_POST['contact_type_fumées'] . "<br>";  
            }
            if(isset($_POST['contact_type_piegons'])){
                echo "Nous vous contacterons par : " . $_POST['contact_type_piegons'] . "<br>";  
            }
        ?>
    </div>
</div>
<?php
    require_once "../Element/footer.php";
?>