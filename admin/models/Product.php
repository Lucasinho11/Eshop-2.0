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

	return $result;
}
function deleteProduct($id)
{
	$db = dbConnect();
	
	$query = $db->prepare('DELETE FROM products WHERE id = ?');
	$result = $query->execute([$id]);
	
	return $result;
}