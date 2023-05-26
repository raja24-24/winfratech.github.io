<?php
ob_start();
error_reporting(1);
session_start();
class connect
{
	public function conn()
	{
		
		
		if($_SERVER['HTTP_HOST'] == "localhost" )
		{
			$hostname = "localhost";
			$username = "";
			$password = "";
			$database = "";
			$connect = new mysqli($hostname, $username, $password, $database);
			return $connect;
		}
		else
		{
			$hostname = "localhost";
			$username = "";
			$password = "";
			$database = "";
			$connect = new mysqli($hostname, $username, $password, $database);
			return $connect;	
		}
	}
}

?>