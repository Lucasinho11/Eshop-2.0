<div class="container">
		<div class="header">
				<?php require('partials/header.php')?>
			<?php if(isset($_SESSION['messages'])): ?>
				<div>
					<?php foreach($_SESSION['messages'] as $message): ?>
						<?= $message ?><br>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="products">
			<form action="index.php?p=categories&action=<?= isset($category) ||  (isset($_SESSION['old_inputs']) && $_GET['action'] == 'edit') ? 'edit&id='. $_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

				<label for="name">Nom :</label>
				<input  type="text" name="name" id="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($category) ? $category['name'] : '' ?>" /><br>

				
				<input type="submit" value="Enregistrer" />

			</form>
		</div>
</div>