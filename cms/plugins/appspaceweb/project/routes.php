<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use SpaceApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;

Route::group([
    'prefix'      => 'api/v1',
    'namespace'  => 'AppSpaceWeb\Project\Http\Controllers',
    'middleware' => [
        ApiExceptionMiddleware::class,
        'api'
    ]
], function (Router $router) {
    $router
        ->get('projects', 'ProjectsController@index');
});
