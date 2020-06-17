<?php
function getAllGames(){

    $db = dbConnect();

    $query = $db->query('SELECT * FROM categories WHERE parent_id IS NOT NULL');
	$games =  $query->fetchAll();

    return $games;

}
function getGame($gameId)
{
	$db = dbConnect();
	
	$query = $db->prepare("SELECT * FROM categories WHERE id = ?");
	$query->execute([
		$gameId
	]);
	
	$game = $query->fetch();
	
	return $game;
}
function updateGame($gameId, $informations)
{
	$db = dbConnect();

	$query = $db->prepare('UPDATE categories SET name = ?, parent_id = ? WHERE id = ?');
	
	$result = $query->execute(
		[
			htmlspecialchars($informations['name']),
            $informations['parent_id'],
			$gameId,
		]
    );
    
	return $result;
}

function addGame($informations)
{

	$db = dbConnect();
	
	$query = $db->prepare("INSERT INTO categories (name, parent_id) VALUES( :name, :parent_id)");
	$result = $query->execute([
        'name' => htmlspecialchars($informations['name']),
        'parent_id'=>$informations['parent_id'],
    ]);	
    if($result && !empty($_FILES['image']['tmp_name'])){
		$gameId = $db->lastInsertId();
		
		$allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
		$my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
		if (in_array($my_file_extension , $allowed_extensions)){
			$new_file_name = $gameId . '.' . $my_file_extension ;
			$destination = '../assets/images/' . $new_file_name;
			$result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);
			
			$db->query("UPDATE categories SET image = '$new_file_name' WHERE id = $gameId");
		}
	}
	return $result;
}
function deleteGame($gameId)
{
	$db = dbConnect();
	$game = getGame($_GET['id']);

	if(!empty($game['image'])){
		unlink("../assets/images/".$game['image']);
	}
	
	$query = $db->prepare('DELETE FROM categories WHERE id = ?');
	$result = $query->execute([$gameId]);
	
	return $result;
}
