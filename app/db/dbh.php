<?php

require_once("config.php");
class DBh{
	private $servername;
	private $username;
	private $password;
	private $dbname;

	private $conn;
	private $result;
	public $sql;

	function __construct() 
	{
		$this->servername = DB_SERVER;
		$this->username = DB_USER;
		$this->password = DB_PASS;
		$this->dbname = DB_DATABASE;
		$this->connect();
	}

	public function connect()
	{
		$this->conn = new PDO("mysql:host=$this->servername; dbname=$this->dbname", "$this->username", "$this->password");

		return $this->conn;
	}

	public function getConn()
	{
		return $this->conn;
	}

	function query($sql)
	{
		if (!empty($sql)){
			$this->sql = $sql;
			$this->result = $this->conn->query($sql);
			return $this->result;
		}
		else{
			return false;
		}
	}

	function fetchRow($result="")
	{
		if (empty($result)){ 
			$result = $this->result; 
		}
		return $result->fetch_assoc();
	}

	function __destruct()
	{
		$this->conn = NULL;
	}
}
?>