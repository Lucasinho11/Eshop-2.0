<?php
require('models/Cart.php');
require('models/Product.php');
require('models/Category.php');
$_GET['category_id'] = 0;
$categories = getCategories();
$parentsCategories = getParentsCategories();
$productCart = [];
switch($_GET['action']){
    case 'addProduct':
        $product = getProduct($_GET['product_id']);
        $productCart[] = $_SESSION['cart'][$_GET['product_id']] ;
        var_dump($productCart);
        die();
        header('Location:index.php?p=cart&action=display');
    break;
    case 'deleteProduct':
    break;
    case 'updateProduct':
    break;
    case'display':
        
        $cartProducts = [];
        $cartProducts[] = display($productCart['id']);
        require('views/cart.php');
    break;
    default :
    require 'controllers/indexController.php';
}




