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
	
	$query = $db->prepare('UPDATE products SET name = ?, short_description = ?, description = ?, price = ?, quantity = ?  WHERE id = ?');
	
	$result = $query->execute(
		[
			htmlspecialchars($informations['name']),
            $informations['short_description'],
            $informations['description'],
			$informations['price'],
			$informations['quantity'],
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
	
	$query = $db->prepare("INSERT INTO products (name, short_description, description, price, quantity) VALUES( :name, :short_description, :description, :price, :quantity)");
	$result = $query->execute([
        'name' => htmlspecialchars($informations['name']),
        'short_description' => $informations['short_description'],
        'description' => $informations['description'],
		'price' => $informations['price'],
		'quantity' => $informations['quantity'],
	]);
	$productId = $db->lastInsertId();
	$query = $db->prepare("INSERT INTO products_categories (product_id, category_id) VALUES( :product_id, :category_id)");
	$result2 = $query->execute([
        'product_id' => $productId,
        'category_id' => $informations['game_id'],
	]);

	return $result;
}
function deleteProduct($id)
{
	$db = dbConnect();
	
	$query = $db->prepare('DELETE FROM products WHERE id = ?');
	$result = $query->execute([$id]);
	$query = $db->prepare('DELETE FROM products_categories WHERE product_id = ?');
	$result2 = $query->execute([$id]);
	$query = $db->prepare('DELETE FROM images WHERE product_id = ?');
	$result3 = $query->execute([$id]);
	return $result;
}
function productCategories(){
	$db = dbConnect();

    $query = $db->query('SELECT * FROM products_categories LIMIT 1');
	$productCategories =  $query->fetchAll();

    return $productCategories;
}
