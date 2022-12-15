<?php namespace SpaceApi\ApiException\Traits;

use Illuminate\Http\Response;
use October\Rain\Support\Facades\Event;
use October\Rain\ApiException\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait ApiResponse
{
    public static function apiErrorResponse($exception, $statusCode = null)
    {
        $message = $exception->getMessage();

        $exceptionStatusCode = 500;
        if (method_exists($exception, 'getStatusCode')) {
            $exceptionStatusCode = $exception->getStatusCode();
        }
        elseif (method_exists($exception, 'getCode')) {
            $exceptionStatusCode = $exception->getCode();
        }

        if ($exceptionStatusCode < 100 || $exceptionStatusCode > 511) {
            $exceptionStatusCode = 500;
        }

        if ($exception instanceof ModelNotFoundException) {
            $message = sprintf('%s not found',
                array_last(explode('\\', $exception->getModel()))
            );

            $exceptionStatusCode = 404;
        }
        elseif ($exception instanceof ValidationException) {
            $message = $exception->getErrors();
            $exceptionStatusCode = 422;
        }
        else {
            Event::fire('exception.report', [$exception]);
        }

        if ($statusCode) {
            $exceptionStatusCode = $statusCode;
        }

        $content = [
            'error'      => $message,
            'statusCode' => $exceptionStatusCode
        ];

        $response = Event::fire('space.api.error.response', [$content, $exception], true);
        if ($response) {
            if ($response instanceof Response) {
                return $response;
            }

            $content = $response;
        }

        return new Response($content, $content['statusCode'] ?? $exceptionStatusCode);
    }
}
