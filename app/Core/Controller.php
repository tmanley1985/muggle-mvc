<?php namespace App\Core;

class Controller {
	
	/**
	 * Requires View file
	 * @param  string $view Filename
	 * @param  array  $data Optional input to be passed
	 * @return void
	 */
	public function view( $view, $data = [] )
	{
		require_once '../app/views/' . $view . '.php';
	}
}