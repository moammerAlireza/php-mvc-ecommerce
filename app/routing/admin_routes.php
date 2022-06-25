<?php


//for admin routes
$router->map('GET', '/admin', 'App\controllers\admin\DashboardController@show', 'admin_dashboard');
$router->map('POST', '/admin', 'App\controllers\admin\DashboardController@get', 'admin_form');

// product management
$router->map('GET', '/admin/product/categories',
 'App\controllers\admin\ProductCategoryController@show', 'product_category');

 $router->map('POST', '/admin/product/categories',
 'App\controllers\admin\ProductCategoryController@store', 'create_product_category');

$router->map('POST', '/admin/product/categories/[i:id]/edit',
 'App\controllers\admin\ProductCategoryController@edit', 'edit_product_category');

 $router->map('POST', '/admin/product/categories/[i:id]/delete',
 'App\controllers\admin\ProductCategoryController@delete', 'delete_product_category');

 //Subcategory
 $router->map('POST', '/admin/product/subcategory/create',
 'App\controllers\admin\SubCategoryController@store', 'create_subcategory');

 $router->map('POST', '/admin/product/subcategory/[i:id]/edit',
 'App\controllers\admin\SubCategoryController@edit', 'edit_subategory');

 $router->map('POST', '/admin/product/subcategory/[i:id]/delete',
 'App\controllers\admin\SubCategoryController@delete', 'delete_subcategory');