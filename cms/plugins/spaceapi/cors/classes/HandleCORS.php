<?php namespace SpaceApi\CORS\Classes;

class HandleCORS {

	public $headers;

	public function __construct()
    {
		$this->headers = self::_prepareHeaders();
	}

	public function handle($request, \Closure $next)
    {
		if ($request->isMethod('OPTIONS')) {
			return response('', 200, $this->headers);
		}

		$response = $next($request);
		$response->headers->add($this->headers);

		return $response;
	}

	static public function handle_withHeader()
    {
		foreach (self::_prepareHeaders() as $k => $v) {
			header($k .': '.$v );
		}
	}

	static function _prepareHeaders()
    {
		$defaultHeaders = 'Authorization, Content-Type, Origin, Accept-Language, Content-Language';
		$defaultMethods = 'GET, HEAD, POST, PUT, DELETE, CONNECT, OPTIONS, TRACE, PATCH';

		return [
			'Access-Control-Allow-Origin'  => config('spaceapi.cors::origin', '*'),
			'Access-Control-Allow-Headers' => config('spaceapi.cors::headers', $defaultHeaders),
			'Access-Control-Allow-Methods' => config('spaceapi.cors::methods', $defaultMethods)
		];
	}
}
