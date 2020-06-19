<?php require('partials/header.php')?>
<body>
		<?php if(isset($_SESSION['messages'])): ?>
		<div>
			<?php foreach($_SESSION['messages'] as $message): ?>
				<?= $message ?><br>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<form action="index.php?p=products&action=<?= isset($product) ||  (isset($_SESSION['old_inputs']) && $_GET['action'] == 'edit') ? 'edit&id='. $_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

		<label for="name">Nom :</label>
		<input  type="text" name="name" id="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($product) ? $product['name'] : '' ?>" /><br>
		
		
		<label for="short_description">short description :</label>
		<textarea type="textarea" name="short_description" id="short_description"><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['short_description'] : '' ?><?= isset($product) ? $product['short_description'] : '' ?></textarea><br>
		
		<label for="description">Description :</label>
		<textarea  type="textarea" name="description" id="description"><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['description'] : '' ?><?= isset($product) ? $product['description'] : '' ?></textarea><br>

		<label for="price">Prix :</label>
		<input  type="number" name="price" id="price" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['price'] : '' ?><?= isset($product) ? $product['price'] : '' ?>" /><br>
		
		<label for="game_id">Jeu :</label>
		<select name="game_id" id="game_id">
			
			<?php foreach($games as $game): ?>
				<?php foreach($productCategories as $productCategory): ?>
				<option value="<?= $game['id'] ?>" <?php if(isset($game) && $game['id'] == $productCategory['category_id']): ?>selected="selected"<?php endif; ?>><?= $game['name']; ?></option>
				<?php endforeach; ?>
			<?php endforeach; ?>
		
		</select><br>
		
		<input type="submit" value="Enregistrer" />

	</form>
</body>