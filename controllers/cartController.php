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
        $_SESSION['cart'][$_GET['product_id']] = $product;
       
        header('Location:index.php?p=cart&action=display');
    break;
    case 'deleteProduct':
    break;
    case 'updateProduct':
    break;
    case'display':
        $cartProducts = [];
        foreach($_SESSION['cart'] as $cart){
            $cartProducts[] = display($product['id']);
        }
        require('views/cart.php');
    break;
}




