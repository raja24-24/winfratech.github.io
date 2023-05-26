<?php
if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
}
//exit;
//require_once ("model.php");

$obj = new model();
$curdate = date('Y-m-d');
$curdate = "'$curdate'";

$total_customer = $obj->total_customer($con,$select,$user_db);
$active_customer = $obj->total_active_customer($con,$select,$user_db, $cond, $status, "'Y'");
$total_game = $obj->total_game($con,$select,$game_db);
$user_role = $obj->user_role($con,$select,$role_db,$order,'id ASC');

$user_data1 = $obj->user_data1($con,$select,$user_db,$order,'id DESC');

if (isset($_REQUEST['login_admin']))
{
	$email = $_REQUEST['login_username'];
	$password = $_REQUEST['login_password'];
	$e = $email;
	$p = $password;
	$statval ="'Y'";
	$obj->Adminlogin($con, $e, $p, $select, $admin_db, $cond, $user, $pass, $and, $status, $statval);
	if($_SESSION['userrole'] == 1)
		header("location:dashboard.php");
	else
		header("location:dashboard.php");
	exit;
}

$site_data = $obj->site_setting($con, $select, $company_profile_db);

if(isset($_REQUEST['change_pass']))
{
	$old_pass=$_REQUEST['old_pass'];
	$new_pass=$_REQUEST['new_pass'];
	$re_pass=$_REQUEST['re_pass'];
	$cpass=$obj->Changepass($con,$sel_pass,$admin_db,$cond,$admin_id,$old_pass,$new_pass,$re_pass,$up,$set,$pass);
}

if (isset($_REQUEST['site_setting']))
{
	$comp_name 			= $_REQUEST['comp_name'];
	$comp_url 			= $_REQUEST['comp_url'];
	$app_url 			= $_REQUEST['app_url'];
	$comp_whatsapp 		= $_REQUEST['comp_whatsapp'];
	$comp_paytm 		= $_REQUEST['comp_paytm'];
	$comp_phonePe 		= $_REQUEST['comp_phonePe'];
	$phonePe_service 	= $_REQUEST['phonePe_service'];
	$comp_googlePe 		= $_REQUEST['comp_googlePe'];
	$googlePe_service 	= $_REQUEST['googlePe_service'];
	$landing_url 		= $_REQUEST['landing_url'];
	$app_button 		= $_REQUEST['app_button'];
	$youtube_video 		= $_REQUEST['youtube_video'];
	$upiID 				= $_REQUEST['upiID'];
	$appversion 		= $_REQUEST['appversion'];
	$comp_em 			= $_REQUEST['comp_email'];
	$withdrawl 			= $_REQUEST['withdrawl'];
	$deposit    		= $_REQUEST['deposit'];
	$minBidAmount 		= $_REQUEST['minBidAmount'];
	$haruplimit 		= $_REQUEST['haruplimit'];
	$withdraw_time 		= $_REQUEST['withdraw_time'];
	$referral 			= $_REQUEST['referral'];
	
	$jodiboxes 			= $_REQUEST['jodiboxes'];
	$andarboxes 		= $_REQUEST['andarboxes'];
	$baharboxes 		= $_REQUEST['baharboxes'];
	
	$rewardlimit1 		= $_REQUEST['rewardlimit1'];
	$rewardlimit2 		= $_REQUEST['rewardlimit2'];
	$rewardlimitpercent1 = $_REQUEST['rewardlimitpercent1'];
	$rewardlimitpercent2 = $_REQUEST['rewardlimitpercent2'];
	
	$sms_url 			= $_REQUEST['sms_url'];
	$sms_username 		= $_REQUEST['sms_username'];
	$sms_password 		= $_REQUEST['sms_password'];
	$sms_sender 		= $_REQUEST['sms_sender'];
	
	$data = array(
		"comp_name" 		=> $comp_name,
		"comp_url" 			=> $comp_url,
		"app_url" 			=> $app_url,
		"comp_whatsapp" 	=> $comp_whatsapp,
		"comp_paytm" 		=> $comp_paytm,
		"comp_phonePe" 		=> $comp_phonePe,
		"phonepe_service" 	=> $phonePe_service,
		"comp_googlePe" 	=> $comp_googlePe,
		"googlepe_service" 	=> $googlePe_service,
		"landing_url" 		=> $landing_url,
		"app_button" 		=> $app_button,
		"youtube_video" 	=> $youtube_video,
		"comp_email" 		=> $comp_em,
		"upiID" 			=> $upiID,
		"appversion"     	=> $appversion,
		"withdrawl" 		=> $withdrawl,
		"minAddAmount" 	 	=> $deposit,
		"minBidAmount"   	=> $minBidAmount,
		"haruplimit"    	=> $haruplimit,
		"withdraw_time"		=> $withdraw_time,
		"referral"	 		=> $referral,
		
		"jodiboxes"			=> $jodiboxes,
		"andarboxes"		=> $andarboxes,
		"baharboxes" 		=> $baharboxes,
		
		"rewardlimit1"		=> $rewardlimit1,
		"rewardlimit2"		=> $rewardlimit2,
		"rewardlimitpercent1" => $rewardlimitpercent1,
		"rewardlimitpercent2" => $rewardlimitpercent2,
		"sms_url" 			=> $sms_url,
		"sms_username" 		=> $sms_username,
		"sms_password"		=> $sms_password,
		"sms_sender" 		=> $sms_sender
	);
	//echo '<pre>';print_r($data); die;
	$site_set = $obj->update_site($con, $up, $company_profile_db,$set, $data);
}





/* notification starts */
if(isset($_REQUEST['add_notification']))
{
	$title 				= $_REQUEST['title'];
	$noti_content	 	= $_REQUEST['noti_content'];
	$userid			 	= $_REQUEST['userid'];
	$status 			= $_REQUEST['status'];
	$date 				= date('Y-m-d');
	$time 				= date('H:i:s');
	
	$data = array("title"=>$title,"content"=>$noti_content,"userid"=>$userid,"date"=>$date,"time"=>$time,"status"=>$status);
	$obj->add_notification($con,$inst,$notification_db,$values,$data);
}

$notification_data = $obj->notification_data($con,$select,$notification_db,$cond);
if(isset($_REQUEST['notificationid']))
{
	$p_id=base64_decode($_REQUEST['notificationid']);
	$edit=$obj->Editnotification($con,$select,$notification_db,$cond,$id,$p_id);
}
if(isset($_REQUEST['up_notification']))
{
	$p_up = base64_decode($_REQUEST['notificationid']);
	$title 				= $_REQUEST['title'];
	$noti_content	 	= $_REQUEST['noti_content'];
	$userid			 	= $_REQUEST['userid'];
	$status 			= $_REQUEST['status'];
	$date 				= date('Y-m-d');
	$time 				= date('H:i:s');
	
	$data = array("title"=>$title,"content"=>$noti_content,"userid"=>$userid,"date"=>$date,"time"=>$time,"status"=>$status);
	
	$obj->upnotification($con,$up,$notification_db,$set,$cond,$id,$p_up,$data);	
}
if(isset($_REQUEST['notification_did']))
{
	$pro_did=base64_decode($_REQUEST['notification_did']);
    $obj->Delnotification($con,$del_db,$notification_db,$cond,$id,$pro_did);
}
/* notification ends */








?>