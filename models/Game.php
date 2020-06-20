<?php
// function getProductsCategories($categoryId){
//       $db = dbConnect();


//       $query = $db->prepare('SELECT *
//       FROM products_categories
//       WHERE category_id = ?');

//       $result = $query->execute([
//           $categoryId
//       ]
//       );

//       $productsCategories = $query->fetchAll();

  


//   return $productsCategories;
// }
function getImagesGames($categoryId){
  $db = dbConnect();


    $query = $db->prepare('SELECT i.*
    FROM images i 
    INNER JOIN products_categories pc ON pc.product_id=i.product_id
    WHERE pc.category_id = ? AND i.is_main = 1 LIMIT 1');

    $result = $query->execute([
        $categoryId
    ]
    );

    $imagesGame = $query->fetchAll();




return $imagesGame;
}
function imageSlide(){
  $db = dbConnect();


    $query = $db->prepare('SELECT * FROM categories WHERE parent_id IS NOT NULL ORDER BY id DESC LIMIT 3');

    $result = $query->execute();

    $imagesSlide = $query->fetchAll();

    return $imagesSlide;
}
