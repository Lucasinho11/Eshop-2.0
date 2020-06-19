<?php
require('models/Product.php');
require('models/Image.php');


switch($_GET['action']){
    case 'list':
        $imagesProduct = getAllImages($_GET['id']);
        $mainImageProduct = getMainImage($_GET['id']);
        $secondaryImageProduct = getSecondaryImage($_GET['id']);
        require('views/imageList.php');
    break; 
    case 'newImage':
        $productId = $_GET['id'];
        require('views/imageForm.php');
    break;
    case 'addImage':
       
        if(empty($_FILES['image']['tmp_name'])){
            if(empty($_FILES['image']['tmp_name'])){
                $_SESSION['messages'][] = 'Le champ image est obligatoire !';
            }
        }
        
        else{
            
            if(isset($_POST['is_main'])){
                $mainImageProduct = getMainImage($_GET['id']);
                if(!$mainImageProduct){
                    $resultAdd = addImage($_GET['id'],$_POST);
                    $_SESSION['messages'][] = $resultAdd ? 'Image enregistrée !' : "Erreur lors de l'enregistrement ... :(";
                
                    header('Location:index.php?p=images&action=list&id='.$_GET['id']);
                    exit;
                }
                else{
                    echo'Impossible une image principale existe pour ce produit';
                }
            }
            else{
                    $resultAdd = addImage($_GET['id'],$_POST);
                    $_SESSION['messages'][] = $resultAdd ? 'Image enregistrée !' : "Erreur lors de l'enregistrement ... :(";
                
                    header('Location:index.php?p=images&action=list&id='.$_GET['id']);
                    exit;
            }
            
            
        }
    break;
    case 'deleteImage':
        if(isset($_GET['id'])){
            $result = deleteImage($_GET['id']);
            
        }
        else{
            header('Location:index.php?p=products&action=list');
            exit;
        }
    
        $_SESSION['messages'][] = $result ? 'image supprimée !' : 'Erreur lors de la suppression... :(';
        
        header('Location:index.php?p=products&action=list');
        exit;
    break;
}

