<?php
if(!isset($_GET['category_id']) || !ctype_digit($_GET['category_id'])){
  header('Location:index.php');
  exit;
}

require_once 'models/Category.php';
require_once 'models/Product.php';
$parentsCategories = getParentsCategories();
$category = getCategory($_GET['category_id']);
$categories = getCategories();
if($category == false){
  header('Location:index.php');
  exit;
}


$products = getProducts($category['id']);

include 'views/category.php';
