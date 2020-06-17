
<?php require('partials/menu.php');?>

<?php if(!isset($_SESSION['user'])):?>
    
                    <a href="index.php?p=register" class="">register </a><br>
                    <a href="index.php?p=login" class="">connect </a><br></i></a>
                <?php else:?>
                    <h1 class="user-title">Bonjour <?= $_SESSION['user']['first_name']?> <?= $_SESSION['user']['last_name']?></h1><br>
                    <?php if(isset($_SESSION['user']) && $_SESSION['user']['is_admin'] == 1):?>
                        <a href="admin/index.php" class="">page admin</a><br>
                     <?php endif;?>
                    <a href="index.php?p=user&action=editProfile">modifier profil</a>
                    <a href="index.php?p=login&action=disconnect" class="">Déconnexion !</a><br>
                 <?php endif;?>

<?php require('partials/footer.php');?>
