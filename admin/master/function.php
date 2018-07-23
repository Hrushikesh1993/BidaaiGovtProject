<?php
function status_description($status)
{
	
	if($status==0)
	{
		return "Rejected";
	}
	else if($status==1 || $status==2)
	{
		return "Pending Eligibility Check";
		
	}
		else if($status==2)
	{
		return "Pending Eligibility Application";
		
	}
		else if($status==3)
	{
		return "Pending to get Sanctioned";
		
	}
			else if($status==4)
	{
		return " Sanctioned";
		
	}
	
	
	
}
function get_count($cnt)
{
	global $con;
	$sql="";
	
	if(1==$cnt)
	{
		$sql= "SELECT count(app_id) as id from application_table where created_by='".$_SESSION['login']."'";
	}
	if($cnt==2)
	{
		$sql= "SELECT count(app_id) as id from application_table where (status=1 or status=2) and created_by='".$_SESSION['login']."'";
	}
	if($cnt==3)
	{
		$sql= "SELECT count(app_id) as id from application_table where status=3 and created_by='".$_SESSION['login']."'";
	}
	if($cnt==4)
	{
		$sql= "SELECT count(app_id) as id from application_table where status=0 and created_by='".$_SESSION['login']."'";
	}
	if($cnt==5)
	{
		$sql= "SELECT count(app_id) as id from application_table where status=4 and created_by='".$_SESSION['login']."'";
	}
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($res);
	return $row['id'];
	
}
function admin_get_count($cnt)
{
	global $con;
	$sql="";
	
	if(1==$cnt)
	{
		$sql= "SELECT count(app_id) as id from application_table";
	}
	if($cnt==2)
	{
		$sql= "SELECT count(app_id) as id from application_table where (status=1 or status=2)";
	}
	if($cnt==3)
	{
		$sql= "SELECT count(app_id) as id from application_table where status=3";
	}
	if($cnt==4)
	{
		$sql= "SELECT count(app_id) as id from application_table where status=0";
	}
	if($cnt==5)
	{
		$sql= "SELECT count(app_id) as id from application_table where status=4";
	}
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($res);
	return $row['id'];
	
}
function convert_date($dt)
{
	$originalDate = $dt ;
$newDate = date("d-m-Y", strtotime($originalDate));
return $newDate;
}

?>