<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
$response_array=array();
$district=$_POST['district'];
$findQuery=mysqli_query($con,"Select constituency_name from constituency_details where constituency_district_id=(select district_id from district_details where district_name='$district')");
$i=0;
while($find_row=mysqli_fetch_array($findQuery))
{
	$response_array[$i]=$find_row['constituency_name'];
	$i++;
}
$return_var=implode(",",$response_array); 
echo $return_var
?>