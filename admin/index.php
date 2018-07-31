<?php
session_start();
include("dbconnection.php");
include("function.php");
if(isset($_POST['login']))
{
 $adminusername=trim(strtolower($_POST['username']));
 

  $pass=md5($_POST['password']);
$ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$adminusername' and password='$pass'");
$num=mysqli_fetch_array($ret);
$ret_new=mysqli_query($con,"SELECT district_code,district_id FROM district_details WHERE district_name='$adminusername'");
$num_new=mysqli_fetch_array($ret_new);
if($num_new>0)
{
	  $n=$num_new['district_code'];
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
			if(isset($_POST['forgetSubmit']))
			{
				$uname=$_POST['uname'];
				$findQuery=mysqli_query($con,"Select id,user_email from admin where username='$uname'");
                $return_num=mysqli_num_rows($findQuery);
				$return_var=mysqli_fetch_array($findQuery);
				if($return_num==1)
				{
					$_SESSION['action1']="Please check your E-mail!";
					$rep=send_mail_forget($return_var['user_email'],$return_var['id']);
					
				}
				else
				{
					$_SESSION['action1']="Usesname does not exists!!";
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
	<link href="assets/js/autocomplete/content/styles.css" rel="stylesheet" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

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
		            <input  name="login" class="btn btn-theme btn-block" type="submit"><br>
					<a  href="#" data-toggle="modal"  data-target="#myModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i>&nbsp;Forget password?</a>
		        </div>
		      </form>	  	
	  	
	  	</div>
	  </div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Forget Password</h4>
        </div>
        <div class="modal-body">

    <form method="POST" action="">
	
    <input type="text" class="form-control" name="uname" id="exampleInputUserId" placeholder="Enter District Name" required><br>
	<button type="submit" name="forgetSubmit" class="btn btn-primary">Submit</button>
    </form>
  </div>
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div>
   <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
	<script src="assets/js/autocomplete/src/jquery.autocomplete.js"></script>
	<script src="assets/js/autocomplete/scripts/jquery.mockjax.js"></script>
	
    <script>


	</script>


  </body>
</html>
