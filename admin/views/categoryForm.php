<?php if(isset($_SESSION['messages'])): ?>
	<div>
		<?php foreach($_SESSION['messages'] as $message): ?>
			<?= $message ?><br>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

ici formulaire de catégories<br><br>

<form action="index.php?controller=categories&action=<?= isset($category) ||  (isset($_SESSION['old_inputs']) && $_GET['action'] == 'edit') ? 'edit&id='. $_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

	<label for="name">Nom :</label>
	<input  type="text" name="name" id="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($category) ? $category['name'] : '' ?>" /><br>

	
	<input type="submit" value="Enregistrer" />

</form>