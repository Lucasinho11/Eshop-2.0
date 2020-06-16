<?php 
require('models/Category.php');
require('models/Product.php');

if($_GET['action'] == 'list'){
	$products = getAllProducts();
	require('views/productList.php');
}

elseif($_GET['action'] == 'new'){
    $categories = getAllCategories();
	require('views/productForm.php');
}

elseif($_GET['action'] == 'add'){
	
	if(empty($_POST['name']) || empty($_POST['short_description']) || empty($_POST['description']) || empty($_POST['price'])){
		
		if(empty($_POST['name'])){
			$_SESSION['messages'][] = 'Le champ nom est obligatoire !';
        }
		if(empty($_POST['description'])){
            $_SESSION['messages'][] = 'Le champ Description est obligatoire !';
        }
        if(empty($_POST['price'])){
            $_SESSION['messages'][] = 'Le champ prix est obligatoire !';
        }

		$_SESSION['old_inputs'] = $_POST;
		header('Location:index.php?controller=products&action=new');
		exit;
	}
	else{
		$resultAdd = addProduct($_POST);
		
		$_SESSION['messages'][] = $resultAdd ? 'produit enregistré !' : "Erreur lors de l'enregistrement  ... :(";
		
		header('Location:index.php?controller=products&action=list');
		exit;
	}
}

elseif($_GET['action'] == 'edit'){
    $categories = getAllCategories();
	if(!empty($_POST)){
		if(empty($_POST['name']) || empty($_POST['short_description']) || empty($_POST['description']) || empty($_POST['price'])){
		
			if(empty($_POST['name'])){
                $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
            }
            if(empty($_POST['description'])){
                $_SESSION['messages'][] = 'Le champ Description est obligatoire !';
            }
            if(empty($_POST['price'])){
                $_SESSION['messages'][] = 'Le champ prix est obligatoire !';
            }
            
		
			$_SESSION['old_inputs'] = $_POST;
			header('Location:index.php?controller=products&action=edit&id=' . $_GET['id']);
			exit;
		}
		else{
			$result = updateProduct($_GET['id'], $_POST);
			$_SESSION['messages'][] = $result ? 'produit mise à jour !' : 'Erreur lors de la mise à jour... :(';
			header('Location:index.php?controller=products&action=list');
			exit;
		}
	}
	else{
		if(!isset($_SESSION['old_inputs'])){
			if(isset($_GET['id'])){
				$product = getProduct($_GET['id']);
				if($product == false){
					header('Location:index.php?controller=products&action=list');
					exit;
				}
			}
			else{
				header('Location:index.php?controller=products&action=list');
				exit;
			}
        }
        $products = getAllProducts();
		require('views/productForm.php');
	}

}
elseif($_GET['action'] == 'delete'){
	if(isset($_GET['id'])){
		$result = deleteProduct($_GET['id']);
	}
	else{
		header('Location:index.php?controller=products&action=list');
		exit;
	}

	$_SESSION['messages'][] = $result ? 'produit supprimée !' : 'Erreur lors de la suppression... :(';
	
	header('Location:index.php?controller=products&action=list');
	exit;
}
