<?php
session_start();
include'dbconnection.php';

if(isset($_POST['resets']))
{
	$district=$_GET['id'];
	$pass=md5($_POST['password']);

	$query=mysqli_query($con,"update admin set password='$pass' where id='$district'");
	if($query)
	{
		$_SESSION['action1']="Password Updated Successfully";
	}
	else
	{
			$_SESSION['action1']="Something went wrong!!!";
	}
	header('Location:index.php');
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

    <title>Registration | Login</title>
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
		        <h2 class="form-login-heading">Reset</h2>
       
		        <div class="login-wrap">
		            <input type="password" id="password" name="password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{6,}" class="form-control" placeholder="Password" autofocus required>
		            <br>
		            <input type="password" id="cnf_password" name="cnf_password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{6,}" class="form-control" placeholder="Confirm Password" onchange="checkPass()" required><br >
		            <input  name="resets" class="btn btn-theme btn-block" type="submit">
		         
		        </div>
		      </form>	  	
	  	
	  	</div>
	  </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
		function checkPass()
{
		var pass=document.getElementById('password').value;
		var cnf=document.getElementById('cnf_password').value;
		if(pass===cnf)
		{
			return;
		}
		else
		{
			alert("Password didn't Match");
			document.getElementById('password').value="";
			document.getElementById('cnf_password').value="";
		}
}
    </script>


  </body>
</html>