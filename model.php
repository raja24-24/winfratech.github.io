<?php
include ("query.php");
class model
{
	public function total_customer($con,$select,$user_db)
	{
		$select_data = base64_decode($select).base64_decode($user_db);
		$result_data = $con->query($select_data);
		$result_row = $result_data->fetch_object();
		$total_cust = $result_data->num_rows;
		return $total_cust;
	}
	public function user_data1($con,$select,$user_db,$order,$desc)
	{
		$select_data = base64_decode($select) . base64_decode($user_db). base64_decode($order).$desc;;
		$result_data = $con->query($select_data);
		while ($result_row = $result_data->fetch_object())
		{
		$r[] = $result_row;
		}

		return $r;
	}
	public function total_active_customer($con,$select,$user_db, $cond, $status, $statval)
	{
		$select_data = base64_decode($select).base64_decode($user_db).base64_decode($cond).$status.$statval;
		$result_data = $con->query($select_data);
		$result_row = $result_data->fetch_object();
		$active_customer = $result_data->num_rows;
		return $active_customer;
	}
	
	public function total_game($con,$select,$game_db)
	{
		$select_data = base64_decode($select).base64_decode($game_db);
		$result_data = $con->query($select_data);
		$result_row = $result_data->fetch_object();
		$total_game = $result_data->num_rows;
		return $total_game;
	}
	
	public function getpermission($con,$select,$power_db, $cond,$admid,$val)
	{
		$select_data = base64_decode($select).base64_decode($power_db).base64_decode($cond).$admid.$val;
		$result_data = $con->query($select_data);
		$no_row = $result_data->num_rows;
		if ($no_row == 1)
		{
			$result_row = $result_data->fetch_object();
			return $result_row;
		}
	}
	
	public function Adminlogin($con, $e, $p, $select, $admin_db, $cond, $user, $pass, $and, $status, $statval)
	{
		//$select_data = base64_decode($select).base64_decode($admin_db).base64_decode($cond).base64_decode($user).$e . base64_decode($and).base64_decode($pass).$p;
		echo $select_data = 'SELECT id,email,userrole,name,mobile,status FROM '.base64_decode($admin_db).base64_decode($cond).base64_decode($user).'?'. base64_decode($and).base64_decode($pass).'?';
		$stmt = $con->prepare($select_data);
		$email = $e;
		$password = $p;
		$stmt->bind_param("ss", $email, $password);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($col1, $col2, $col3, $col4, $col5,$col6);
		$no_row = $stmt->num_rows;
		if ($no_row == 1)
		{
			$rs = $stmt->fetch();
			if($col6=='Y' && $col3=='1')
			{
				$_SESSION['tdes_id'] = $col1;
				$_SESSION['tdes_email'] = $col2;
				$_SESSION['userrole']  = $col3;
				$_SESSION['name']  = $col4;
				$_SESSION['mobile']  = $col5;
				//if($result_row->site1 != '') $_SESSION['site'] = $result_row->site1; else $_SESSION['site'] = $result_row->site2;
			}
			else
			{
				$_SESSION['xsuccess'] = 'You are not authorized.Contact administrator';
				header("location:index.php?xsuccess");
				exit;
			}
		}
		else
		{
			$_SESSION['dsuccess'] = 'Please check your Username & Password';
			header("location:index.php");
			exit;
		}
	}
	

	
	/* settings starts */
	public function site_setting($con, $select, $company_profile_db)
	{
		$select_data = base64_decode($select) . base64_decode($company_profile_db);
		$result_data = $con->query($select_data);
		while ($result_row = $result_data->fetch_object())
		{
			$r[] = $result_row;
		}
	
		return $r;
	}

	public function update_site($con, $up, $company_profile_db,$set, $data)
	{
		foreach($data as $key => $value)
		{
		$query.= $a . $key . "='" . $value . "'";
		$a = ",";
		}
	
		$upsite = base64_decode($up).base64_decode($company_profile_db).base64_decode($set).$query;
		$result_up = $con->query($upsite);
		echo "<script>window.location='company_profile.php?usuccess';</script>";
	}
	/* settings ends */
	
	/* menu starts */
	

