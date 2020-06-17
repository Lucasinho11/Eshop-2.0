<?php


require_once 'models/Login.php';
require_once 'models/Register.php';
require_once 'models/Category.php';
require_once 'models/User.php';

$parentsCategories = getParentsCategories();
if(isset($_GET['action']) && $_GET['action'] == 'editProfile'){
	
	if(!empty($_POST)){
		if(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['address']) ) {
		
			if(empty($_POST['email'])){
				$_SESSION['messages'][] = 'Le champ email est obligatoire !';
            }
            if(empty($_POST['password'])){
				$_SESSION['messages'][] = 'Le champ email est obligatoire !';
            }
            if(empty($_POST['first_name'])){
				$_SESSION['messages'][] = 'Le champ prénom est obligatoire !';
            }
            if(empty($_POST['last_name'])){
				$_SESSION['messages'][] = 'Le champ nom est obligatoire !';
            }
            if(empty($_POST['address'])){
				$_SESSION['messages'][] = 'Le champ adresse est obligatoire !';
            }
        
			$_SESSION['old_inputs'] = $_SESSION['user'];
			header('Location:index.php?p=user&action=editProfile');
			exit;
		}
		else{
            if($_POST['email'] != $_SESSION['user']['email']){
                $emailExist = emailExist($_POST['email']);
            }
            else{
                $emailExist = false;
            }
        if(!$emailExist){
            $result = updateUser($_POST);
            $_SESSION['messages'][] = $result ? 'profil mis à jour !' : 'Erreur lors de la mise à jour... :(';
            $user = getUser($_POST['email']);
            unset($_SESSION['user']);
            $_SESSION['user'] = $user;
			header('Location:index.php?p=user');
        }
        else{
            echo'email deja utilisé';
        }
			
		}
	}
	else{
		
		require('views/userForm.php');
	}

}
else{
    include 'views/user.php';
}
