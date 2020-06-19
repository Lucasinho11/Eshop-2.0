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
		<h2>Ici la liste complète des images du produit: </h2>
		<div class="new">
			<a href="index.php?p=images&action=newImage&id=<?= $_GET['id']?>">Ajouter une nouvelle image <i class="fas fa-plus"></i></a>

		</div>
		            <?php foreach($imagesProduct as $image):?>
						<img src="../assets/images/<?= $image['name'] ?>" style="max-width: 100px;"><br>
						<a href="index.php?p=images&action=deleteImage&id=<?= $image['id'] ?>"><i class="fas fa-trash-alt"></i></a>
					<?php endforeach;?>
	</div>
</div>


