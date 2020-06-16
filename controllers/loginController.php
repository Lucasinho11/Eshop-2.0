<?php 
require_once 'models/Login.php';
require_once 'models/Category.php';


$parentsCategories = getParentsCategories();

if (isset($_GET['action']) && $_GET['action'] == 'disconnect'){
    
    unset($_SESSION['user']);
    session_destroy();
    header('Location:index.php');
}

if(!empty($_POST)){
    if(empty($_POST['email']) || empty($_POST['password'])){
        echo'ERREUR';
    }
    else{
        $user = login($_POST['email'],$_POST['password']);
        if($user != false){
            $_SESSION['user'] = $user['first_name'];
            if($user['is_admin'] == true){
                header('Location:admin/index.php?action=connected');
                echo'salut'. $_SESSION['user'];
                echo '<a href="?action=disconnect">Déconnexion !</a>';
            }
            else{
                header('Location:index.php?action=connected');
                echo'salut'. $_SESSION['user'];
                echo '<a href="?action=disconnect">Déconnexion !</a>';
            }
        }
        else{
            echo'Non valide';
        }
    }

}?>

<?php if(isset($_SESSION['user'])):?>
    salut <?= $_SESSION['user']?>
   
<?php endif; ?>
<?php include 'views/login.php';?>
    
