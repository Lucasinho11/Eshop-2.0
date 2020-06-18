<?php require('partials/menu.php');?>

<?php foreach($cartProducts as $product): ?>
        <?= $product['name']?>
  <?php endforeach; ?>