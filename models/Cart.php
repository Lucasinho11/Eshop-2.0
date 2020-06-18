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