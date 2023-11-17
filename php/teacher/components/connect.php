<?php

class Database_connection
{
	function connect()
	{
		$connect = new PDO("mysql:host=localhost; dbname=swe", "root", "");

		return $connect;
	}


	/**
 	* Generates a unique ID consisting of alphanumeric characters.
 	*
 	* @return string The generated unique ID.
 	*/
	public function unique_id()
	{
	   $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	   $rand = array();
	   $length = strlen($str) - 1;
	   for ($i = 0; $i < 20; $i++) {
		  $n = mt_rand(0, $length);
		   $rand[] = $str[$n];
	   }
	   return implode($rand);
	}
}
?>



