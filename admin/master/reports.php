<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
include("function.php");
check_login();
$sql_query=mysqli_query($con,"SELECT username from admin where utype='admin' ");
$showTab="";
$execQuery="";

if(isset($_POST['searchReport']))
{
	$sql="";
	$financial_year=$_POST['financial_year'];
	 $appStatus=$_POST['status'];
	 $district=$_POST['district'];
	if($appStatus=='Total Applications Applied')
	{
		 $sql="SELECT app_id,applicant_name,dob,marriage_date,received_date,name_of_the_would_be_groom,status from application_table where created_by='$district' and financial_year='$financial_year'";
	}
	else if($appStatus=='Pending in Eligibility Check')
	{
		$sql="SELECT app_id,applicant_name,dob,marriage_date,received_date,name_of_the_would_be_groom,status from application_table where created_by='$district' and  financial_year='$financial_year' and  status=1";
	}
	else if($appStatus=='Pending Eligible Application')
	{
		$sql="SELECT app_id,applicant_name,dob,marriage_date,received_date,name_of_the_would_be_groom,status from application_table where created_by='$district' and  financial_year='$financial_year' and status=2";
	}
	else if($appStatus=='Rejected')
	{
		$sql="SELECT app_id,dob,applicant_name,marriage_date,received_date,name_of_the_would_be_groom,status from application_table where created_by='$district' and  financial_year='$financial_year' and status=0";
	}
	else
	{
		$sql="SELECT app_id,applicant_name,dob,marriage_date,received_date,name_of_the_would_be_groom,status from application_table where created_by='$district' and  financial_year='$financial_year' and status=3";
	}
	
	$execQuery=mysqli_query($con,$sql);
	$showTab=1;
	

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
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Dashboard</b></a>
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
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Reports</h3>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="row">
				
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel col-md-12">
					  
					
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputFinancialYear">1. Financial Year</label>&nbsp;<span class="high-light">*</span>
      <select class="form-control" name="financial_year" id="inputFinancialYear" placeholder="" required>
	  <option  value="" selected>Choose..</option>
	  <option  value="2018-2019">2018-2019</option>
	  <option value="2017-2018">2017-2018</option>
	  <option value="2016-2017">2016-2017</option>
	  </select>
    </div>
	   
	    <div class="form-group col-md-3">
      <label for="inputStatus">2. Status </label>&nbsp;<span class="high-light">*</span>
            <select class="form-control" name="status" id="inputStatus" required>
	  <option  value="" selected>Choose..</option>
	  <option  value="">Total Applications Applied</option>
	  <option value="">Pending in Eligibility Check</option>
	  <option value="">Pending Eligible Application</option>
	  <option value="">Rejected</option>
	  <option value="">Sanctioned</option>
	 
	  </select>
    </div>
		    <div class="form-group col-md-3">
      <label for="inputStatus">3. District  </label>&nbsp;<span class="high-light">*</span>
            <select class="form-control" name="district" id="inputStatus" required>
			<option selected>Choose..</option>
		<?php
		while($result=mysqli_fetch_array($sql_query))
		{
		?>
		<option value='<?php echo $result['username']?>'><?php echo strtoupper( $result['username']);?></option>
		<?php
		}
		?>
	 
	  </select>
    </div>
	<br/>
	<div class="form-group col-md-3"><button type="submit" name="searchReport" class="btn btn-primary"><i class="fa fa-search"></i></button></div>
  </div>





	 

	

  

                         
                      </div>
                  </div>
				  
              </div>
			  </form>
			  <?php
				if($showTab==1)
				{
				?>
							  	<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                         <div class="table-responsive">
						  <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> All User Details </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>SL.No</th>
                                  <th class="hidden-phone">Applicant ID</th>
                                  <th> Applicant Name</th>
                                  <th> Applicant DOB</th>
                         
                                  <th>Applicant Marriage Date</th>
								  <th>Application Received Date</th>
								  <th>Applicant's Would-be Groom</th>
								  <th>Applicantion Status</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
							  $cnt=1;
							  while($row=mysqli_fetch_array($execQuery))
							  {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['app_id'];?></td>
								  <td><?php echo $row['applicant_name'];?></td>
                                  <td><?php echo $row['dob'];?></td>
                                 
                                  <td><?php echo $row['marriage_date'];?></td> 
								   <td><?php echo $row['received_date'];?></td>
								    <td><?php echo $row['name_of_the_would_be_groom'];?></td>
								  <td><?php echo status_description($row['status']);?></td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
						 </div>
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
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
