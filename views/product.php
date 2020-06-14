<?php require('partials/menu.php');?>

<p><?= $product['name'] ?></p>
<img src="./assets/images/<?=$images['0']['name']?>" style="width: 1000px;">
<p><?= $product['description'] ?></p>
<p><?= $product['price'] ?>€</p>
<?php unset($images['0'])?><br>
<?php foreach($images as $image):?>
    <img src="./assets/images/<?= $image["name"]?>" style="width: 500px;">
<?php endforeach;?>
<?php require('partials/footer.php');?>