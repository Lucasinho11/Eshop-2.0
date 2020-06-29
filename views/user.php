
<?php require('partials/menu.php');?>
<div class="user-page">
    <?php if(!isset($_SESSION['user'])):?>
        <div class="register">
            <a href="index.php?p=register" class="">register </a><br>
        </div>
        <div class="login">
            <a href="index.php?p=login" class="">connect </a><br></i></a>
        </div>
    <?php else:?>
        <h1 class="user-title">Bonjour <?= $_SESSION['user']['first_name']?> <?= $_SESSION['user']['last_name']?></h1><br>
        <?php if(isset($_SESSION['user']) && $_SESSION['user']['is_admin'] == 1):?>
            <div class="admin">
                <a href="admin/index.php" class="">page admin</a><br>
            </div>
        <?php endif;?>
        <div class="edit-profile">
            <a href="index.php?p=user&action=editProfile">modifier profil</a><br>
        </div>
        <div class="my-commands">
            <a href="index.php?p=user&action=listOrder">commandes</a><br>
        </div>
        <div class="disconnect">
            <a href="index.php?p=login&action=disconnect">Déconnexion !</a><br>
        </div>
    <?php endif;?>
</div>

<?php require('partials/footer.php');?>
