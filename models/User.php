<?php
function updateUser($informations)
{
	$db = dbConnect();
	
	$query = $db->prepare('UPDATE users SET email = ?, first_name = ?, last_name = ?, password = ?, address=? WHERE id = ?');
	
	$result = $query->execute(
		[
			htmlspecialchars($informations['email']),
            $informations['first_name'],
            $informations['last_name'],
            hash('md5',$informations['password']),
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