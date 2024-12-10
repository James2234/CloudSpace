<?php

use App\Admin\Controllers\SettingController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('setting', 'SettingController');
    $router->resource('user', 'UserController');
    $router->resource('publish_list', 'PublishListController');
    $router->resource('customer_management', 'CustomerManagementController');
    $router->resource('employee', 'EmployeeController');

});
