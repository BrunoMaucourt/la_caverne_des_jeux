<?php
    $title = "Caverne des jeux";
    include "header.php";
?>

<div class="row g-6">
    <div id="carouselExampleCaptions" class="carousel slide col">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="../Picture/Website/carrousel1.avif" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="../Picture/Website/carrousel2.avif" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="../Picture/Website/carrousel3.avif" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
    
    <div class="row text-center">
        <div class="col-6">
            <h2>Meilleurs ventes</h2>
            <div class="row text-center">
                <div class="col-4">
                    <p>Jeu1</p>
                </div>
                <div class="col-4">
                    <p>Jeu2</p>
                </div>
                <div class="col-4">
                    <p>Jeu3</p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <h2>Nouvautés</h2>
            <div class="row text-center">
                <div class="col-4">
                    <p>Jeu1</p>
                </div>
                <div class="col-4">
                    <p>Jeu2</p>
                </div>
                <div class="col-4">
                    <p>Jeu3</p>
                </div>
            </div>
        </div>
    </div>  


<?php
    include "footer.php";
?>