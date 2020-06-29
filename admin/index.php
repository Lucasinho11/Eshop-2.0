<?php

session_start();

require ('../helpers.php');?>
<?php if(isset($_SESSION['user']) && $_SESSION['user']['is_admin'] == 0):?>
    <?php header('Location:../index.php');?>
<?php endif;?>
<?php if(!isset($_SESSION['user'])):?>
    <?php header('Location:../index.php');?>
<?php endif;?>

<?php
if(isset($_GET['p'])){
	switch ($_GET['p']){
        case 'users':
			require 'controllers/userController.php';
		break;
        case 'categories':
			require 'controllers/categoryController.php';
		break;
		case 'games' :
			require 'controllers/gameController.php';
		break;
		case 'products' :
			require 'controllers/productController.php';
		break;
		case 'images' :
			require 'controllers/imagesController.php';
		break;
		case 'users' :
			require 'controllers/userController.php';
		break;
		case 'orders' :
			require 'controllers/orderController.php';
		break;
        default :
            require 'controllers/indexController.php';
	}
}
else{
	require 'controllers/indexController.php';
}

if(isset($_SESSION['messages'])){
	unset($_SESSION['messages']);	
}
if(isset($_SESSION['old_inputs'])){
	unset($_SESSION['old_inputs']);	
}
