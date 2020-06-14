<?php require('partials/menu.php');?>
<link href="./assets/css/game.css" rel="stylesheet">
<?php foreach($products as $product): ?>
  <div class="product" onmouseover="document.getElementsByClassName('game_desc')[4].style.display='flex'" onmouseout="document.getElementsByClassName('game_desc')[4].style.display='none'">
      <a href="index.php?p=product&product_id=<?= $product['id'] ?>">
      <?= $product['name'] ?><br>
        <?php foreach($imagesGame as $ig):?>
          <img src="./assets/images/<?= $ig['name']?>"><br>
          <div class="game_desc">
            <h1><?=$product['short_description']?></h1>
          </div>
        <?php endforeach;?>
      <?= $product['price'] ?> euros<br>
      </a>
  </div>
<?php endforeach; ?>
<?php require('partials/footer.php');?>