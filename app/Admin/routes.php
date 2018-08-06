<?php

use App\Admin\Facades\Admin;
use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->get('media', 'MediaController@index')->name('media-index');
    $router->get('media/download', 'MediaController@download')->name('media-download');
    $router->delete('media/delete', 'MediaController@delete')->name('media-delete');
    $router->put('media/move', 'MediaController@move')->name('media-move');
    $router->post('media/upload', 'MediaController@upload')->name('media-upload');
    $router->post('media/folder', 'MediaController@newFolder')->name('media-new-folder');
    $router->resource('config', 'ConfigController');

});

Admin::extend('media-manager', 'App\Admin\Controllers\MediaManager');
