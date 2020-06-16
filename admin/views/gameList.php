<?php if(isset($_SESSION['messages'])): ?>
	<div>
		<?php foreach($_SESSION['messages'] as $message): ?>
			<?= $message ?><br>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

<h2>ici la liste complète des jeux : </h2>

<a href="index.php?controller=games&action=new">Ajouter un jeu</a>

<?php foreach($games as $game): ?>
	<p><?=  htmlspecialchars($game['name']) ?>  
	<a href="index.php?controller=games&action=edit&id=<?= $game['id'] ?>">modifier</a> 
	<a href="index.php?controller=games&action=delete&id=<?= $game['id'] ?>">supprimer</a></p>
<?php endforeach; ?>
