<?php namespace App\Controllers;

use App\Core\Controller;

class Home extends Controller {
	
	public function index()
	{
		$this->view('home', ['name' => 'Thomas'] );
	}

	public function hello( $name ) 
	{
		echo 'Hello ' . $name;
	}
}