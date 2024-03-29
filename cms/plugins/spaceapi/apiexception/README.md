# API

## Description
Implement API standard to OCMS

## Installation
1. Copy files to `plugins/spaceapi/apiexception` directory

2. Add ApiExceptionMiddleware to your api routes

## Usage
- Usage of ApiExceptionMiddleware
  ```php
  Route::group(['prefix' => 'api', 'middleware' => [ApiExceptionMiddleware::class]], function () {
      ...
  });

  Example of error response:
  {
    "error": "Order not found",
    "statusCode": 404
  }
  ```
- Usage of ApiResponse trait
  ```php
  class OrdersController extends Controller
  {
      use ApiResponse;

      ...
  }

  Example of success response:
  {
      "data": [],
      "statusCode": 200
  }
  ```
