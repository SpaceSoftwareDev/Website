<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use WApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;
use AppSpaceWeb\Newsletter\Http\Controllers\NewsletterController;

Route::group([
    'prefix'      => 'api/v1',
    'middleware' => [
        ApiExceptionMiddleware::class,
        'api'
    ]
], function (Router $router) {
    $router
        ->post('newsletter/email', [NewsletterController::class, 'store']);
});
