<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
$doc=$_POST['doc'];
//echo"Select app_id from application_table where caste_certificate_no='$doc' or income_certificate_no='$doc' or bpl_card_no='$doc'";
$findQuery=mysqli_query($con,"Select app_id from application_table where caste_certificate_no='$doc' or income_certificate_no='$doc' or bpl_card_no='$doc' or sslc_no='$doc' or sslc_groom_no='$doc'");
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