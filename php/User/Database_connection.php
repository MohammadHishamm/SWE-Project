<?php

//Database_connection.php

class Database_connection1
{
	function connect()
	{
		$connect = new PDO("mysql:host=localhost; dbname=swe", "root", "");

		return $connect;
	}
}

?>