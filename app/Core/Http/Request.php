<?php namespace App\Core\Http;

class Request
{
	protected $global_input;
	/**
	 * Creates Instance of the Request
	 * @param array $global_input POST Superglobal
	 */
	public function __construct(array $global_input)
	{

		if( !$this->global_input['hidden'] == '' ) { header( 'Location: index.php' ); }

		$this->global_input = $this->sanitize_input( $global_input );

	}
	/**
	 * Sanitizes Request
	 * @param  array  $request Raw Request
	 * @return array $request Sanitized Request
	 */
	protected function sanitize_input( array $request )
	{
		// Maps filter function to each member in the request
		
		$request = array_map( function( $input ){

			$input = trim($input);

			return filter_var($input, FILTER_SANITIZE_STRING );	
		}
		, $request );

		return $request;
	}
	/**
	 * Public Getter for Request
	 * @return array $request
	 */
	public function getInput()
	{
		return $request_data = $this->global_input;
	}
}