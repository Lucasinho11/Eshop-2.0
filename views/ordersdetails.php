<?php require('partials/menu.php');?>
<div class="order-page">  
<h1>Produits:</h1><br>
<?php foreach($orderDetails as $orderDetail):?>
    <div class="orders-user">
        <?= $orderDetail['name']?><br>
        Quantité: <?= $orderDetail['quantity']?><br>
        Prix: <?= $orderDetail['price']?><br>
    </div>
    <?php endforeach;?>
    <div class="retour">
        <a href="index.php?p=user&action=listOrder">retour</a>
    </div>

</div>

<?php require('partials/footer.php');?>
