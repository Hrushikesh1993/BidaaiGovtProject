<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
$bank_name=$_POST['bank_name'];
$district_name=$_POST['district_name'];
$branchName=$_POST['branchName'];
$response_array=array();
$findQuery=mysqli_query($con,"Select ifsc_code from bank_details where bank_name='".$bank_name."' and bank_district='".$district_name."' and branch_name='".$branchName."'");
$find_row=mysqli_fetch_array($findQuery);

echo $return_var=$find_row['ifsc_code'];
?>