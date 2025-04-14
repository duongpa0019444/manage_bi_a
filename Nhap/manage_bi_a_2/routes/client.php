<?php
$router->get('/', 'Client\HomeController@index');

$router->post('/signUp', 'Client\HomeController@signUp');//Đăng ký

$router->post('/signIn', 'Client\HomeController@signIn');

$router->get('/product/:id', 'Client\ProductController@detail');