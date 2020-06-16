<?php if(isset($_SESSION['messages'])): ?>
	<div>
		<?php foreach($_SESSION['messages'] as $message): ?>
			<?= $message ?><br>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

<form action="index.php?controller=products&action=<?= isset($product) ||  (isset($_SESSION['old_inputs']) && $_GET['action'] == 'edit') ? 'edit&id='. $_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

	<label for="name">Nom :</label>
	<input  type="text" name="name" id="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($product) ? $product['name'] : '' ?>" /><br>
	
	
	<label for="short_description">short description :</label>
	<input  type="text" name="short_description" id="short_description" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['short_description'] : '' ?><?= isset($product) ? $product['short_description'] : '' ?>" /><br>
	
	<label for="description">Description :</label>
	<input  type="text" name="description" id="description" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['description'] : '' ?><?= isset($product) ? $product['description'] : '' ?>" /><br>

    <label for="price">Prix :</label>
	<input  type="number" name="price" id="price" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['price'] : '' ?><?= isset($product) ? $product['price'] : '' ?>" /><br>
	
    <input type="submit" value="Enregistrer" />

</form>