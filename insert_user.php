<?php 
ob_start();
//error_reporting(1);
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "placement_portal";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['register'])){

	$username = addslashes($_POST['username']);
	$email = addslashes($_POST['email']);
	$password = addslashes($_POST['password']);

	$sql = "INSERT INTO `users` (`username`,`email`,`password`,`role`) 
	VALUES ('$username','$email','$password','1')";

	if (mysqli_query($conn, $sql)) {
  		echo "User has been Registered Successfully!";
  		header("location:index.php");
  		exit;
	} else {
  		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


	//echo"<pre>";print_r($_SESSION);exit;
	//echo"<pre>";print_r($_POST);exit;
}

?>