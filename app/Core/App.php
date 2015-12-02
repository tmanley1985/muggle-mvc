<?php namespace App\Core;

use App\Core\Request\Request;

class App {
	
	protected $controller = 'home';
	
	protected $method = 'index';

	protected $params = [];

	protected $request = [];

	/**
	 * [__construct Parses url ]
	 *
	 * @return   [<description>]
	 */
	
	public function __construct( Request $request )
	{
		$this->request = $request;

		$url = $this->parse_url();

		if( file_exists( '../app/controllers/' . $url[0] . '.php')) {
			$this->controller = $url[0];
			unset($url[0]);
		}

		// require_once '../app/controllers/' . $this->controller . '.php';
		$controller = 'App\Controllers\\' . $this->controller;
		$this->controller = new $controller;

		if( isset( $url[1] ) ) {

			$this->method = $url[1];
			unset($url[1]);

		}
		
		$this->params = $url ? array_values( $url ) : [];

		call_user_func_array([$this->controller, $this->method ], $this->params );
	}

	protected function parse_url()
	{
		if( $_GET['url']) {

			$trimmed_url = rtrim( $_GET['url'], '/' );

			$sanitized_url = filter_var( $trimmed_url, FILTER_SANITIZE_URL );

			return $url_parameters = explode( '/', $sanitized_url );

		}
	}

	public function get_request()
	{
		return $this->request->getInput();
	}
}	
