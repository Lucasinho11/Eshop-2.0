<?php
function getAllOrders(){
    $db = dbConnect();

    $query = $db->query('SELECT * FROM orders');
	$orders =  $query->fetchAll();

    return $orders;
}
function getOrderDetails($orderId){
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM order_products WHERE order_id = ?');

    $result = $query->execute( [$orderId] );

        return $user = $query-> fetchAll();

}