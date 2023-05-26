<?php
require_once("control.php");
if(!isset($_SESSION['tdes_email']))
{
	header("location:index.php");
	exit();	
} 
else
{
	$adminid = $_SESSION['tdes_id'];
	$permisn = $obj->getpermission($con,$select, $power_db, $cond,$admid,$adminid);
	//echo '<pre>';print_r($permisn);
}
?>