<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use SpaceApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;

Route::group([
    'prefix'      => 'api/v1',
    'namespace'  => 'SpaceNotification\MailJetNewsletter\Http\Controllers',
    'middleware' => [
        ApiExceptionMiddleware::class,
        'api'
    ]
], function (Router $router) {
    $router
        ->post('newsletter/subscribe', 'NewsletterController@store');
    $router
        ->post('newsletter/unsubscribe', 'NewsletterController@destroy');
});
