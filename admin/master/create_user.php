<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
include("function.php");
check_login();
$message="";
$show="";
$info="";
if(isset($_POST['searchInfo']))
{
	$info=$_POST['info'];
	if($info=='User')
	{
		$show=1;
	}
	else if($info=='Bank')
	{
		$show=2;
	}
	
	
}
if(isset($_POST['createUser']))
{
	$user=trim(strtolower($_POST['username'])," ");
	$pass=md5($_POST['password']);
	$user_phone=$_POST['user_phone'];
	$user_email=$_POST['user_email'];
	$sqlQuery=mysqli_query($con,"INSERT into admin(id,username,password,user_phone,user_email,utype) VALUES(null,'$user','$pass','$user_phone','$user_email','admin')");
	if($sqlQuery)
	{
		 $rep=send_mail($user_email,$user,$_POST['password']);
	    $message='Login has been created successfully'.$rep;
	}
	else
	{
		$message="Awwwww! There is some error occured . Please try again!"." ".mysqli_error($con);
	}
}
if(isset($_POST['createBank']))
{
	$bank_name=$_POST['bank_name'];
	$ifsc_code=$_POST['ifsc_code'];
	$micr_code=$_POST['micr_code'];
	$branch_name=$_POST['branch_name'];
	$address=$_POST['address'];
	$bank_mobile=$_POST['bank_mobile'];
	$bank_taluk=$_POST['bank_taluk'];
	$bank_district=$_POST['bank_district'];
	$bank_state=$_POST['bank_state'];
	
	$sqlQuery=mysqli_query($con,"INSERT INTO bank_details(bank_id, bank_name, ifsc_code, micr_code, branch_name, address, bank_mobile, bank_taluk, bank_district, bank_state) VALUES (null,'$bank_name','$ifsc_code','$micr_code','$branch_name','$address','$bank_mobile','$bank_taluk','$bank_district','$bank_state')");
	if($sqlQuery)
	{
		$message="Bank has been added successfully";
	}
	else
	{
		$message="Awwwww! There is some error occured . Please try again!"." ".mysqli_error($con);
	}
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Manage Users</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
	 <link href="assets/js/autocomplete/content/styles.css" rel="stylesheet" />
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
              	  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>
              	  	<li class="mt">
                      <a href="create_user.php">
                          <i class="fa fa-pencil"></i>
                          <span>Create</span>
                      </a>
                  </li>
				  <li class="mt">
                      <a href="manage-users.php" >
                          <i class="fa fa-users"></i>
                          <span>Manage</span>
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
	            <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Create</h3>
			<form action="" method="POST" enctype="multipart/form-data">
			<div class="col-md-12">
          <p class="high-light text-center"><?php echo $message;?></p>
        </div>
		
				<div class="row">
				<form action="" method="POST" enctype="multipart/form-data">
				
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel col-md-12">
					  
					
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputInfo">1. Add Information</label>&nbsp;<span class="high-light">*</span>
      <select class="form-control" name="info" id="inputInfo" placeholder="" required>
	  <option  value="" selected>Choose..</option>
	  <option  value="User">User Details</option>
	  <option value="Bank">Bank Details</option>
	  </select>
    </div>
	   

		    
	<br/>
	<div class="form-group col-md-3"><button type="submit" name="searchInfo" class="btn btn-primary"><i class="fa fa-search"></i></button></div>
  </div>





	 

	

  

                         
                      </div>
                  </div>
				</form>  
              </div>
			  
			  <?php 
			  if($show==1)
			  {
			  ?>
				<div class="row">
				
				<form action="" method="POST">
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel col-md-12">
					  
<div class="form-row">
	<div class="form-group col-md-6">
    <label for="exampleInputEmail1">User Name</label>
    <input type="text" class="form-control" name="username" id="exampleInputUserId" placeholder="Enter District Name" required onfocus="fetchDistrict()">
    
  </div>

	<div class="form-group col-md-6">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" name="user_email" id="exampleInputEmail" placeholder="Enter Email" required>
    
  </div>
</div>
<div class="form-row">

  <div class="form-group col-md-6">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{6,}" id="exampleInputPassword" placeholder="Password" required title="Password must be min length 8 alphanumeric and special character ">
  </div>
  <div class="form-group col-md-6">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" name="cnf_password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{6,}" id="exampleInputCnfPassword" placeholder="Password" required title="Password must be min length 8 alphanumeric and special character " onchange="checkPass()">
  </div>
  <div class="form-group col-md-6">
    <label for="exampleInputPassword1">Phone</label>
    <input type="tel" class="form-control" name="user_phone" id="exampleInputMobile" placeholder="+91-xxxxx-xxxxx" pattern="[6789][0-9]{9}"  required>
  </div>
</div>
<div class="form-row" align="center">
<button type="submit" name="createUser" class="btn btn-primary">Create</button></div>
</form>
 





	 

	

  

                         
                      </div>
                  </div>
		 
              </div>
			  <?php }?>
			  			  <?php 
			  if($show==2)
			  {
			  ?>
				<div class="row">
				
				<form action="" method="POST">
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel col-md-12">
					  
					<div class="form-group">
    <label for="inputBankName">Bank Name</label>
    <input type="text" class="form-control" name="bank_name" id="inputBankName" placeholder="" required>
    
  </div>
    <div class="form-group">
    <label for="inputBranch">Branch Name</label>
    <input type="text" class="form-control" name="branch_name" id="inputBranch" placeholder="" required>
  </div>
     <div class="form-group">
    <label for="inputIfsc">IFSC Code</label>
    <input type="text" class="form-control" name="ifsc_code" id="inputIfsc" placeholder="" required>
  </div>
     <div class="form-group">
    <label for="inputMicr">MICR Code</label>
    <input type="text" class="form-control" name="micr_code" id="inputMicr" placeholder="" required>
  </div>
       <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="address" id="inputAddress" placeholder=""required>
  </div>
         <div class="form-group">
    <label for="inputContact">Contact No.</label>
    <input type="tel" class="form-control" name="bank_mobile" id="inputContact" placeholder="" required>
  </div>
  <div class="form-group">
    <label for="inputDistrict">District</label>
    <input type="text" class="form-control" name="bank_district" id="inputDistrict" placeholder="" required>
  </div>
    <div class="form-group">
    <label for="inputTaluk">Taluk</label>
    <input type="text" class="form-control" name="bank_taluk" id="inputTaluk" placeholder="" required>
  </div>
      <div class="form-group">
    <label for="inputState">State</label>
    <input type="text" class="form-control" name="bank_state" id="inputState" placeholder="" required>
  </div>
  
<button type="submit" name="createBank" class="btn btn-primary">Create</button>
</form>
 





	 

	

  

                         
                      </div>
                  </div>
		 
              </div>
			  <?php }?>


			  
		</section>
          
      </section
  ></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
	<script src="assets/js/autocomplete/src/jquery.autocomplete.js"></script>
	<script src="assets/js/autocomplete/scripts/jquery.mockjax.js"></script>

  <script>
    function fetchDistrict()
{
	  $.ajax({
       type: "POST",
       url: "find.php",
       cache: false,
       success: function(response)
       {
			
			var array = response.split(",");
			console.log(array)

$( "#exampleInputUserId" ).autocomplete({
	lookup: array
});
         
       }
     });
}

function checkPass()
{
		var pass=document.getElementById('exampleInputPassword').value;
		var cnf=document.getElementById('exampleInputCnfPassword').value;
		if(pass===cnf)
		{
			return;
		}
		else
		{
			alert("Password didn't Match");
			document.getElementById('exampleInputPassword').value="";
			document.getElementById('exampleInputCnfPassword').value="";
		}
}
  </script>

  </body>
</html>
