
<div class="container">
		<div class="header">
				<?php require('partials/header.php')?>
		</div>
	<div class="products">
		<form action="index.php?p=images&action=addImage&id=<?= $productId?>" method="post" enctype="multipart/form-data">

			<label for="image">Image :</label>
			<input type="file" name="image" id="image" /><br>

			<label for="is_main">Image principale ?</label>
			<input type ="checkbox" name="is_main" id="is_main"/><br><br>
				
			<input type="submit" value="Enregistrer" />

		</form>
		</div>
</div>