<?php

require_once 'models/Category.php';
require_once 'models/Product.php';
$_GET['category_id'] = 0;


$categories = getCategories();
$parentsCategories = getParentsCategories();

include 'views/index.php';
