<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/admin', 'Home::adminPage');

//Signin and Signup
//Signup
$routes->get('/', 'SignupController::index');
$routes->get('/signup', 'SignupController::index');
$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
//Signin
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->get('/signin', 'SigninController::index');
//Profile
$routes->get('/login', 'ProfileController::index',['filter' => 'authGuard']);
$routes->get('/logout', 'ProfileController::logout',['filter' => 'authGuard']);

// CRUD for categories
$routes->get('categories/category-list', 'CategoryCrud::index');
$routes->get('categories/category-form', 'CategoryCrud::create');
$routes->post('categories/submit-form', 'CategoryCrud::store');
$routes->get('categories/edit-view/(:num)', 'CategoryCrud::singleUser/$1');
$routes->post('categories/update', 'CategoryCrud::update');
$routes->get('categories/delete/(:num)', 'CategoryCrud::delete/$1');
//create subcategory
$routes->post('category/getsubcategories', 'CategoryCrud::getSubcategories');

// CRUD for products
$routes->get('products/product-list', 'ProductCrud::index');
$routes->get('products/product-form', 'ProductCrud::create');
$routes->post('products/submit-form', 'ProductCrud::store');
$routes->get('products/edit-view/(:num)', 'ProductCrud::singleUser/$1');
$routes->post('products/update', 'ProductCrud::update');
$routes->get('products/delete/(:num)', 'ProductCrud::delete/$1');
//create subproducts
$routes->post('product/getproducts', 'ProductCrud::getProducts');

//Add img for products
/*$routes->get('products/product', 'ProductCrud::upload');*/
$routes->match(['get', 'post'], 'ProductCrud::store', 'ProductCrud::store');