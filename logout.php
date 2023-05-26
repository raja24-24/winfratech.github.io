<?php 
	ob_start();
	session_start();
	if(isset($_SESSION['tdes_email']) && isset($_SESSION['tdes_id']))
	{
		
		unset($_SESSION['tdes_email']);
		unset($_SESSION['tdes_id']);
	}
	session_destroy();
	$_SESSION = array();
	header("location:index.php");
	
	
?>
