<?php
require('helpers.php');
session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}


if(isset($_GET['p'])):
    switch ($_GET['p']):
        case 'category' :
            require 'controllers/categoryController.php';
            break;

        case 'product' :
            require 'controllers/productController.php';
            break;

        case 'register':
            require 'controllers/registerController.php';
            break;
        case 'game':
            require 'controllers/gameController.php';
            break;
        case 'login':
            require 'controllers/loginController.php';
            break;
        case 'user':
            require 'controllers/userController.php';
            break;  
        case 'questions':
            require 'views/questions.php';
            break;  
        case 'cart':
            require 'controllers/cartController.php';
            break;  
        default :
            require 'controllers/indexController.php';
    endswitch;
else:
    require 'controllers/indexController.php';
endif;
