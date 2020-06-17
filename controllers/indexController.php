<?php

require_once 'models/Category.php';
require_once 'models/Product.php';
require_once 'models/Game.php';
$_GET['category_id'] = 0;


$categories = getCategories();
$parentsCategories = getParentsCategories();
$imagesSlide = imageSlide();

include 'views/index.php';
