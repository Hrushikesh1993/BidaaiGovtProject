<?php

include("dbconnection.php");
if(isset($_POST['applicant_new_registration']))
{
  $applicant_name=$_POST['applicant_name'];
  $applicant_dob=$_POST['applicant_dob'];
  $applicant_phone=$_POST['applicant_phone'];
 echo "INSERT into userEnteryTable(applicant_name,applicant_dob,applicant_phone) values ('$applicant_name','$applicant_dob','$applicant_phone')";
$ret=mysqli_query($con,"INSERT into userEnteryTable(applicant_name,applicant_dob,applicant_phone) values ('$applicant_name','$applicant_dob','$applicant_phone')");
if($ret)
{
 echo "Success Please Check your SMS";
}
else
{
/* $_SESSION['action1']="*Invalid username or password";
$extra="index.php";
echo "<script>window.location.href='".$extra."'</script>";
exit(); */
echo "Please Try Again!";
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

    <title>Registration | Login</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>
	  <div id="login-page">
	  
	  	<div class="container">
	  	
		      <form class="form-login" action="" method="post">
		        <h2 class="form-login-heading">New Registration</h2>
             
		        <div class="login-wrap">
		            <input type="text" name="applicant_name" class="form-control" placeholder="Name" autofocus required>
		            <br>
		            <input type="Date" name="applicant_dob" class="form-control" placeholder="DOB" required><br >
					 <input type="text" name="applicant_phone" class="form-control" placeholder="+91-xxxxx-xxxxx" pattern="[6789][0-9]{9}" required><br >
		            <input  name="applicant_new_registration" class="btn btn-theme btn-block" type="submit">
		         
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
