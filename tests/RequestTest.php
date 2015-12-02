<?php

use \App\Core\Request\Request;

class RequestTest extends PHPUnit_Framework_TestCase
{
	public function testItReturnsRequest()
	{
		$_POST['name'] = 'Thomas';
		$request = new Request( $_POST );
		$input = $request->getInput();
		$this->assertEquals('Thomas', $input['name']);
	}

	public function testItReturnsSanitizedRequest()
	{
		$_POST['name'] = '<p>Thomas</p>';
		$request = new Request( $_POST );
		$input = $request->getInput();
		$this->assertEquals('Thomas', $input['name']);
	}
}