<?php 

//echo"<pre>";print_r($_POST);exit;


session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "placement_portal";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$sql = 'SELECT * FROM `users` WHERE `email`="'.$_POST["login_username"].'" AND `password`="'.$_POST["login_password"].'"';
$result = mysqli_query($conn, $sql); 

//echo"<pre>";print_r($result);exit; 

/*if(mysqli_num_rows($result) == 1){
	//$_SESSION['dsuccess'] = 'Please check your Username & Password';
	$row = mysqli_fetch_assoc($result);
	$_SESSION['user_id'] = $row['user_id'];
	$_SESSION['username'] = $row['username'];
	$_SESSION['email'] = $row['email'];
	$_SESSION['role'] = $row['role'];
	$_SESSION['is_logged_in'] = true;
	header("location:dashboard.php");
	exit;
}else{
	$_SESSION['dsuccess'] = 'Please check your Username & Password';
	header("location:index.php");
	exit;
}*/

//$row = mysqli_fetch_assoc($result);        

//echo "<pre>";print_r($row);exit;


?>