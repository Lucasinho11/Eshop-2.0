index admin
<?php
session_start();

echo'<a href="?action=disconnect">Déconnexion !</a>';
if($_GET['action'] == 'disconnect'){
    session_destroy();
    header('Location:../index.php?action=disconnected');
}
?>
<?php if(isset($_SESSION['user'])):?>
    salut <?= $_SESSION['user']?>
   
<?php endif; ?>