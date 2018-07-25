<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
$aadhar=$_POST['aadhar'];
$findQuery=mysqli_query($con,"Select app_id from application_table where (aadhar_no=$aadhar or father_aadhar=$aadhar) or( mother_aadhar=$aadhar or groom_aadhar_no=$aadhar)");
$find_row=mysqli_num_rows($findQuery);
if($find_row > 0 || $find_row!=null)
{
	echo 0;
}
else
{
	echo 1;
}	
?>