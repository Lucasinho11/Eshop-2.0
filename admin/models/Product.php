<?php

function getAllProducts()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM products');
    $products=  $query->fetchAll();

    return $products;
}
function getProduct($id)
{
	$db = dbConnect();
	
	$query = $db->prepare("SELECT * FROM products WHERE id = ?");
	$query->execute([
		$id
	]);
	
	$result = $query->fetch();
	
	return $result;
}
function updateProduct($id, $informations)
{
	$db = dbConnect();
	
	$query = $db->prepare('UPDATE products SET name = ?, short_description = ?, description = ?, price = ?  WHERE id = ?');
	
	$result = $query->execute(
		[
			htmlspecialchars($informations['name']),
            $informations['short_description'],
            $informations['description'],
            $informations['price'],
			$id,
		]
	);
	$query = $db->prepare('UPDATE products_categories SET product_id = ?, category_id = ? WHERE product_id = ?');
	
	$result2 = $query->execute(
		[
			$id,
			$informations['game_id'],
			$id,
		]
	);
	
	return $result;
}
function addProduct($informations)
{
	$db = dbConnect();
	
	$query = $db->prepare("INSERT INTO products (name, short_description, description, price) VALUES( :name, :short_description, :description, :price)");
	$result = $query->execute([
        'name' => htmlspecialchars($informations['name']),
        'short_description' => $informations['short_description'],
        'description' => $informations['description'],
        'price' => $informations['price'],
	]);
	$productId = $db->lastInsertId();
	$query = $db->prepare("INSERT INTO products_categories (product_id, category_id) VALUES( :product_id, :category_id)");
	$result2 = $query->execute([
        'product_id' => $productId,
        'category_id' => $informations['game_id'],
	]);
	// if($result && isset($_FILES['main_image']['tmp_name'])){
	// 	$productId = $db->lastInsertId();
		
	// 	$allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
	// 	$my_file_extension = pathinfo( $_FILES['main_image']['name'] , PATHINFO_EXTENSION);
	// 	if (in_array($my_file_extension , $allowed_extensions)){
	// 		$new_file_name = $productId . '.' . $my_file_extension ;
	// 		$destination = '../assets/images/' . $new_file_name;
	// 		$result = move_uploaded_file( $_FILES['main_image']['tmp_name'], $destination);
			
	// 		$db->query("INSERT INTO images (name, is_main, product_id) VALUES( :name, :is_main, :product_id)");
	// 		$result = $query->execute([
	// 			'name' => $informations['main_image'],
	// 			'is_main' => 1,
	// 			'product_id' => $productId,

	// 		]);
	// 	}
	// }

	return $result;
}
function deleteProduct($id)
{
	$db = dbConnect();
	
	$query = $db->prepare('DELETE FROM products WHERE id = ?');
	$result = $query->execute([$id]);
	$query = $db->prepare('DELETE FROM products_categories WHERE product_id = ?');
	$result2 = $query->execute([$id]);
	
	return $result;
}
function productCategories(){
	$db = dbConnect();

    $query = $db->query('SELECT * FROM products_categories');
	$productCategories =  $query->fetchAll();

    return $productCategories;
}