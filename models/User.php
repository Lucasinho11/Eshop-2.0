<?php
function updateUser($informations)
{
	$db = dbConnect();
    
    if(empty($informations['password'])){
        $informations['password'] = $_SESSION['user']['password'];
    }
    else{
        $informations['password'] = hash('md5',$informations['password']);
    }
	$query = $db->prepare('UPDATE users SET email = ?, first_name = ?, last_name = ?, password = ?, address=? WHERE id = ?');
	
	$result = $query->execute(
		[
			htmlspecialchars($informations['email']),
            $informations['first_name'],
            $informations['last_name'],
            $informations['password'],
            $informations['address'],
            $_SESSION['user']['id'],
		]
	);
	
	return $result;
}
function getUser($email){

    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM users WHERE email = ?');

    $result = $query->execute( [$email] );

    if($result){
        return $user = $query-> fetch();
    }

    else{
        return false;
    }

}
function getOrders($userId){
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM orders WHERE user_id = ?');

    $result = $query->execute( [$userId] );

        return $user = $query-> fetchAll();

}
function getOrdersDetails($orderId){
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM order_products WHERE order_id = ?');

    $result = $query->execute( [$orderId] );

        return $user = $query-> fetchAll();

}