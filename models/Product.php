<?php
function getProducts($categoryId){


    $db = dbConnect();

    $query = $db->prepare('SELECT p.*
    FROM products p
    INNER JOIN products_categories pc ON p.id=pc.product_id
    WHERE pc.category_id = ?');

    $result = $query->execute([
        $categoryId
    ]
    );

    $products = $query->fetchAll();
    

    return $products;
}

function getProduct($id){

    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM products WHERE id = ?');

    $result = $query->execute( [$id] );

    if($result){
        return $query-> fetch();
    }

    else{
        return false;
    }

}
function getImages($productId){
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM images WHERE product_id = ? ORDER BY is_main DESC');

    $result = $query->execute( [$productId] );
    $images = $query->fetchAll();
    
    return $images;
}

