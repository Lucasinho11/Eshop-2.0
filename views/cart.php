<?php require('partials/menu.php');?>
<div class="contain-cart">
      <?php foreach($productsCart as $product): ?>
        <?= $product['name']?>
      <?php endforeach; ?>
  </div>
  <?= $cartProducts['qty']?>