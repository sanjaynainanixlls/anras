<?php

//Only one connetion is allowed

class connection{
	private $_connection;

	private static $_instance;
        
	public static function getInstance()
	{
		if(!self::$_instance)
		{
			!self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function __construct()
	{
                //$host = config::getLocalhost();
                //$db = config::getDatabase();
                //$user = config::getUser();
                //$pass = config::getPassword();
                $host = "182.50.133.90";
                $db = 'anra';//"admito_test";
                $user = "sanjayxlls";
                $pass = "sanjay@2049";
		$this->_connection = new mysqli($host,$user,$pass,$db);
                mysqli_set_charset($this->_connection, 'utf8');
		if(mysqli_connect_error())
		{
			trigger_error("Failed to connect to the Database " . mysqli_connect_error());
		}
	}

	public function __clone()
	{

	}

	public function getConnection()
	{
		return $this->_connection;
	}
}

?>
