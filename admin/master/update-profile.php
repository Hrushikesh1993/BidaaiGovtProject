<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
$msg="";
check_login();
$show="";
if(isset($_POST['Submit']))
{
	if(isset($_GET['bankid']))
	{
	$bank_id=$_GET['bankid'];
	$bank_name=$_POST['bank_name'];
	$ifsc_code=$_POST['ifsc_code'];
	$micr_code=$_POST['micr_code'];
	$branch_name=$_POST['branch_name'];
	$address=$_POST['address'];
	$bank_mobile=$_POST['bank_mobile'];
	$bank_taluk=$_POST['bank_taluk'];
	$bank_district=$_POST['bank_district'];
	$bank_state=$_POST['bank_state'];
	
	$sqlQuery=mysqli_query($con,"update bank_details set bank_name='$bank_name', ifsc_code='$ifsc_code', micr_code='$micr_code', branch_name='$branch_name', address='$address', bank_mobile='$bank_mobile', bank_taluk='$bank_taluk', bank_district='$bank_district', bank_state='$bank_state' where bank_id=$bank_id");
	if($sqlQuery)
	{
		echo "<script type=\"text/javascript\">
					alert('Updated successfully');
					window.location='manage-users.php'
            </script>";
	}
	else
	{
		echo "<script type=\"text/javascript\">
					alert('Some error occured, Please try again!!');
					window.location='manage-users.php'
            </script>";
	}
}
if(isset($_GET['uid']))
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
	


}
?>
 <?php 
	if(isset($_GET['uid']))
	{
		$show=1;
		
 $ret=mysqli_query($con,"select * from admin where id='".$_GET['uid']."' and utype='admin'");
	 
	}
	else
	{
		$show=2;
		$ret=mysqli_query($con,"select * from bank_details where bank_id='".$_GET['bankid']."'");
	}
	  $row=mysqli_fetch_array($ret); 
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

	  
	  

      <section id="main-content">
	  <br>
	  	<h3><i class="fa fa-angle-right"></i>Profile Edit</h3>
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Edit</h3>
             	<form class="form-horizontal style-form" name="form1" method="post" action="">
					<?php
					if($show==1)
					{
						
					?>
					<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel col-md-12">
                      
                           
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
					
                          
                              
                          
                             
                               

                          
						  
                          
						
                          
                      </div>
                  </div>
              </div>
					<?php }
					else{
						?>
						
						
										<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel col-md-12">
					  
					<div class="form-group">
    <label for="inputBankName">Bank Name</label>
    <input type="text" class="form-control" name="bank_name" id="inputBankName" placeholder="" required value="<?php echo $row['bank_name']?>">
    
  </div>
    <div class="form-group">
    <label for="inputBranch">Branch Name</label>
    <input type="text" class="form-control" name="branch_name" id="inputBranch" placeholder="" required value="<?php echo $row['branch_name']?>" >
  </div>
     <div class="form-group">
    <label for="inputIfsc">IFSC Code</label>
    <input type="text" class="form-control" name="ifsc_code" id="inputIfsc" placeholder="" required value="<?php echo $row['ifsc_code']?>">
  </div>
     <div class="form-group">
    <label for="inputMicr">MICR Code</label>
    <input type="text" class="form-control" name="micr_code" id="inputMicr" placeholder="" required value="<?php echo $row['micr_code']?>">
  </div>
       <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="address" id="inputAddress" placeholder=""required value="<?php echo $row['address']?>">
  </div>
         <div class="form-group">
    <label for="inputContact">Contact No.</label>
    <input type="tel" class="form-control" name="bank_mobile" id="inputContact" placeholder="" required value="<?php echo $row['bank_mobile']?>">
  </div>
  <div class="form-group">
    <label for="inputDistrict">District</label>
    <input type="text" class="form-control" name="bank_district" id="inputDistrict" placeholder="" required value="<?php echo $row['bank_district']?>">
  </div>
    <div class="form-group">
    <label for="inputTaluk">Taluk</label>
    <input type="text" class="form-control" name="bank_taluk" id="inputTaluk" placeholder="" required value="<?php echo $row['bank_taluk']?>">
  </div>
      <div class="form-group">
    <label for="inputState">State</label>
    <input type="text" class="form-control" name="bank_state" id="inputState" placeholder="" required value="<?php echo $row['bank_state']?>">
  </div>
  

 





	 

	

  

                         
                      </div>
                  </div>
						
					<?php } ?>
					<div align="center" ><input type="submit" name="Submit" value="Update" class="btn btn-theme"></div>
			  </form>
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
