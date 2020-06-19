
<?php
function addImage($id,$informations)
{
	if(!isset($informations['is_main'])){
		$informations['is_main'] = 0;
	}
	else{
		$informations['is_main'] = 1;
	}
	$db = dbConnect();
	
	if(!empty($_FILES['image']['tmp_name'])){
		$productId = $db->lastInsertId();
		
		$allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
		$my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
		if (in_array($my_file_extension , $allowed_extensions)){
			$new_file_name = $productId . '.' . $my_file_extension ;
			$destination = '../assets/images/' . $new_file_name;
			$result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);
			$query = $db->prepare("INSERT INTO images (name,product_id, is_main) VALUES(:name, :product_id, :is_main)");
			$result = $query->execute([
				'name'=> $new_file_name,
				'product_id' => $id,
				'is_main' => $informations['is_main'],
			]);	
			
		}
	}

	return $result;
}
function getImages($id){
	$db = dbConnect();

    $query = $db->query('SELECT * FROM images WHERE product_id ='. $id);
    
    $imagesProduct=  $query->fetchAll();

    return $imagesProduct;
}
function deleteImage($id)
{
	$db = dbConnect();
	$image = getImages($_GET['id']);

	if(!empty($image['name'])){
		unlink("../assets/images/".$image['name']);
	}
	
	$query = $db->prepare('DELETE FROM images WHERE id = ?');
	$result = $query->execute([$id]);
	
	return $result;
}
