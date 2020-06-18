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

		<h2>ici la liste complète des catégories : </h2>
		<div class="new">
			<a href="index.php?p=categories&action=new">Ajouter une catégorie <i class="fas fa-plus"></i></a>
		</div>
	<?php foreach($categories as $category): ?>
		<div class="product">
			<p><?=  htmlspecialchars($category['name']) ?>  
			<a href="index.php?p=categories&action=edit&id=<?= $category['id'] ?>"><i class="fas fa-pen"></i></a> 
			<a href="index.php?p=categories&action=delete&id=<?= $category['id'] ?>"><i class="fas fa-trash-alt"></i></a></p>
		</div>	
	<?php endforeach; ?>
	</div>
</div>