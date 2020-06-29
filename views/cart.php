<?php require('partials/menu.php');?>
<h1 class="title-cart">Panier:</h1><br>
<div class="contain-page-cart">
    <div class="contain-cart">
    <?php if(!empty($_SESSION['cart'])):?>
      <?php $totalPriceCart = 0;?>
        <?php foreach($cartProducts as $product): ?>
        <?php $mainImage = getMainImage($product['id'])?>
        <div class="product-cart">
          <?= $product['name']?><br>
          <img src="assets/images/<?= $mainImage['name']?>"><br>
          <form action="index.php?p=cart&action=upadateProductQty&product_id=<?= $product['id']?>">
            Quantité:
            <input type="number" id="quantity" name="quantity" min="1" max="<?= $product['quantity']?>" class="quantity" required value="<?= $_SESSION['cart'][$product['id']]['quantity']?>">
            <input type="submit">
          </form>
          <?php $totalPrice = $product['price'] * $_SESSION['cart'][$product['id']]['quantity']?>
          Total :<?= $totalPrice?>€
          <?php $totalPriceCart += $totalPrice?><br>
          <a href="index.php?p=cart&action=deleteProduct&product_id=<?= $product['id'] ?>"><i class="fas fa-trash-alt"></i></a></p>
        </div><br>
        <?php endforeach; ?><br>
        
        <?php endif;?><br>

    </div>
    <div class="summary-cart">
    <?php if(!empty($_SESSION['cart'])):?>
      <h2>Récapitulatif:</h2>
      
      <?php foreach($cartProducts as $product):?>
        <div class="product-summary">
        <?= $product['name']?><br>
        <?php $totalPrice2 = $product['price'] * $_SESSION['cart'][$product['id']]['quantity']?><br>
        Total :<?= $totalPrice2?>€
        </div>
      <?php endforeach;?>
      
      <h2>Prix Total du panier : <?= $totalPriceCart?> €</h2><br>
      <div class="button-order">
          <a href="index.php?p=cart&action=insertorder&price=<?= $totalPriceCart?>">Validation du panier</a>
      </div>
    </div>  
      <?php endif;?>
    
  
</div>
  
<?php require('partials/footer.php')?>