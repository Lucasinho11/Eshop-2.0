<div class="container">
	<div class="header">
		<?php require 'partials/header.php';?>
		<?php if(isset($_SESSION['messages'])): ?>
			<div>
				<?php foreach($_SESSION['messages'] as $message): ?>
					<?= $message ?><br>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="users">
    <a href="index.php?p=users&action=newUser">Ajouter un nouveau user <i class="fas fa-plus"></i></a><br><br>
            <?php foreach($users as $user):?>
                <div class="user">
                    <?= $user['first_name']?>
                    <?= $user['last_name']?><br>
                    <a href="index.php?p=users&action=list&id=<?= $user['id'] ?>"></a>
                        <a href="index.php?p=users&action=editUser&id=<?= $user['id'] ?>"><i class="fas fa-pen"></i></a> 
                        <a href="index.php?p=users&action=deleteUser&id=<?= $user['id'] ?>"><i class="fas fa-trash-alt"></i></a></p><br>
                    
                    </a>
                </div>
            <?php endforeach;?>
	</div>
</div>