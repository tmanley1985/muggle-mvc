<?php

class App {
	
	protected $controller = 'home';
	
	protected $method = 'index';

	protected $params = [];

	public function __construct()
	{
		$url = $this->parse_url();
	}

	protected function parse_url()
	{
		if( $_GET['url']) {

			$trimmed_url = rtrim( $_GET['url'], '/' );

			$sanitized_url = filter_var( $trimmed_url, FILTER_SANITIZE_URL );

			return $url_parameters = explode( '/', $sanitized_url );

		}
	}
}	
