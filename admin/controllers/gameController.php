<?php

require('models/Game.php');
require('models/Category.php');
$categories = getAllCategories();
if($_GET['action'] == 'list'){
	$games = getAllGames();
	require('views/gameList.php');
}

elseif($_GET['action'] == 'new'){
	require('views/gameForm.php');
}

elseif($_GET['action'] == 'add'){

	if(empty($_POST['name']) || empty($_POST['parent_id']) || empty($_FILES['image']['tmp_name'])){
		
		if(empty($_POST['name'])){
			$_SESSION['messages'][] = 'Le champ name est obligatoire !';
        }
		if(empty($_POST['parent_id'])){
            $_SESSION['messages'][] = 'Le champ catégorie est obligatoire !';
        }
        if(empty($_FILES['image']['tmp_name'])){
            $_SESSION['messages'][] = 'Le champ image est obligatoire !';
        }
        

		$_SESSION['old_inputs'] = $_POST;
		header('Location:index.php?controller=games&action=new');
		exit;
	}
	else{
		$resultAdd = addGame($_POST);
		
		$_SESSION['messages'][] = $resultAdd ? 'Jeu enregistré !' : "Erreur lors de l'enregistrement ... :(";
		
		header('Location:index.php?controller=games&action=list');
		exit;
	}
}


elseif($_GET['action'] == 'edit'){
	
	if(!empty($_POST)){
		if(empty($_POST['name']) || empty($_POST['image'])){
		
			if(empty($_POST['name'])){
				$_SESSION['messages'][] = 'Le champ nom est obligatoire !';
            }
            if(empty($_POST['image'])){
				$_SESSION['messages'][] = 'Le champ image est obligatoire !';
            }
        
			$_SESSION['old_inputs'] = $_POST;
			header('Location:index.php?controller=games&action=edit&id=' . $_GET['id']);
			exit;
		}
		else{
			$result = updateGame($_GET['id'], $_POST);
			$_SESSION['messages'][] = $result ? 'jeu mis à jour !' : 'Erreur lors de la mise à jour... :(';
			header('Location:index.php?controller=games&action=list');
			exit;
		}
	}
	else{
		if(!isset($_SESSION['old_inputs'])){
			if(isset($_GET['id'])){
				$game = getGame($_GET['id']);
				if($game == false){
					header('Location:index.php?controller=games&action=list');
					exit;
				}
			}
			else{
				header('Location:index.php?controller=games&action=list');
				exit;
			}
		}
		require('views/gameForm.php');
	}

}
elseif($_GET['action'] == 'delete'){
	if(isset($_GET['id'])){
		$result = deleteGame($_GET['id']);
	}
	else{
		header('Location:index.php?controller=games&action=list');
		exit;
	}

	$_SESSION['messages'][] = $result ? 'jeu supprimée !' : 'Erreur lors de la suppression... :(';
	
	header('Location:index.php?controller=games&action=list');
	exit;
}

