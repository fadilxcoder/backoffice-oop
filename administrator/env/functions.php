<?php

require_once('web-config.php');

// Load all classes dynamically
function loadClass($className) { require_once('class/'.$className.'.class.php'); }
spl_autoload_register('loadClass');

// Singleton to connect db
$dbInstance = Database::getInstance();
$db = $dbInstance->getDBConnection();

// Classes instantiation
$category   = new Category($db);
$product    = new Product($db);

############################################## Codes Logic ##############################################

// Redirect to login.php if not logged in
if(basename($_SERVER['PHP_SELF']) != 'login.php' && !isset($_SESSION["admin"]) && $_SESSION["admin"] == false):
    header('Location: login.php');
    exit();
endif;

// Redirect to dashboard.php if logged in
if(basename($_SERVER['PHP_SELF']) == 'login.php' && isset($_SESSION["admin"]) && $_SESSION["admin"] == true):
    header('Location: dashboard.php');
    exit();
endif;

// Login
if(isset($_POST['login'])){
    $login = new Login($db);
    $login->_username = $_POST['adm_email'];
    $login->_password = md5($_POST['password']);
    $login->processLogin();
}

// Logout
if(isset($_GET['logout']) && $_GET['logout'] == 1){
    login::doLogout();
}

// Add product
if(isset($_POST['add_product'])){
    $product->_category_id  = $_POST['category'];
    $product->_name         = $_POST['name'];
    $product->_description  = $_POST['description'];
    $product->_price        = $_POST['price'];
    $product->_main_image   = $_FILES['image'];
    $product->create();
}

// Delete product
if( isset($_GET['ref']) && $_GET['ref'] == 'products' && $_GET['del'] == 1){
    $product->_id = $_GET['id'];
    $product->delete();
}

// Edit product
if(isset($_POST['edit_product'])){
    $product->_id           = $_GET['id'];
    $product->_category_id  = $_POST['category'];
    $product->_name         = $_POST['name'];
    $product->_description  = $_POST['description'];
    $product->_price        = $_POST['price'];
    $product->_main_image   = $_FILES['image'];
    $product->edit();
}

// Add category
if(isset($_POST['add_category'])){
    $category->_cat_name    = $_POST['cat_name'];
    $category->_ordering    = $_POST['ordering'];
    $category->create();
}

// Delete category
if( isset($_GET['ref']) && $_GET['ref'] == 'category' && $_GET['del'] == 1){
    $category->_id = $_GET['id'];
    $category->delete();
}