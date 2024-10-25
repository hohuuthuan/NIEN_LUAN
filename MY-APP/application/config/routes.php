<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'indexController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// Page
$route['danh-muc/(:any)']['GET'] = 'indexController/category/$1';
$route['thuong-hieu/(:any)']['GET'] = 'indexController/brand/$1';
$route['san-pham/(:any)']['GET'] = 'indexController/product/$1';
$route['gio-hang']['GET'] = 'indexController/cart';
$route['add-to-cart']['POST'] = 'indexController/add_to_cart';
$route['delete-to-cart']['GET'] = 'indexController/delete_to_cart';
$route['delete-item/(:any)']['GET'] = 'indexController/delete_item/$1';
$route['dang-nhap']['GET'] = 'indexController/login';





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