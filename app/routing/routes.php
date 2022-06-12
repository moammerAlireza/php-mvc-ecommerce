<?php

$router= new AltoRouter;

$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');

//for admin routes
$router->map('GET', '/admin', 'App\controllers\admin\DashboardController@show', 'admin_dashboard');

