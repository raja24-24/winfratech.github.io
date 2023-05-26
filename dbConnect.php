<?php 
include("connection.php");
$obj=new connect();
$con=$obj->conn();

$sql = "SELECT * FROM company_profile WHERE status = 'Y'";
$result = $con->query($sql);
$row = $result->fetch_object();
$site_url = $row->comp_url;
$perpage = $row->user_pagination;
$admin_email = $row->comp_email;
$site_name = $row->comp_name;
$site_logo = $row->comp_logo;

$sms_url = $row->sms_url; 
$sms_username = $row->sms_username; 
$sms_password = $row->sms_password; 
$sms_sender = $row->sms_sender;

define("SITESETTING","company_profile");
define("ADMIN_MASTER","myadmin");
define("CONTENT_MASTER","content_master");
define("SMS_MASTER","sms_master");
define("EMAIL_MASTER","email_master");
define("USER_MASTER","student");
define("MENU","menu");
//define("COUNTRY","countries");
define("STATE","states");
define("DISTRICT","districts");
define("EMAILTEMPLATE","email_template");

define("SITEURL",$site_url);
define("PERPAGE",$perpage);
define("ADMINEMAIL",$admin_email);
define("SITENAME",$site_name);
define("LOGO",$site_logo);

define("SMSURL",$sms_url);
define("SMSUSERNAME",$sms_username);
define("SMSPASSWORD",$sms_password);
define("SMSSENDER",$sms_sender);
?>