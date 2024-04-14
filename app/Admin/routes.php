<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\ProductController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('demo/users', UserController::class);
    $router->resource('products', ProductController::class);
    $router->resource('customer', CustomerController::class);
    $router->resource('type_products', TypeProductController::class);


});


Route::resource('products', ProductController::class);