<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
$response_array=array();
$findQuery=mysqli_query($con,"Select app_id,id_parse from application_table where created_by='".$_SESSION['login']."'");
$i=0;
while($find_row=mysqli_fetch_array($findQuery))
{
	$response_array[$i]=$find_row['id_parse'].sprintf("%05d",$find_row['app_id']);
	$i++;
}
$return_var=implode(",",$response_array); 
echo $return_var
?>