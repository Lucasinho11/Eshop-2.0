<?php require_once 'models/Category.php';


$parentsCategories = getParentsCategories();
?>
<?php require('partials/menu.php');?>

<h1 class="title-question">Questions les plus posées:</h1>
    <h2 class="question-title">Comment on reçoit le compte ?</h2>
    <p class="question">Vous recevez les identifiants du compte par mail directement après l’achat.<br>Si vous achetez le jeu avec vous recevrez le code du jeu également sur le mail.</p>

    <h2 class="question-title">Les paiements sont-ils sécurisés ?</h2>
    <p class="question">Les paiements sont en efffet 100% sécurisés (carte bleu, visa, paypal, paysafecard).</p>

    <h2 class="question-title">D'où proviennent les comptes?</h2>
    <p class="question">Nos comptes de jeux proviennent de vendeurs certifiés et vérifiés par nos soins.</p>

    <h2 class="question-title">Pouvons-nous nous rétracter ?</h2>
    <p class="question question-last">Si vous n'ètes pas satisfait de votre achat ou ne correspond pas à votre attente,<br>vous avez un délai d'une semaine à partir de la réception du mail pour vous faire rembourser.</p>

<?php require('partials/footer.php');?>