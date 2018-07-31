<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
$show="";
$ret1="";
if(isset($_POST['searchInfo']))
{
	$_SESSION['info']=$_POST['info'];
	$info=$_POST['info'];
	if($info=='User')
	{
		$show=1;
	}
	else if($info=='Bank')
	{
		$show=2;
		$ret1=mysqli_query($con,"select bank_id,bank_name,branch_name,address,ifsc_code,micr_code from bank_details");
	}

	
	
}

if($_SESSION['info']=='User')
{
		if(isset($_GET['id']))
      {
		 $adminid=$_GET['id'];
		$msg=mysqli_query($con,"delete from admin where id='$adminid'");
		if($msg)
		{
				echo "<script>alert('Data deleted');window.location='manage-users.php';</script>";
		}
	  }
}
if($_SESSION['info']=='Bank')
{
		if(isset($_GET['bankid']))
      {
		 $bankid=$_GET['bankid'];
		$msg=mysqli_query($con,"delete from bank_details where bank_id='$bankid'");
		if($msg)
		{
				echo "<script>alert('Data deleted');window.location='manage-users.php'</script>";
		}
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
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet">
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
          	<h3><i class="fa fa-angle-right"></i> Manage Users</h3>
			<div class="row">
				<form action="" method="POST" enctype="multipart/form-data">
				
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel col-md-12">
					  

					
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputInfo">1. Show Information</label>&nbsp;<span class="high-light">*</span>
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
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover display"id="example"   style="width:100%">
	                  	  	  <h4><i class="fa fa-angle-right"></i> All User Details </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  <th>User Name</th>
                                  <th> User Type</th>
								<th> Action</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"select * from admin where utype='admin'");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['username'];?></td>
                                  <td><?php echo $row['utype'];?></td>
                                  <td>
                                     
                                     <a href="update-profile.php?uid=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                     <a href="manage-users.php?id=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
			  <?php
			  }
			  else if($show==2)
			  {?>
		  				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover display"id="example1"   style="width:100%">
	                  	  	  <h4><i class="fa fa-angle-right"></i> All Bank Details </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>SNo.</th>
                                  <th>Bank Name</th>
                                  <th>Branch Name</th>
								  <th>Address</th>
								  <th>IFSC Code</th>
								  <th>MICR Code</th>
								<th> Action</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
							  $cnt1=1;
							  while($row1=mysqli_fetch_array($ret1))
							  {?>
                              <tr>
                                  <td><?php echo $cnt1;?></td>
                                  <td><?php echo $row1['bank_name'];?></td>
                                  <td><?php echo $row1['branch_name'];?></td>
								  <td><?php echo $row1['address'];?></td>
								  <td><?php echo $row1['ifsc_code'];?></td>
								  <td><?php echo $row1['micr_code'];?></td>
                                  <td>
                                     
                                     <a href="update-profile.php?bankid=<?php echo $row1['bank_id'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                     <a href="manage-users.php?bankid=<?php echo $row1['bank_id'];?>"> 
                                     <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>
                                  </td>
                              </tr>
                              <?php $cnt1=$cnt1+1; }?>
                             
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
		  
		  
		  
			  <?php
			  }
			  ?>
		</section>
      </section
  ></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>






  <script>
     $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
   $(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
  </script>

  </body>
</html>
