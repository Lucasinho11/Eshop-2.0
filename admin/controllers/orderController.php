<?php 
require('models/Order.php');
switch($_GET['action']){
    case'list':
        $orders = getAllOrders();
        require('views/orderList.php');
        
    break;
    case'details':
        $orderDetails = getOrderDetails($_GET['order_id']);

        require('views/orderDetailsList.php');
    break;

    default :
    require 'controllers/indexController.php';
}