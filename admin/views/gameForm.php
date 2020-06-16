<?php if(isset($_SESSION['messages'])): ?>
	<div>
		<?php foreach($_SESSION['messages'] as $message): ?>
			<?= $message ?><br>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

ici formulaire de jeux<br><br>

<form action="index.php?controller=games&action=<?= isset($game) || isset($_SESSION['old_inputs']) && $_GET['action'] != 'new' ? 'edit&id='. $_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

	<label for="name">Nom :</label>
	<input  type="text" name="name" id="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($game) ? $game['name'] : '' ?>" /><br>

    <label for="parent_id">Catégorie :</label>
	<select name="parent_id" id="parent_id">
		
		<?php foreach($categories as $category): ?>
			<option value="<?= $category['id']; ?>" <?php if(isset($game) && $game['parent_id'] == $category['id']): ?>selected="selected"<?php endif; ?>><?= $category['name']; ?></option>
		<?php endforeach; ?>
	
	</select><br>
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <label for="image">image :</label>
	<input type="file" name="image" id="image" /><br>
	
	<input type="submit" value="Enregistrer" />

</form>