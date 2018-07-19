<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
$bank_name=$_POST['bank_name'];
$district_name=$_POST['district_name'];
$response_array=array();
$findQuery=mysqli_query($con,"Select branch_name from bank_details where bank_name='".$bank_name."' and bank_district='".$district_name."'");
$i=0;
while($find_row=mysqli_fetch_array($findQuery))
{
	$response_array[$i]=$find_row['branch_name'];
	$i++;
}
$return_var=implode(",",$response_array); 
echo $return_var
?>