ici formulaire de jeux<br><br>

<form action="index.php?p=images&action=addImage&id=<?= $productId?>" method="post" enctype="multipart/form-data">

    <label for="image">Image :</label>
	<input type="file" name="image" id="image" /><br>

    <label for="is_main">Image principale ?</label>
	<input type ="checkbox" name="is_main" id="is_main"/>
		
	<input type="submit" value="Enregistrer" />

</form>