<?php


require_once 'models/Register.php';
require_once 'models/Category.php';
$parentsCategories = getParentsCategories();
if(!empty($_POST)){
    if(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['first_name']) || empty($_POST['last_name'])) {
        echo'champs obligatoires vides';
    }
    else{
        $emailExist = emailExist($_POST['email']);
        if(!$emailExist){
            register();
            header('Location:index.php?p=login');
        }
        else{
            echo'email deja utilisé';
        }
    }
}

include 'views/register.php';

?>
