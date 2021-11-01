<?php

use Illuminate\Routing\Router;/*
use UsersController;
use DemoController;
use MovieController;*/
Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
$router->resource('demo/users', UsersController::class);

$router->resource('movies', MovieController::class);
$router->resource('categories', DemoController::class);

});
