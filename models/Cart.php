<?php
function display($productId){


    $db = dbConnect();
      $query = $db->prepare('SELECT * FROM products WHERE id= ?');
      $result = $query->execute([
       
        $productId
      ]
      );

      $displayProduct = $query->fetch();
      $query = $db->prepare('SELECT * FROM images WHERE is_main = 1 AND product_id = ?');
      $result = $query->execute([
       
        $productId
      ]
      );
      $displayImage =  $query->fetch();

      
          return $displayProduct;
        
}
function displayImage($productId){


  $db = dbConnect();
    $query = $db->prepare('SELECT * FROM images WHERE is_main = 1 AND product_id = ? LIMIT 1');
    $result = $query->execute([
     
      $productId
    ]
    );
    $displayImage =  $query->fetch();

    
        return $displayImage;
      
}

function addCart($id,$qty, $img){
  $_SESSION['cart']['product_id'] = $id;
  $_SESSION['cart']['qty'] = $qty;
  $_SESSION['cart']['image'] = $img;


}
function getMainImage($productId){
	$db = dbConnect();

    $query = $db->query('SELECT * FROM images WHERE is_main = 1 AND product_id ='. $productId);

    $mainImageProduct =  $query->fetchAll();

    return $mainImageProduct;
  
}
function insertOrder($user , $totalPrice)
{
	$db = dbConnect();
	
	$query = $db->prepare("INSERT INTO orders (name, total_price, email) VALUES( :name, :total_price, :email)");
	$result = $query->execute([
    'name' => $user['last_name'],
    'total_price' => $totalPrice,
    'email' => $user['email'],

    ]);	
	return $result;
}