<?php namespace WApi\CORS\Classes;

class WzoHandleCors {

	public $headers;

	public function __construct() {

		$this->headers = self::_prepareHeaders();
	}

	public function handle($request, \Closure $next) {

		if ($request->isMethod('OPTIONS')) {
			return response('', 200, $this->headers);
		}

		$response = $next($request);
		$response->headers->add($this->headers);

		return $response;
	}

	static public function handle_withHeader() {

		foreach (self::_prepareHeaders() as $k => $v) {
			header($k .': '.$v );
		}
	}

	static function _prepareHeaders() {

		$defaultHeaders = 'Authorization, Content-Type, Origin, Accept-Language, Content-Language';
		$defaultMethods = 'GET, HEAD, POST, PUT, DELETE, CONNECT, OPTIONS, TRACE, PATCH';

		return [
			'Access-Control-Allow-Origin'  => config('wapi.cors::origin', '*'),
			'Access-Control-Allow-Headers' => config('wapi.cors::headers', $defaultHeaders),
			'Access-Control-Allow-Methods' => config('wapi.cors::methods', $defaultMethods),
		];
	}
}
