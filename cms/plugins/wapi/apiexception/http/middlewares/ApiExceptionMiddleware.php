<?php

namespace WApi\ApiException\Http\Middlewares;

use Closure;
use WApi\ApiException\Traits\ApiResponse;

class ApiExceptionMiddleware
{
    use ApiResponse;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $exception = $response->exception;
        if (!$exception && $response->original instanceof \Exception) {
            $exception = $response->original;
        }

        if ($exception) {
            return $this->apiErrorResponse($exception);
        }

        return $response;
    }
}
