<?php
function getCategories($productId = false){


    $db = dbConnect();


      $query = $db->prepare('SELECT * FROM categories WHERE parent_id = ? ORDER BY name ASC');

      $result = $query->execute([
          $_GET['category_id']
      ]
      );

      $categories = $query->fetchAll();

  


  return $categories;
}
function getParentsCategories($productId = false){
    $db = dbConnect();


    $query = $db->prepare('SELECT * FROM categories WHERE parent_id IS NULL ORDER BY name ASC');

    $result = $query->execute();

    $parentsCategories = $query->fetchAll();

    return $parentsCategories;
}


function getCategory($id){

    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM categories WHERE id = ?');

    $result = $query->execute( [$id] );

    if($result){
        return $category = $query-> fetch();
    }

    else{
        return false;
    }

}

// function getImagesByCategory($categoryId){

//     $db = dbConnect();

//     $query = $db->prepare('SELECT i.*,p.id
//     FROM images i, products p
//     INNER JOIN products_categories pc ON p.id=pc.product_id
//     INNER JOIN images ON images.product_id=p.id
//     WHERE pc.category_id = ? AND i.is_main =1
//     LIMIT 1');

//     $result = $query->execute([
//         $categoryId
//     ]
//     );

//     $imagesByCategory = $query->fetchAll();
    

//     return $imagesByCategory;
// }
