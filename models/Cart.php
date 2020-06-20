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
function addCart($id,$qty){
  $_SESSION['cart']['product_id'] = $id;
  $_SESSION['cart']['qty'] = $qty;

}
function getMainImage($id){
	$db = dbConnect();

    $query = $db->query('SELECT * FROM images WHERE is_main = 1 AND product_id ='. $id);

    $mainImageProduct =  $query->fetchAll();

    return $mainImageProduct;
}