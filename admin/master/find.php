<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
$response_array=array();
$findQuery=mysqli_query($con,"Select district_name from district_details");
$i=0;
while($find_row=mysqli_fetch_array($findQuery))
{
	$response_array[$i]=strtolower($find_row['district_name']);
	$i++;
}
$return_var=implode(",",$response_array); 
echo $return_var
?>