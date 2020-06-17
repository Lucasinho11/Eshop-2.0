<?php if(isset($_SESSION['messages'])): ?>
	<div>
		<?php foreach($_SESSION['messages'] as $message): ?>
			<?= $message ?><br>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

<h2>ici la liste complète des catégories : </h2>

<a href="index.php?p=categories&action=new">Ajouter une catégorie</a>

<?php foreach($categories as $category): ?>
	<p><?=  htmlspecialchars($category['name']) ?>  
	<a href="index.php?p=categories&action=edit&id=<?= $category['id'] ?>">modifier</a> 
	<a href="index.php?p=categories&action=delete&id=<?= $category['id'] ?>">supprimer</a></p>
<?php endforeach; ?>
