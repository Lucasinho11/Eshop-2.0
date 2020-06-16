index admin
<?php


echo'<a href="?action=disconnect">Déconnexion !</a>';
// if($_GET['action'] == 'disconnect'){
//     session_destroy();
//     header('Location:../index.php?action=disconnected');
// }
// ?>
<?php if(isset($_SESSION['user'])):?>
    salut <?= $_SESSION['user']?>
   
<?php endif; ?>
<br>
<a href="index.php?controller=categories&action=list">Gestion des categories</a><br>
<a href="index.php?controller=products&action=list">Gestion des products</a>