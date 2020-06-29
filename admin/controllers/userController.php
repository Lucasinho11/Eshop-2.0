<?php
require('models/User.php');

switch($_GET['action']){
    case 'newUser':
        require('views/userForm.php');
    break;
    case 'addUser':
        if(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['address']) ) {
		
            if(empty($_POST['email'])){
                $_SESSION['messages'][] = 'Le champ email est obligatoire !';
            }
            if(empty($_POST['first_name'])){
                $_SESSION['messages'][] = 'Le champ prenom est obligatoire !';
            }
            if(empty($_POST['last_name'])){
                $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
            }
            if(empty($_POST['address'])){
                $_SESSION['messages'][] = 'Le champ adresse est obligatoire !';
            }
            if(empty($_POST['password'])){
                $_SESSION['messages'][] = 'Le champ mdp est obligatoire !';
            }
            
            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?p=users&action=newUser');
            exit;
        }
        else{
            $result = addUser($_POST);
            
            $_SESSION['messages'][] = $result ? 'user enregistrée !' : "Erreur lors de l'enregistrement... :(";
            
            header('Location:index.php?p=users&action=list');
            exit;
        }
    break;
    case 'deleteUser':
        if(isset($_GET['id'])){
            $result = deleteUser($_GET['id']);
        }
        else{
            header('Location:index.php?p=users&action=list');
            exit;
        }
    
        $_SESSION['messages'][] = $result ? 'user supprimé !' : 'Erreur lors de la suppression... :(';
        
        header('Location:index.php?p=users&action=list');
        exit;
    break;
    case 'editUser':
        $user = getUser($_GET['id']);
        if(!empty($_POST)){
            if(empty($_POST['email']) || empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['address']) ) {
		
            
                if(empty($_POST['email'])){
                    $_SESSION['messages'][] = 'Le champ email est obligatoire !';
                }
                if(empty($_POST['first_name'])){
                    $_SESSION['messages'][] = 'Le champ prenom est obligatoire !';
                }
                if(empty($_POST['last_name'])){
                    $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
                }
                if(empty($_POST['address'])){
                    $_SESSION['messages'][] = 'Le champ adresse est obligatoire !';
                }
            
                $_SESSION['old_inputs'] = $_POST;
                header('Location:index.php?p=users&action=editUser&id=' . $_GET['id']);
                exit;
            }
            else{
                $result = updateUser($_GET['id'], $_POST);
                $_SESSION['messages'][] = $result ? 'user mis à jour !' : 'Erreur lors de la mise à jour... :(';
                header('Location:index.php?p=users&action=list');
                exit;
            }
        }
        else{
            if(!isset($_SESSION['old_inputs'])){
                if(isset($_GET['id'])){
                    $user = getUser($_GET['id']);
                    if($user == false){
                        header('Location:index.php?p=users&action=list');
                        exit;
                    }
                }
                else{
                    header('Location:index.php?p=users&action=list');
                    exit;
                }
            }
            require('views/userForm.php');
        }
    break;
    case'list':
        $users = getAllUsers();
	    require('views/userList.php');
    break;
    default :
    require 'controllers/indexController.php';
}
