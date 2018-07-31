<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
$district=$_POST['district'];
$findQuery=mysqli_query($con,"Select user_email from admin where username='$district'");
$return_var=mysqli_fetch_array($findQuery) ;
echo 1;
?>