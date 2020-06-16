
<?php require('partials/menu.php');?>
<?php session_start();?>
body
<?php if(isset($_SESSION['user'])):?>
    salut <?= $_SESSION['user']?>
    <a href="?action=disconnect">Déconnexion !</a>
<?php endif; ?>
<?php require('partials/footer.php');?>
