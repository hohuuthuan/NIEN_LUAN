<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'indexController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// login
$route['login']['GET'] = 'loginController/index';
$route['login-user']['POST'] = 'loginController/loginUser';
// dashboard
$route['dashboard']['GET'] = 'dashboardController/index';
$route['logout']['GET'] = 'dashboardController/logout';
// Brand
$route['brand/list']['GET'] = 'brandController/index';
$route['brand/create']['GET'] = 'brandController/createBrand';
$route['brand/edit/(:any)']['GET'] = 'brandController/editBrand/$1';
$route['brand/store']['POST'] = 'brandController/storeBrand';
$route['brand/update/(:any)']['POST'] = 'brandController/updateBrand/$1';
$route['brand/delete/(:any)']['GET'] = 'brandController/deleteBrand/$1';
// Category
$route['category/list']['GET'] = 'categoryController/index';
$route['category/create']['GET'] = 'categoryController/createCategory';
$route['category/edit/(:any)']['GET'] = 'categoryController/editCategory/$1';
$route['category/store']['POST'] = 'categoryController/storeCategory';
$route['category/update/(:any)']['POST'] = 'categoryController/updateCategory/$1';
$route['category/delete/(:any)']['GET'] = 'categoryController/deleteCategory/$1';
// Product
$route['product/list']['GET'] = 'productController/index';
$route['product/create']['GET'] = 'productController/createProduct';
$route['product/edit/(:any)']['GET'] = 'productController/editProduct/$1';
$route['product/store']['POST'] = 'productController/storeProduct';
$route['product/update/(:any)']['POST'] = 'productController/updateProduct/$1';
$route['product/delete/(:any)']['GET'] = 'productController/deleteProduct/$1';


$route['HomePage']['GET'] = 'HomePage';