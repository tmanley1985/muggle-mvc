<?php

namespace App\Core;

use App\Core\BaseModel;

use App\Core\Database\DB;

class Model extends BaseModel
{
	/**
	 * DB Instance
	 * @var $db
	 */
	protected $db;
	/**
	 * Creates Instance of Model
	 *
	 * @return  App\Core\Database\DB
	 */
	public function __construct()
	{
		return DB::getInstance();
	}
}