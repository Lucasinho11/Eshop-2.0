<?php require 'partials/header.php';?>
<?php if(isset($_SESSION['messages'])): ?>
	<div>
		<?php foreach($_SESSION['messages'] as $message): ?>
			<?= $message ?><br>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

<h2>ici la liste complète des produits : </h2>

<a href="index.php?p=products&action=new">Ajouter un nouveau produit</a>

<?php foreach($products as $product): ?>
	<p><?=  htmlspecialchars($product['name']) ?>  
	<a href="index.php?p=products&action=edit&id=<?= $product['id'] ?>">modifier</a> 
	<a href="index.php?p=products&action=delete&id=<?= $product['id'] ?>">supprimer</a></p>
<?php endforeach; ?>
