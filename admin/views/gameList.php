
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

		<h2>ici la liste complète des jeux : </h2>
		<div class="new">
			<a href="index.php?p=games&action=new">Ajouter un jeu <i class="fas fa-plus"></i></a>
		</div>
		<?php foreach($games as $game): ?>
			<div class="product">
				<p><?=  htmlspecialchars($game['name']) ?>  
				<a href="index.php?p=games&action=edit&id=<?= $game['id'] ?>"><i class="fas fa-pen"></i></a> 
				<a href="index.php?p=games&action=delete&id=<?= $game['id'] ?>"><i class="fas fa-trash-alt"></i></a></p>
			</div>	
		<?php endforeach; ?>
	</div>
</div>
