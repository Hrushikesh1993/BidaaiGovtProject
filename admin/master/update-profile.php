<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
$msg="";
check_login();
if(isset($_POST['Submit']))
{
	$uname=$_POST['username'];
	$utype=$_POST['utype'];
	$user_email=$_POST['user_email'];
	$user_phone=$_POST['user_phone'];
	
	mysqli_query($con,"update admin set username='$uname',user_email='$user_email',user_phone='$user_phone' ,utype='$utype' where id='".$_GET['uid']."'");

 echo "<script type=\"text/javascript\">
					alert('Profile Updated successfully');
					window.location='manage-users.php'
            </script>";

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

    <title>Admin | Update Profile</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="admin-home.php" class="logo"><b>Admin Dashboard</b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/ui-sam.png" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo strtoupper($_SESSION['login']);?></h5>
              	  	<li class="mt">
                      <a href="create_user.php">
                          <i class="fa fa-pencil"></i>
                          <span>Create User</span>
                      </a>
                  </li>
				  <li class="mt">
                      <a href="manage-users.php" >
                          <i class="fa fa-users"></i>
                          <span>Manage Users</span>
                      </a>
                   
                  </li>

                  <li class="mt">
                      <a href="reports.php">
                          <i class="fa fa-file"></i>
                          <span>Reports</span>
                      </a>
                  </li>
				  <li class="mt">
                      <a href="change-password.php">
                          <i class="fa fa-asterisk"></i>
                          <span>Change Password</span>
                      </a>
                  </li>


              
                 
              </ul>
          </div>
      </aside>
      <?php $ret=mysqli_query($con,"select * from admin where id='".$_GET['uid']."' and utype='admin'");
	  $row=mysqli_fetch_array($ret);
	  ?>
	  
	  

      <section id="main-content">
	  <br>
	  	<h3><i class="fa fa-angle-right"></i>Profile Edit</h3>
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Edit</h3>
             	
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel col-md-12">
                      
                           <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                          <div class="form-row">
						  <div class="form-group col-md-5">
                              <label>User Name </label>
								<input type="text" class="form-control" name="username" value="<?php echo $row['username'];?>" required>
						  </div><div class="col-md-2"></div>
								<div class="form-group col-md-5">
                              <label>Email </label>
								<input type="text" class="form-control" name="user_email" value="<?php echo $row['user_email'];?>"  required>
						  </div>

							
                          </div>
					<div class="form-row">
						  <div class="form-group col-md-5">
                              <label>Mobile No</label>
								<input type="text" class="form-control" name="user_phone" value="<?php echo $row['user_phone'];?>" required>
						  </div><div class="col-md-2"></div>
								<div class="form-group col-md-5">
                             <label>User Type </label>
								<input type="text" class="form-control" name="utype" value="<?php echo $row['utype'];?>" required >
						  </div>

							
                          </div>
					
                          
                              
                          
                             
                               

                          
						  
                          <div align="center" ><input type="submit" name="Submit" value="Update" class="btn btn-theme"></div>
						
                          </form>
                      </div>
                  </div>
              </div>
		</section>
        
      </section></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
