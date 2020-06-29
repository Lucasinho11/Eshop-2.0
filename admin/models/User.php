<?php 
function getAllUsers(){

    $db = dbConnect();

    $query = $db->query('SELECT * FROM users');
	$users =  $query->fetchAll();

    return $users;

}
function getUser($id)
{
	$db = dbConnect();
	
	$query = $db->prepare("SELECT * FROM users WHERE id = ?");
	$query->execute([
		$id
	]);
	
	$result = $query->fetch();
	
	return $result;
}
function addUser($informations)
{
	if(!isset($informations['is_admin'])){
		$informations['is_admin'] = 0;
	}
	else{
		$informations['is_admin'] = 1;
	}
	$db = dbConnect();
	
	$query = $db->prepare("INSERT INTO users (email, password, first_name, last_name, address, is_admin) VALUES(:email, :password, :first_name, :last_name, :address, :is_admin)");
	$result = $query->execute([
        'email' => $informations['email'],
        'password' => $informations['password'],
        'first_name' => $informations['first_name'],
        'last_name' => $informations['email'],
        'address' => $informations['address'],
        'is_admin' => $informations['is_admin'],

    ]);	
	return $result;
}
function deleteUser($id)
{
	$db = dbConnect();
	$query = $db->prepare('DELETE FROM users WHERE id = ?');
	$result = $query->execute([$id]);
	
	return $result;
}
function updateUser($id, $informations)
{
	$db = dbConnect();
	if(!isset($informations['is_admin'])){
		$informations['is_admin'] = 0;
	}
	else{
		$informations['is_admin'] = 1;
	}
	if(empty($informations['password'])){
        $informations['password'] = $_SESSION['user']['password'];
    }
    else{
        $informations['password'] = hash('md5',$informations['password']);
    }
	$query = $db->prepare('UPDATE users SET email = ?, password = ?, first_name = ?, last_name = ?, address = ?, is_admin = ? WHERE id = ?');
	
	$result = $query->execute(
		[
            $informations['email'],
            $informations['password'],
            $informations['first_name'],
            $informations['last_name'],
            $informations['address'],
            $informations['is_admin'],
			$id,
		]
	);
	
	return $result;
}
