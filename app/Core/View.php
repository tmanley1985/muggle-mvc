<?php namespace App\Core;

class View {
	
	protected $view;

	protected $params;

	public function __construct(string $view, $params = [])
	{
		$this->view = $view;

		isset( $params ) ? $this->params = $params : $this->params = [];

		return $this->render( $this->view, $params );


	}

	public function render($view, $params )
	{
		
	}
}