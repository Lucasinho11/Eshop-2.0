<?php 
require_once 'models/Login.php';
require_once 'models/Category.php';
session_start();
session_destroy();

$parentsCategories = getParentsCategories();

if (isset($_GET['action']) && $_GET['action'] == 'disconnect'){
    unset($_SESSION['user']);
}

if(!empty($_POST)){
    if(empty($_POST['email']) || empty($_POST['password'])){
        echo'ERREUR';
    }
    else{
        $user = login($_POST['email'],$_POST['password']);
        if($user != false){
            $_SESSION['user'] = $user['first_name'];
            session_start();
            
        }
        else{
            echo'Non valide';
        }
    }

}?>

<?php if(isset($_SESSION['user'])):?>
    <?php header('Location:?action=connected');?>
    salut <?= $_SESSION['user']?>
    <a href="?action=disconnect">Déconnexion !</a>
    <?php endif; ?>
<?php include 'views/login.php';?>
    
