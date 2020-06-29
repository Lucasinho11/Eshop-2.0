
	<body>
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
		<div class="users">
			<form action="index.php?p=users&action=<?= isset($user) ||  (isset($_SESSION['old_inputs']) && $_GET['action'] == 'editUser') ? 'editUser&id='. $_GET['id'] : 'addUser' ?>" method="post" enctype="multipart/form-data">

				<label for="email">email *:</label>
				<input  type="email" name="email" id="email" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['email'] : '' ?><?= isset($user) ? $user['email'] : '' ?>" /><br>
				
				<label for="password">mot de passe *:</label>
				<input  type="password" name="password" id="password" /><br>

				
				<label for="first_name">first name *:</label>
				<input  type="text" name="first_name" id="first_name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['first_name'] : '' ?><?= isset($user) ? $user['first_name'] : '' ?>" /><br>

				<label for="last_name">last name *:</label>
				<input  type="text" name="last_name" id="last_name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['last_name'] : '' ?><?= isset($user) ? $user['last_name'] : '' ?>" /><br>
				
				<label for="address">adresse *:</label>
				<input  type="text" name="address" id="address" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['address'] : '' ?><?= isset($user) ? $user['address'] : '' ?>" /><br>
				<br>

				<label for="is_admin">admin ? </label>
				<input  type="checkbox" name="is_admin" id="is_admin"/><br>

				<input type="submit" value="Enregistrer"/>

			</form>
		</div>
	</div>
</body>