	/*user starts */
	public function add_user($con,$inst,$user_db,$values,$data)
	{
		$column=implode(",",array_keys($data));
		$value=implode("','",array_values($data));
		$add_toplink=base64_decode($inst).base64_decode($user_db)."(".$column.base64_decode($values)."'".$value."'".")";
		$result_toplink=$con->query($add_toplink);
		echo "<script>window.location='manage_user.php?asuccess'</script>";
		exit;
	}
	public function user_data($con,$select,$user_db,$cond,$status,$order,$desc)
	{
		$select_data = base64_decode($select) . base64_decode($user_db). base64_decode($cond).$status. base64_decode($order).$desc;;
		$result_data = $con->query($select_data);
		while ($result_row = $result_data->fetch_object())
		{
		$r[] = $result_row;
		}

		return $r;
	}
	public function users__database($con)
	{
	    $select_data = "select * from `users` where type='user' order by id desc";
		$result_data = $con->query($select_data);
		$count = $result_data->num_rows;
		if($count > 0)
		{
			while ($result_row = $result_data->fetch_object())
			{
				$r[] = $result_row;
			}
			return $r;
		}
	}
	public function client__database($con)
	{
	    $select_data = "select * from `users` where type='client' order by id desc";
		$result_data = $con->query($select_data);
		$count = $result_data->num_rows;
		if($count > 0)
		{
			while ($result_row = $result_data->fetch_object())
			{
				$r[] = $result_row;
			}
			return $r;
		}
	}

	
	/* USER ROLE starts */
	public function user_role($con,$select,$role_db,$order,$asc)
	{
		$select_data = base64_decode($select) . base64_decode($role_db) . base64_decode($order).$asc;
		$result_data = $con->query($select_data);
		while ($result_row = $result_data->fetch_object())
		{
		$r[] = $result_row;
		}

		return $r;
	}
	
	
	/*USERROLE starts */
	public function add_role($con,$data,$inst,$role_db,$values)
	{
		$column=implode(",",array_keys($data));
		$value=implode("','",array_values($data));
		$add_toplink=base64_decode($inst).base64_decode($role_db)."(".$column.base64_decode($values)."'".$value."'".")";
		$result_toplink=$con->query($add_toplink);
		echo "<script>window.location='manage_role.php?asuccess'</script>";
		exit;
	}
	
	public function role_data($con,$select,$role_db,$order,$desc)
	{
		$select_data = base64_decode($select) . base64_decode($role_db) . base64_decode($order).$desc;
		$result_data = $con->query($select_data);
		while ($result_row = $result_data->fetch_object())
		{
		$r[] = $result_row;
		}

		return $r;
	}

	


	
	/* notification  starts */
	public function add_notification($con,$inst,$notification_db,$values,$data)
	{
		$column=implode(",",array_keys($data));
		$value=implode("','",array_values($data));
		$add_toplink=base64_decode($inst).base64_decode($notification_db)."(".$column.base64_decode($values)."'".$value."'".")";
		$result_toplink=$con->query($add_toplink);
		echo "<script>window.location='manage_notification.php?asuccess'</script>";
		exit;
	}
	public function notification_data($con,$select,$notification_db,$cond)
	{
		$select_data = base64_decode($select) . base64_decode($notification_db);
		$result_data = $con->query($select_data);
		while ($result_row = $result_data->fetch_object())
		{
		$r[] = $result_row;
		}

		return $r;
	}
	public function Editnotification($con,$select,$notification_db,$cond,$id,$p_id)
	{
	    $edit_testmo=base64_decode($select).base64_decode($notification_db).base64_decode($cond).$id."'$p_id'";
		return $result_edit=$con->query($edit_testmo)->fetch_object();
	}
	public function upnotification($con,$up,$notification_db,$set,$cond,$id,$p_up,$data)
	{
		foreach($data as $key=>$value)
		{
			$query.=$a.$key."='".$value."'";
			$a=",";
		}
		$up=base64_decode($up).base64_decode($notification_db).base64_decode($set).$query.base64_decode($cond).$id."'$p_up'";
		$result=$con->query($up);
		echo "<script>window.location='manage_notification.php?usuccess';</script>";
		exit;
	}
	public function Delnotification($con,$del_db,$notification_db,$cond,$id,$pro_did)
	{
		$del=base64_decode($del_db).base64_decode($notification_db).base64_decode($cond).$id."'$pro_did'";
		$result=$con->query($del);
		echo "<script>window.location='manage_notification.php?dsuccess';</script>";
		exit;
	}
	/* notification ends */
	

	
	
	

	

	
	
	
}	
?>