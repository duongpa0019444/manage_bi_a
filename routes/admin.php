<?php

use App\Middleware\AuthMiddleware;

(new AuthMiddleware)::checkLogin();
$router->get('/admin', 'Admin\DashboardController@dashboard');

//xử lý phiên
$router->get('/admin/order/:id/setup', 'Admin\SetupController@setup');
$router->post('/admin/order/:id/setup', 'Admin\SetupController@setup');

// $router->post('/admin/order/setSession', 'Admin\SetupController@setSession');
$router->get('/admin/order/:id/setSession', 'Admin\SetupController@setSession');

$router->get('/admin/logout', 'Admin\DashboardController@logout');

$router->post('/admin/order/addproduct', 'Admin\SetupController@addproduct');
$router->post('/admin/order/deleteProduct', 'Admin\SetupController@deleteProduct');
$router->post('/admin/order/delete', 'Admin\SetupController@delete');


//Quản lý sản phẩm
$router->get('/admin/product/list', 'Admin\ProductController@list');
$router->get('/admin/product/create', 'Admin\ProductController@create');
$router->post('/admin/product/store', 'Admin\ProductController@store');
$router->get('/admin/product/edit/:id', 'Admin\ProductController@edit');
$router->post('/admin/product/update/:id', 'Admin\ProductController@update');
$router->get('/admin/product/delete/:id', 'Admin\ProductController@delete');


//Quản lý danh mục
$router->get('/admin/category/list', 'Admin\CategoryController@list');
$router->get('/admin/category/create', 'Admin\CategoryController@create');
$router->post('/admin/category/store', 'Admin\CategoryController@store');
$router->get('/admin/category/edit/:id', 'Admin\CategoryController@edit');
$router->post('/admin/category/update/:id', 'Admin\CategoryController@update');
$router->get('/admin/category/delete/:id', 'Admin\CategoryController@delete');


//Quản lý đơn hàng
$router->get('/admin/order/list', 'Admin\OrderController@list');
$router->get('/admin/order/:id/detail', 'Admin\OrderController@detail');



// Quản lý user
$router->get('/admin/user/list', 'Admin\UserController@list');
$router->get('/admin/user/create', 'Admin\UserController@create');
$router->post('/admin/user/create', 'Admin\UserController@create'); // Đảm bảo POST cho việc thêm user
$router->get('/admin/user/edit', 'Admin\UserController@edit');
$router->post('/admin/user/edit', 'Admin\UserController@edit'); // Thêm POST để xử lý sửa user
$router->get('/admin/user/delete', 'Admin\UserController@delete');



//Thống kê
$router->get('/admin/statistical', 'Admin\DashboardController@statistical');

// routes/web.php (giả định)
// $router->post('/admin/get-order-items', 'App\Controllers\Admin\setupController@getOrderItems');
$router->post('/admin/get-order-items', 'Admin\SetupController@getOrderItems');
$router->post('/admin/save-payment', 'Admin\SetupController@savePayment');


//Thống kê
$router->get('/admin/statistical', 'Admin\DashboardController@statistical');