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
        
		<h2>Ici la liste détaillée de la commande : </h2>
		<?php foreach($orderDetails as $order):?>
        <div class="orders-user">
            <?= $order['name']?><br>
            Quantité: <?= $order['quantity']?><br>
            Prix: <?= $order['price']?><br>
        </div>
    <?php endforeach;?>
	</div>
</div>