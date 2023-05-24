<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use SpaceApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;

Route::group([
    'prefix'      => 'api/v1',
    'namespace'  => 'SpacePub\ContactForm\Http\Controllers',
    'middleware' => [
        ApiExceptionMiddleware::class,
        'api'
    ]
], function (Router $router) {
    $router
        ->post('contact', 'ContactFormsController');
});
