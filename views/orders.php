<?php require('partials/menu.php');?>
<div class="order-page">   
<?php foreach($orders as $order):?>
    <div class="orders-user">
        Commande du <?= $order['date']?><br>
        Nom: <?= $order['name']?><br>
        Email: <?= $order['email']?><br>
        <a href="index.php?p=user&action=details&order_id=<?= $order['id']?>">Détails</a>
    </div>
    <?php endforeach;?>
    <div class="retour">
        <a href="index.php?p=user">retour</a>
    </div>

</div>

<?php require('partials/footer.php');?>
