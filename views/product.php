<?php require('partials/menu.php');?>
<div class="contain-product">
    <div class="product">
        <img src="./assets/images/<?=$images['0']['name']?>" style="width: 400px;">
    </div>
    <div class="description-product">
        <h1 class="product-name"><?= $product['name'] ?></h1>
        <pre class="description"><?= $product['description'] ?></pre>
        <h2><?= $product['price'] ?>€</h2><br>
        <div class="add-cart">
            <a href="index.php?p=cart&action=addProduct&product_id=<?= $product['id'] ?>">Ajouter au panier</a>
        </div>
    </div>
    
</div>
<?php unset($images['0'])?><br>
<div class="images-product">
    <?php foreach($images as $image):?>
        <img src="./assets/images/<?= $image["name"]?>" style="width: 700px; height: 437.5px; margin-bottom:5%;">
    <?php endforeach;?>
</div>
<?php require('partials/footer.php');?>