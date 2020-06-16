<?php


require_once 'models/Login.php';
require_once 'models/Register.php';
require_once 'models/Category.php';

$parentsCategories = getParentsCategories();




include 'views/user.php';
