<?php

$router= new AltoRouter;

$router->map('GET', '/', 'App\controllers\IndexController@show', 'home');
