<?php require_once 'models/Category.php';


$parentsCategories = getParentsCategories();
?>
<?php require('partials/menu.php');?>

<h1 class="title-question">Questions les plus posées:</h1>
<?php for ($i=1; $i <= 10; $i++):?>
    <h2 class="question-title">Comment on reçoit le compte ?</h2>
    <p class="question">Vous recevez les identifiants du compte par mail directement après l’achat.<br>Si vous achetez le jeu avec vous recevrez le code du jeu également sur le mail.</p>
<?php endfor;?>

<?php require('partials/footer.php');?>