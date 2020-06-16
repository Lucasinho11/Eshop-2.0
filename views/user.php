
<?php require('partials/menu.php');?>
<?php if(!isset($_SESSION['user'])):?>
                    <a href="index.php?p=register" class="">register </a><br>
                    <a href="index.php?p=login" class="">connect </a><br></i></a>
                <?php else:?>
                    <a href="index.php?p=login&action=disconnect" class="">Déconnexion !</a><br>
                 <?php endif;?>
<?php require('partials/footer.php');?>
