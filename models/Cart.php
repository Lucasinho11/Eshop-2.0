<?php
function display($productId){


    $db = dbConnect();
    foreach($_SESSION['cart'] as $cart){
  
      $query = $db->prepare('SELECT * FROM products WHERE id= ?');

      $result = $query->execute([
          $productId
      ]
      );
    }
      $displayProduct = $query->fetch();
      
          return $displayProduct;
        
  


  
}