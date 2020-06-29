<?php
require('models/Cart.php');
require('models/Product.php');
require('models/Category.php');
require('models/Game.php');
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
                
                }
                else{
                    $_SESSION['cart'][$_GET['product_id']]['quantity'] = $_POST['quantity'];
                }
                header('Location:index.php?p=cart&action=display');
                exit;
            }
            else{
                echo"<h1 style='font-size:100px; color:red;'>ne touche pas à la console petit malin</h1><br><img src='./assets/images/max.png' style='width:1000px;'>";
            }
        
        }
        else{
            $_SESSION['messages'][] = 'Quantité non sélectionnée (ne touche pas à la console)';
            header('Location:index.php');
        }
    break;
    case 'deleteProduct':
        unset($_SESSION['cart'][$_GET['product_id']]);
        header('Location:index.php?p=cart&action=display');
        exit;
    break;
    case 'upadateProductQty':
        $_SESSION['cart'][$_GET['product_id']]['quantity'] = $_POST['quantity'];
        header('Location:index.php?p=cart&action=display');
        exit;
    break;
    case'display':
        if(!isset($cartProducts)){
            $cartProducts = [];
        }
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        
        }
        if(isset($_SESSION['cart'])){
           
        foreach($_SESSION['cart'] as $product_id => $quantity){
            $cartProducts [] = display($product_id);
        }
        require('views/cart.php');
        }
    break;
    case'insertorder':
        if(isset($_SESSION['user'])){
            $order = insertOrder($_SESSION['user']);
            $orderId = lastInsertOrderId($_SESSION['user']['id']);
            foreach($_SESSION['cart'] as $product_id => $quantity){
                $cartProducts [] = display($product_id);
            }
            foreach($cartProducts as $product){

                $price = $product['price'] * $_SESSION['cart'][$product['id']]['quantity'];
                $orderdetails = orderDetails($product,$orderId, $price, $_SESSION['cart'][$product['id']]['quantity']);
                $qtyRemaining = $product['quantity'] - $_SESSION['cart'][$product['id']]['quantity'];
                $updateqty = updateQty($qtyRemaining,$product['id']);
            }
        unset($_SESSION['cart']);
        header('Location:index.php');
    }
    else{
        header('Location:index.php?p=register');
    }
    break;

    default :
    require 'controllers/indexController.php';
}




