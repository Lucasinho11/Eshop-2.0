<link href="./assets/css/slider.css" rel="stylesheet">
<?php require('partials/menu.php');?>
<h1 class="news">Nos nouveautés!!!</h1>


<div class="slideshow-container">

<!-- Full-width images with number and caption text -->
<?php foreach($imagesSlide as $image):?>
    <div class="mySlides fade">
        <div class="numbertext"></div>
        <img src="./assets/images/<?= $image['image']?>" style="width:100%">
        <div class="text"><h1><?= $image['name']?></h1></div>
    </div>
  <?php endforeach;?>


<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
<span class="dot" onclick="currentSlide(1)"></span>
<span class="dot" onclick="currentSlide(2)"></span>
<span class="dot" onclick="currentSlide(3)"></span>
</div>

</div>

<section class="index-container">
  <div class="truck">
    <i class="fas fa-truck"></i>
    <h1 class="truck-title">Livraison instantanée</h1>
  </div>
  <div class="shield">
    <i class="fas fa-shield-alt"></i>
    <h1 class="shield-title">Paiements sécurisés</h1>
  </div>
  <div class="card-index">
    <i class="fas fa-credit-card"></i>
    <h1 class="card-title">Satisfait ou  remboursé</h1>
  </div>
</section>

<script type="text/javascript" src="./assets/js/slider.js"></script>

<?php require('partials/footer.php');?>
