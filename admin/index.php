<?php
session_start();
include("dbconnection.php");

if(isset($_POST['login']))
{
 $adminusername=trim(strtolower($_POST['username']));
 

  $pass=md5($_POST['password']);
$ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$adminusername' and password='$pass'");
$num=mysqli_fetch_array($ret);
$ret_new=mysqli_query($con,"SELECT district_id FROM district_details WHERE district_name='$adminusername'");
$num_new=mysqli_fetch_array($ret_new);
if($num_new>0)
{
	  $n=sprintf("%02d", $num_new['district_id']%100);
	  $_SESSION['district_code']=$n;
}
if($num>0)
{
  $_SESSION['login']=trim(strtolower($_POST['username']));
  $_SESSION['id']=$num['id'];

  
 if($num['utype']=="super_admin")
 {
    $extra="master/admin-home.php";
 } 
 else
 {
   $extra="admin-home.php";
  
 }


echo "<script>window.location.href='".$extra."'</script>";
exit();
}
else
{
$_SESSION['action1']="*Invalid username or password";
$extra="index.php";
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>BIDAAI |  Login</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

  </head>

  <body>
  <header>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="row">
	<div class="col-md-4" align="left"><img  src="assets/img/gokdom_new.png" class="img-responsive" width="150" height="150"></div>
	<div class="col-md-4" align="center"><h3><strong>Bidaai Scheme</strong></h3><p><strong>20th Floor, V.V. Towers, Dr Ambedkar Veedhi,Bangalore - 560001.</strong></p></div>
	<div class="col-md-4" align="right"></div>
	</div>

  </div>
</nav>
  </header>
	  <div id="login-page">
	  
	  	<div class="container">
		
	  	
		      <form class="form-login" action="" method="post">
		        <h2 class="form-login-heading">Login</h2>
                  <p style="color:#F00; padding-top:20px;" align="center"><?php echo $_SESSION['action1'];?><?php echo $_SESSION['action1']="";?></p>
		        <div class="login-wrap">
		            <input type="text" name="username" class="form-control" placeholder="User ID" autofocus>
		            <br>
		            <input type="password" name="password" class="form-control" placeholder="Password"><br >
		            <input  name="login" class="btn btn-theme btn-block" type="submit">
		         
		        </div>
		      </form>	  	
	  	
	  	</div>
	  </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
