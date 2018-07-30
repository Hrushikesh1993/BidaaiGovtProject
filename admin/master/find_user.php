<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
$response_array=array();
$findQuery=mysqli_query($con,"Select username from admin where utype='admin'");
$i=0;
while($find_row=mysqli_fetch_array($findQuery))
{
	$response_array[$i]=strtoupper($find_row['username']);
	$i++;
}
$return_var=implode(",",$response_array); 
echo $return_var
?>