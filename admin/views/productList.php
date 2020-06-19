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
	<div class="products">
		<h2>Ici la liste complète des produits : </h2>
		<div class="new">
			<a href="index.php?p=products&action=new">Ajouter un nouveau produit <i class="fas fa-plus"></i></a>

		</div>
		<?php foreach($products as $product): ?>
			<div class="product">
				<p><?=  htmlspecialchars($product['name']) ?>  
				<a href="index.php?p=images&action=list&id=<?= $product['id'] ?>">test</a>
					<a href="index.php?p=products&action=edit&id=<?= $product['id'] ?>"><i class="fas fa-pen"></i></a> 
					<a href="index.php?p=products&action=delete&id=<?= $product['id'] ?>"><i class="fas fa-trash-alt"></i></a></p><br>
			</div>
		<?php endforeach; ?>
	</div>
</div>