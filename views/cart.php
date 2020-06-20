<?php require('partials/menu.php');?>
<div class="contain-cart">
  <?php if(!empty($_SESSION['cart'])):?>
  <?php $totalPriceCart = 0;?>
      <?php foreach($productsCart as $product): ?>
      <div class="product-cart">
        <?= $product['name']?><br>
        Quantité: <?= $cartProducts['qty']?><br>
        <?php $totalPrice = $product['price'] * $cartProducts['qty']?>
        Total :<?= $totalPrice?>€
        <?php $totalPriceCart += $totalPrice?>
      </div>
      <?php endforeach; ?>
      Prix Total du panier : <?= $totalPriceCart?> €<br>
      <div class="button-order">
        <a href="index.php?p=cart&action=insertorder&price=<?= $totalPriceCart?>">Validation du panier</a>
      </div>
      <?php endif;?>
  </div>
