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
if(isset($_FILES['user_logo'])){
      $errors= array();
      $file_name = $_FILES['user_logo']['name'];
      $file_size =$_FILES['user_logo']['size'];
      $file_tmp =$_FILES['user_logo']['tmp_name'];
      $file_type=$_FILES['user_logo']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['user_logo']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 5097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
      	$file_name = "uploads/".$file_name;
         move_uploaded_file($file_tmp,$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }

if(isset($_POST['submit_resume_form'])){

	$user_id = $_SESSION['user_id'];

	$first_name = addslashes($_POST['first_name']);
	$last_name = addslashes($_POST['last_name']);
	$email = addslashes($_POST['email']);
	$phone = addslashes($_POST['phone']);
	$user_logo = $file_name;
	$gender = addslashes($_POST['gender']);
	$birthdate = addslashes($_POST['birthdate']);
	$mother_tongue = addslashes($_POST['mother_tongue']);
	$languages_known = addslashes($_POST['languages_known']);
	$nationality = addslashes($_POST['nationality']);
	$marital_status = addslashes($_POST['marital_status']);
	$profile_photo = '';//addslashes($_POST['profile_photo']);
	$address_1 = addslashes($_POST['address_1']);
	$state = addslashes($_POST['state']);
	$address_2 = addslashes($_POST['address_2']);
	$postcode = addslashes($_POST['postcode']);
	$city = addslashes($_POST['city']);
	$country = addslashes($_POST['country']);
	$group_department = addslashes($_POST['group_department']);
	$percentage = addslashes($_POST['percentage']);
	$academic_details = ($_POST['academic_details'])?serialize($_POST['academic_details']):'';//SERIALIZE
	$project_details = ($_POST['project_details'])?serialize($_POST['project_details']):'';//SERIALIZE
	/*$project_title = addslashes($_POST['project_title']);
	$role_play = addslashes($_POST['role_play']);
	$team_size = addslashes($_POST['team_size']);
	$project_description = addslashes($_POST['project_description']);*/
	$technical_skills = ($_POST['technical_skills'])?serialize($_POST['technical_skills']):'';
	$key_skills = ($_POST['key_skills'])?serialize($_POST['key_skills']):'';
	$personality_traits = ($_POST['personality_traits'])?serialize($_POST['personality_traits']):'';
	$achivements = addslashes($_POST['achivements']);
	$workshops_seminars = addslashes($_POST['workshops_seminars']);

	$created_at = date('Y-m-d H:i:s');

	$sql = "INSERT INTO `resumes` (`user_logo`,`user_id`,`first_name`,`last_name`,`email`,`phone`,`gender`,`birthdate`,`mother_tongue`,`languages_known`,`nationality`,`marital_status`,`profile_photo`,`address_1`,`state`,`address_2`,`postcode`,`city`,`country`,`academic_details`,`project_details`,`technical_skills`,`key_skills`,`personality_traits`,`achivements`,`group_department`,`percentage`,`workshops_seminars`,`created_by`,`created_at`) 
	VALUES ('$user_logo','$user_id','$first_name','$last_name','$email','$phone','$gender','$birthdate','$mother_tongue','$languages_known','$nationality','$marital_status','$profile_photo','$address_1','$state','$address_2','$postcode','$city','$country','$academic_details','$project_details','$technical_skills','$key_skills','$personality_traits','$achivements','$group_department','$percentage','$workshops_seminars','$user_id','$created_at')";

	if (mysqli_query($conn, $sql)) {
  		echo "Resume has been Saved Successfully!";
  		header("location:manage_resumes.php");
  		exit;
	} else {
  		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


	//echo"<pre>";print_r($_SESSION);exit;
	echo"<pre>";print_r($_POST);exit;
}

?>