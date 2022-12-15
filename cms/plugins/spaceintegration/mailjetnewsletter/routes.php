<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use SpaceApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;
use SpaceIntegration\MailJetNewsletter\Http\Controllers\NewsletterController;

Route::group([
    'prefix'      => 'api/v1',
    'middleware' => [
        ApiExceptionMiddleware::class,
        'api'
    ]
], function (Router $router) {
    $router
        ->post('newsletter/subscribe', [NewsletterController::class, 'store']);
    $router
        ->post('newsletter/unsubscribe', [NewsletterController::class, 'destroy']);
});
