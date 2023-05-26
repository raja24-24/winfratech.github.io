<?php
include("dbConnect.php");

$user= base64_encode("email = ");
$and= base64_encode(" AND ");
$pass= base64_encode(" password=");
$cond= base64_encode(" WHERE ");
$select= base64_encode("SELECT * FROM ");
$sel_pass= base64_encode("SELECT password FROM ");
$up= base64_encode("UPDATE ");
$set= base64_encode(" SET ");
$status = base64_encode(" status =");
$inst= base64_encode("INSERT INTO ");
$values= base64_encode(") VALUES ("); 
$del_db= base64_encode("DELETE FROM ");
$join = base64_encode(" JOIN ");
$on = base64_encode(" ON ");
$order = base64_encode(" ORDER BY ");
$betn = base64_encode(" BETWEEN ");
$limit = base64_encode(" LIMIT ");

$admin_db= base64_encode("myadmin");
$admin_id= " id=";
$nadmin_id = " id !=";
$role = " userrole >";


$company_profile_db= base64_encode("company_profile ");
$ads_db= base64_encode("ads");
$slider_db= base64_encode("slider");
$menu_db= base64_encode("menu");
$sid=" sid=";
$gid=" gid=";
$cid=" cid=";
$d_id=" d_id=";
$pid=" pid=";
$mid=" mid=";
$status=" status=";

$user_db= base64_encode("users");
$uid=" id=";

$content_db= base64_encode("content_master");
$conid=" content_id=";

$sms_db= base64_encode("sms_master");
$smsid=" smsid=";

$game_db= base64_encode("games");
$gameid=" gameid=";

$result_db= base64_encode("results");
$id=" id=";

$role_db= base64_encode("userrole");
$id=" id=";

$power_db= base64_encode("permission");
$admid=" adminid=";

$point_db= base64_encode("points");
$pointid=" id=";

$bid_db= base64_encode("bid");
$bid=" id=";

$win_db= base64_encode("win");
$id=" id=";

$reward_db= base64_encode("reward");
$id=" id=";

$notification_db= base64_encode("notifications");
$id=" id=";
?>