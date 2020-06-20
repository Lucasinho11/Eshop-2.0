<?php
require('models/Cart.php');
require('models/Product.php');
require('models/Category.php');
$_GET['category_id'] = 0;
$categories = getCategories();
$parentsCategories = getParentsCategories();

switch($_GET['action']){
    case 'addProduct':

        $product = getProduct($_GET['product_id']);
        if(!empty($_POST['quantity'])){
            if($_POST['quantity'] <= $product['quantity'] && $_POST['quantity'] > 0){
                if(!isset($_SESSION['cart'])){
                    $_SESSION['cart'] = [];
                    $_SESSION['cart']['product_id'] = [];
                    $_SESSION['cart']['product_name'] = [];
                    $_SESSION['cart']['name'] = [];
                    $_SESSION['cart']['image'] = [];
                    $_SESSION['cart']['price'] = [];
                    $_SESSION['cart']['qty'] = [];
                
                }
                else{
                    addCart($_GET['product_id'], $_POST['quantity'],$mainImageProduct['name']);
                    echo'yo';
                }
                header('Location:index.php?p=cart&action=display');
            }
            else{
                echo"<h1 style='font-size:100px; color:red;'>ne touche pas à la console petit malin</h1><br><img src='./assets/images/max.png' style='width:1000px;'>";
            }
        
        }
        else{
            $_SESSION['messages'][] = 'Quantité non sélectionnée (ne touche pas à la console';
            header('Location:index.php');
        }
    break;
    case 'delete':
        header('Location:index.php?p=cart&action=display');
    break;
    case 'updateProduct':
    break;
    case'display':
        if(!isset($cartProducts)){
            $cartProducts = [];
        }
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
            $_SESSION['cart']['product_id'] = [];
            $_SESSION['cart']['product_name'] = [];
            $_SESSION['cart']['name'] = [];
            $_SESSION['cart']['image'] = [];
            $_SESSION['cart']['price'] = [];
            $_SESSION['cart']['qty'] = [];
        
        }
        if(isset($_SESSION['cart'])){
            $cartProducts ['id']= $_SESSION['cart']['product_id'];
            $cartProducts ['name']= $_SESSION['cart']['product_name'];
            $cartProducts ['qty']= $_SESSION['cart']['qty'];
            $cartProducts ['image']= $_SESSION['cart']['image'];
        foreach($cartProducts as $product){
            $getProduct = getProduct($product);
            $productsCart[] = display($getProduct['id']);
            $imageCart[] = displayImage($getProduct['id']);
        }
        require('views/cart.php');
        }
    break;
    case'insertorder':
        if(isset($_SESSION['user'])){
        foreach($_SESSION['cart'] as $session):
            $order = insertOrder($_SESSION['user'], $_GET['price']);
        endforeach;
        unset($_SESSION['cart']);
        header('Location:index.php?p=cart&action=display');
    }
    else{
        header('Location:index.php?p=register');
    }
    break;

    default :
    require 'controllers/indexController.php';
}




