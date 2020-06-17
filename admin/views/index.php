

<a href="../index.php">index principal</a><br>
<a href="../index.php?p=login&action=disconnect">Déconnexion</a>

<?php if(isset($_SESSION['user'])):?>
    salut <?= $_SESSION['user']['first_name']?>
   
<?php endif; ?>
<br>
<a href="index.php?p=categories&action=list">Gestion des categories</a><br>
<a href="index.php?p=products&action=list">Gestion des products</a><br>
<a href="index.php?p=games&action=list">Gestion des jeux</a>