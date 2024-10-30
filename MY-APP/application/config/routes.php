<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'indexController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// Page
$route['HomePage']['GET'] = 'HomePage';
$route['404_override'] = 'indexController/page_404';
$route['danh-muc/(:any)/(:any)']['GET'] = 'indexController/category/$1/$2';
$route['thuong-hieu/(:any)/(:any)']['GET'] = 'indexController/brand/$1/$2';
$route['san-pham/(:any)/(:any)']['GET'] = 'indexController/product/$1/$2';
$route['gio-hang']['GET'] = 'indexController/cart';
$route['add-to-cart']['POST'] = 'indexController/add_to_cart';
$route['update-cart-item']['POST'] = 'indexController/update_cart_item';
$route['login-customer']['POST'] = 'indexController/loginCustomer';
$route['delete-all-cart']['GET'] = 'indexController/delete_all_cart';
$route['delete-item/(:any)']['GET'] = 'indexController/delete_item/$1';
$route['dang-nhap']['GET'] = 'indexController/login';
$route['dang-xuat']['GET'] = 'indexController/logout';
$route['checkout']['GET'] = 'indexController/checkout';
$route['confirm-checkout']['POST'] = 'indexController/confirm_checkout';
$route['thank-you-for-order']['GET'] = 'indexController/thank_you_for_order';
$route['search-product']['GET'] = 'indexController/search_product';

// admin
$route['login-user']['POST'] = 'loginController/loginUser';
$route['register-admin']['GET'] = 'loginController/register_admin';
$route['register-admin-submit']['POST'] = 'loginController/insert_admin';


// Customer
$route['login']['GET'] = 'loginController/index';
$route['dang-ky']['POST'] = 'indexController/dang_ky';
$route['kich-hoat-tai-khoan']['GET'] = 'indexController/kich_hoat_tai_khoan';





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
// Slider
$route['slider/list']['GET'] = 'sliderController/index';
$route['slider/create']['GET'] = 'sliderController/createSlider';
$route['slider/edit/(:any)']['GET'] = 'sliderController/editSlider/$1';
$route['slider/store']['POST'] = 'sliderController/storeSlider';
$route['slider/update/(:any)']['POST'] = 'sliderController/updateSlider/$1';
$route['slider/delete/(:any)']['GET'] = 'sliderController/deleteSlider/$1';



// Product
$route['product/list']['GET'] = 'productController/index';
$route['product/create']['GET'] = 'productController/createProduct';
$route['product/edit/(:any)']['GET'] = 'productController/editProduct/$1';
$route['product/store']['POST'] = 'productController/storeProduct';
$route['product/update/(:any)']['POST'] = 'productController/updateProduct/$1';
$route['product/delete/(:any)']['GET'] = 'productController/deleteProduct/$1';

// Pagination
$route['pagination/index/(:num)']['GET'] = 'indexController/index/$1';
$route['pagination/index']['GET'] = 'indexController/index/';
$route['pagination/danh-muc/(:any)/(:any)/(:any)']['GET'] = 'indexController/category/$1/$2/$3';
$route['pagination/danh-muc/(:any)/(:any)']['GET'] = 'indexController/category/$1/$2';
$route['pagination/thuong-hieu/(:any)/(:any)/(:any)']['GET'] = 'indexController/brand/$1/$2/$3';
$route['pagination/thuong-hieu/(:any)/(:any)']['GET'] = 'indexController/brand/$1/$2';
$route['search-product/(:any)']['GET'] = 'indexController/search_product/$1';
// Order
$route['order_admin/listOrder']['GET'] = 'orderController/index';
$route['order_admin/update-order-status']['POST'] = 'orderController/update_order_status';
$route['order_admin/viewOrder/(:any)']['GET'] = 'orderController/viewOrder/$1';
$route['order_admin/deleteOrder/(:any)']['GET'] = 'orderController/deleteOrder/$1';
$route['order_admin/printOrder/(:any)']['GET'] = 'orderController/printOrder/$1';

// Mail
$route['send-mail'] = 'indexController/send_mail';

// Comment
$route['comment/send']['POST'] = 'indexController/comment_send';



