<div class="container">
	<div class="header">
		<?php require 'partials/header.php';?>
		<?php if(isset($_SESSION['messages'])): ?>
			<div>
				<?php foreach($_SESSION['messages'] as $message): ?>
					<?= $message ?><br>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="order-page">
		<h2>Ici la liste complète des commandes : </h2>
		<?php foreach($orders as $order):?>
        <div class="orders-user">
            Commande du <?= $order['date']?><br>
            Nom: <?= $order['name']?><br>
            Email: <?= $order['email']?><br>
            <a href="index.php?p=orders&action=details&order_id=<?= $order['id']?>">Détails</a>
        </div>
    <?php endforeach;?>
	</div>
</div>