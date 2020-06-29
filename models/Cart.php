<?php
function display($productId){


    $db = dbConnect();
      $query = $db->prepare('SELECT * FROM products WHERE id= ?');
      $result = $query->execute([
       
        $productId
      ]
      );

      $displayProduct = $query->fetch();
      
          return $displayProduct;
        
}

function insertOrder($user)
{
  
	$db = dbConnect();
	$query = $db->prepare("INSERT INTO orders (name, user_id, email) VALUES( :name, :user_id, :email)");
	$result = $query->execute([
    'name' => $user['last_name'],
    'user_id' => $user['id'],
    'email' => $user['email'],

    ]);	
	return $result;
}
function orderDetails($product, $order, $price, $qty){
  $db = dbConnect();
  
	$query = $db->prepare("INSERT INTO order_products (name, quantity, price, order_id) VALUES( :name, :quantity, :price, :order_id)");
	$result = $query->execute([
    'name' => $product['name'],
    'quantity' => $qty,
    'price' => $price,
    'order_id' => $order['id'],

    ]);	
	return $result;

}
function lastInsertOrderId($userId){
  $db = dbConnect();
  $query = $db->prepare('SELECT id FROM orders WHERE user_id = ? ORDER BY id DESC');
  $result = $query->execute([
   $userId,

  ]
  );

  $displayProduct = $query->fetch();
  
      return $displayProduct;
}
function updateQty($quantity, $id){
  $db = dbConnect();
  $query = $db->prepare('UPDATE products SET quantity = ? WHERE id = ?');
  $updatequantity = $query->execute([
   $quantity,
   $id

  ]
  );
  
      return $updatequantity;
}