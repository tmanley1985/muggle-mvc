<?php namespace App\Core\Http;

class Request
{
	protected $global_input;

	public function __construct(array $global_input)
	{

		if( !$this->global_input['hidden'] == '' ) { header( 'Location: index.php' ); }

		$this->global_input = $this->sanitize_input( $global_input );

	}

	protected function sanitize_input( array $request )
	{
		$request = array_map( function( $input ){

			$input = trim($input);

			return filter_var($input, FILTER_SANITIZE_STRING );	
		}
		, $request );

		return $request;
	}

	public function getInput()
	{
		return $request_data = $this->global_input;
	}
}