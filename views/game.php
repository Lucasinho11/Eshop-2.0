<?php require('partials/menu.php');?>
<div class="products">
  <?php foreach($products as $product): ?>
      <div class="product">
          <a href="index.php?p=product&product_id=<?= $product['id'] ?>">
          <br>
            <?php foreach($imagesGame as $ig):?>
              <div class="image-product">
                <img src="./assets/images/<?= $ig['name']?>"><br>
              
              <div class="game_desc">
                <pre><?=$product['short_description']?></pre>
              </div>
            </div>
            <?php endforeach;?>
            <h1><?= $product['name'] ?></h1>
          <?= $product['price'] ?> euros<br>
          </a>
      </div>
  <?php endforeach; ?>
</div>
<?php require('partials/footer.php');?>