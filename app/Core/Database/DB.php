<?php

namespace App\Core\Database;

use App\Core\Config\Config;
use PDO;

class DB
{
	

    /**
     * @var Singleton instance of DB
     */
    private static $db;
    private $host;
    private $db_name;
    private $user;
    private $password;
    private $port;
    
    /**
     * Returns the *Singleton* instance of this class.
     * @return Singleton The *DB* instance.
     */
    public static function getInstance( )
    {
    	$host = Config::getHost();
    	$db_name = Config::getDBName();
    	$user = Config::getUser();
    	$password = Config::getPassword();
    	$port = Config::getPort();

        if (null === static::$db) {
            static::$db = new static( $host, $db_name, $user, $password, $port );
        }
        
        return static::$db;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct( $host, $db_name, $user, $password, $port )
    {
    	$this->host    = $host;
    	$this->db_name = $db_name;
    	$this->user    = $user;
    	$this->password    = $password;
    	$this->port    = $port;

        var_dump($this->host);
    	try {

    		return new PDO( "mysql:host={$host};dbname={$db_name};port={$port}", $user , $password );

    	} catch (Exception $e) {

    	}
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     *
     * @return void
     */
    private function __wakeup()
    {
    }
}