<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
include("function.php");
check_login();
$app_id=$_GET['uid'];
$appstatus=$_GET['appstatus'];
$sql="SELECT * from application_table where app_id='".$app_id."'";
$execQuery=mysqli_query($con,$sql);
$row=mysqli_fetch_array($execQuery);

if('Sanction'==$appstatus)
{
    	if(isset($_POST['process']))
{
	$sqlStatus="";
		$resp=$_POST['inputAcceptSanction'];
		$doc=$_POST['verify_status'];
		$field_check=$_POST['field_check'];
		if($resp=='accept')
		{
			 $sqlStatus="update application_table set field_check='".$field_check."',verify_document='".$doc."' , status=3 where app_id='".$app_id."'";
			  echo "<script type=\"text/javascript\">
					alert('Application processed to fund release');
					window.location='application_process.php'
            </script>";
		}
		else
		{
			  $sqlStatus="update application_table set verify_document='".$doc."', status=0 where app_id='".$app_id."'";
			   echo "<script type=\"text/javascript\">
					alert('Application Rejected');
					window.location='application_process.php'
            </script>";
		}	
    
    $execQueryStatus=mysqli_query($con,$sqlStatus);	
}	
	
}
else if('Reverify'==$appstatus)
{
	if(isset($_POST['process']))
{ 
		 $sqlStatus="update application_table set status=1 where app_id='".$app_id."'";
			  echo "<script type=\"text/javascript\">
					alert('Application was revived back to list');
					window.location='application_process.php'
         </script>";
	

	
    $execQueryStatus=mysqli_query($con,$sqlStatus);	 
}
	
}
else if('Scrutinize'==$appstatus){

if(isset($_POST['process']))
{
		$sqlStatus="";
		$resp=$_POST['inputAcceptScr'];
	

	
		if($resp=='accept')
		{
			 $sqlStatus="update application_table set status=2,marriage_document='$marriage_document',affidavit_attached='$affidavit_attached' where app_id='".$app_id."'";
			  echo "<script type=\"text/javascript\">
					alert('Application processed to sanction list');
					window.location='application_process.php'
         </script>";
		}
		else
		{
			  $sqlStatus="update application_table set status=0,marriage_document='$marriage_document',affidavit_attached='$affidavit_attached' where app_id='".$app_id."'";
			   echo "<script type=\"text/javascript\">
					alert('Application Rejected');
					window.location='application_process.php'
            </script>";
		}	
    
    $execQueryStatus=mysqli_query($con,$sqlStatus);	
}

}
else
{
	  
  	if(isset($_POST['process']))
{
		$sqlStatus="";
		$resp=$_POST['inputAcceptFund'];
		
		if($resp=='accept')
		{
			 $sqlStatus="update application_table set status=4 where app_id='".$app_id."'";
			  echo "<script type=\"text/javascript\">
					alert('Fund has been processed');
					window.location='application_process.php'
            </script>";
		}
    
    $execQueryStatus=mysqli_query($con,$sqlStatus);	
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

    <title><?php echo strtoupper($_SESSION['login']);?>| Application Process</title>
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
            <a href="admin-home.php" class="logo"><b>Bidaai Scheme</b></a>
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
              
              	  <p class="centered"><a href="admin-home.php"><img src="assets/img/ui-sam.png" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo strtoupper($_SESSION['login']);?></h5>
              	  	<li class="mt">
                      <a href="application_registration.php">
                          <i class="fa fa-pencil"></i>
                          <span>Application Registration</span>
                      </a>
                  </li>
				  <li class="mt">
                      <a href="update_registration.php">
                          <i class="fa fa-pencil-square-o"></i>
                          <span>Update Registration</span>
                      </a>
                  </li>
				  <li class="mt">
                      <a href="application_process.php">
                          <i class="fa fa-clock-o"></i>
                          <span>Application Processing</span>
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
			<h3><i class="fa fa-angle-right"></i> Application Eligibility Checking Process</h3>
				<div class="row">
				
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel col-md-12">
					  <div class="row">

						<div class="table-responsive">
						  <table class="table ">
	                  	  	  
	                  	  	 <thead>
							 <tr>
								<th><h4>Applicant Details</h4></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
							 </tr>
							 </thead>
                              <tbody>
								 <tr>
                              <td><img src="<?php echo $row['applicant_photo']; ?>"  height="100" width="100" alt="Applicant Photo"></td>
                                  <td> </td>
								  <td></td>
									<td></td>
									<td></td>
									<td></td>
								

                              </tr>
                           
                              <tr>
                              <td><strong>Registration ID</strong></td>
                                  <td><strong><?php echo $row['id_parse'].sprintf('%05d',$row['app_id']);?></strong></td>
								  <td><strong>Received Date</strong></td>
                                  <td><strong><?php echo convert_date_dmy($row['received_date']); ?></strong></td>
                                 
                                  <td><strong>Difference</strong></td> 
								   <td><strong><?php $date1=date_create($row['received_date']);
											$date2=date_create($row['marriage_date']);
											$diff=date_diff($date1,$date2);
											echo $diff->format("%a Days");  ?></strong></td>
								

                              </tr>
								<tr>
                              <td><strong>Name of the Applicant</strong></td>
                                  <td><strong><?php echo $row['applicant_name']; ?><br><?php echo $row['applicant_name_kannada']; ?></strong></td>
								  <td><strong>Name of the Father / Mother/ Guardian</strong></td>
                                  <td><strong><?php echo $row['parent']; ?><br><?php echo $row['parent_kannada']; ?></strong></td>
                                 
                                  <td><strong>Name of the Would-be Groom</strong></td> 
								   <td><strong><?php echo $row['name_of_the_would_be_groom']; ?><br><?php echo $row['name_of_the_would_be_groom_kannada']; ?></strong></td>
								

                              </tr>
								<tr>
                              <td><strong>Applicant Date of Birth</strong></td>
                                  <td><strong><?php echo convert_date_dmy($row['dob']); ?><br>Age:<?php echo date_diff(date_create($row['dob']), date_create('today'))->y;  ?>&nbsp;years</strong></td>
								  <td><strong>Would-be Groom Date of Birth</strong></td>
                                  <td><strong><?php echo convert_date_dmy($row['groom_dob']); ?><br>Age:<?php echo date_diff(date_create($row['groom_dob']), date_create('today'))->y;  ?>&nbsp;years</strong></td>
                                 
                                  <td><strong>Marriage Date Fixed<strong></td> 
								   <td><strong><?php echo convert_date_dmy($row['marriage_date']); ?></strong></td>
								

                              </tr>
								<tr>
                              <td><strong>Domicile State</strong></td>
                                  <td><strong><?php echo $row['domicile_state']; ?></strong></td>
								  <td><strong>Domicile Certificate</strong></td>
                                  <td><strong><?php echo $row['domicile_proof']; ?></strong></td>
								  <td><strong>Annual Income</strong></td> 
								   <td><strong><?php echo $row['annual_income']; ?></strong></td>
								  
                                 
                                  
								

                              </tr>
							  <tr>
                              
								  <td><strong>Physically handicap</strong></td>
                                  <td><strong><?php echo $row['physically_handicap']; ?></strong></td>
								  <td><strong>Application Status</strong></td>
                                  <td><strong><?php echo status_description($row['status']); ?></strong></td>
								  <td></td> 
								   <td></td>
                                 
                                  
								

                              </tr>
								
                             
                             
                              </tbody>
                          </table>
						  </div>
						 
				
                  
	                  
               
                        </div>
					
  





	 

	

  

                         
                      </div>
                  </div>
				  
              </div><br>
			  
			  <?php 
			  
			  if($appstatus=='Fund')
			  {
			  ?>
			  <div class="row">
				
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel col-md-12">
					  <div class="row">

						<div class="table-responsive">
						<form method='post' action="">
						  <table class="table ">
	        
	                  	  	 <thead>
							 <tr>
								<th><h4>Document Details</h4></th>
								<th></th>
							
							 </thead>
                              <tbody>
								 <tr>
                              <td>Marital Status of the Would-be Groom</td>
                                  <td> <?php echo $row['marital_status_of_the_would_be_groom']; ?></td>
								  
								

                              </tr>
                           
                              <tr>
                              <td>Marital Status of the Would-be Bride</td>
                                  <td><?php echo $row['marital_status_of_the_would_be_bride']; ?></td>
								 
                                 
								</tr>
								<tr>
                              <td>Marriage Document/Invitation Card Attached ?</td>
                                  <td><?php echo $row['marriage_document']; ?></td>
								 
								

                              </tr>
								<tr>
                              <td>Affidavit Attached ?</td>
                                  <td><?php echo $row['affidavit_attached']; ?></td>
								  
								

                              </tr>
							  <td>Marriage Photo and Necessary Documents have been submitted?</td>
                                  <td><?php echo $row['verify_document']; ?></td>
								
								<tr>
                              <td>Whether fund has been released ?&nbsp;<span class="high-light">*</span></td>
                                  <td><input type="Radio"  id="inputAcceptFn" name="inputAcceptFund" value="accept" required><label for="inputAcceptFn">&nbsp;Yes</label></td>
							
                           
								

                              </tr>
								
                             
                             
                              </tbody>
                          </table>
						  <div align="center"><button type="submit" name="process" class="btn btn-primary">Submit</button></div>
						  <br>
						</form>
						 </div>
				
                  
	                  
               
                        </div>
					
  





	 

	

  

                         
                      </div>
                  </div>
				  
              </div>

			  <?php
			  }
			else if($appstatus=='Reverify')
			{
			?>
						<form method='post' action="" id="revive_form">
                         <div align="center"><button type="submit" name="process" class="btn btn-primary"onClick="return  confirm('Do you want to revive???')">Revive Application</button></div>
						</form>
				
			
		<?php
			}

			  else if($appstatus=='Scrutinize')
			  {
				  ?>
				  
				  <div class="row">
				
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel col-md-12">
					  <div class="row">

						<div class="table-responsive">
						<form method='post' action="">
						  <table class="table ">
	        
	                  	  	 <thead>
							 <tr>
								<th><h4>Document Details</h4></th>
								<th></th>
							
							 </thead>
                              <tbody>
								 <tr>
                              <td>Marital Status of the Would-be Groom</td>
                                  <td> <?php echo $row['marital_status_of_the_would_be_groom']; ?></td>
								  
								

                              </tr>
                           
                              <tr>
                              <td>Marital Status of the Would-be Bride</td>
                                  <td><?php echo $row['marital_status_of_the_would_be_bride']; ?></td>
								 
                                 
								</tr>
							 
								<tr>
                              <td>Marriage Document/Invitation Card Attached ?</td>
							  <td><?php echo $row['marriage_document']; ?></td>
								 
								

                              </tr>
								<tr>
                              <td>Affidavit Attached ?</td>
                                  <td><?php echo $row['affidavit_attached']; ?></td>
								  
								

                              </tr>
								  <?php if($row['affidavit_attached']=='Yes' && $row['marriage_document']=='Yes')
								{?>
								<tr>

                              <td>Application Status &nbsp;<span class="high-light">*</span></td>
                                  <td><input type="Radio"  id="inputAcceptSr" name="inputAcceptScr" value="accept" required  ><label for="inputAccept">&nbsp;Accept</label>&nbsp;
	<input type="Radio" id="inputRejectSr" name="inputAcceptScr" value="reject" required ><label for="inputReject" >&nbsp;Reject</label></td>

                           
								

                              </tr>
							  <?php
								}
							  
							  ?>
								
                             
                             
                              </tbody>
                          </table>
						  							   <?php if($row['affidavit_attached']=='Yes' && $row['marriage_document']=='Yes')
								{?>
						  <div align="center"><button type="submit" name="process" class="btn btn-primary">Application Process</button></div>
								<?php } 
								else
								{?>
								<div align="center"><span class="high-light">Please Submit Marriage Document/Invitation Card and Affidavit to process further * </span></div>
								
								<?php
								}
								?>
						  <br>
						</form>
						 </div>
				
                  
	                  
               
                        </div>
					
  





	 

	

  

                         
                      </div>
                  </div>
				  
              </div>
			  
			  <?php
			    }
				else
				{
			  ?>
			  				<div class="row">
				
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel col-md-12">
					  <div class="row">

						<div class="table-responsive">
						<form method='post' action="">
						  <table class="table ">
	        
	                  	  	 <thead>
							 <tr>
								<th><h4>Document Details</h4></th>
								<th></th>
							
							 </thead>
                              <tbody>
								 <tr>
                              <td>Marital Status of the Would-be Groom</td>
                                  <td> <?php echo $row['marital_status_of_the_would_be_groom']; ?></td>
								  
								

                              </tr>
                           
                              <tr>
                              <td>Marital Status of the Would-be Bride</td>
                                  <td><?php echo $row['marital_status_of_the_would_be_bride']; ?></td>
								 
                                 
								</tr>
								<tr>
                              <td>Marriage Document/Invitation Card Attached ?</td>
                                  <td><?php echo $row['marriage_document']; ?></td>
								 
								

                              </tr>
								<tr>
                              <td>Affidavit Attached ?</td>
                                  <td><?php echo $row['affidavit_attached']; ?></td>
								  
								

                              </tr>
							  <tr>
                              <td>Field Check?&nbsp;<span class="high-light">*</span> </td>
                                  <td>    <input type="Radio"  id="inputFieldYes" name="field_check" value="Yes"><label for="inputFieldYes" required>&nbsp;Yes</label>&nbsp;
	<input type="Radio" id="inputFieldNo" name="field_check" value="No" required><label for="inputFieldNo">&nbsp;No</label></td>
								  
								

                              </tr>
							  <tr>
                              <td>Marriage Photo and Necessary Documents have been submitted?&nbsp;<span class="high-light">*</span> </td>
                                  <td>    <input type="Radio"  id="inputVerifyStatusYes" name="verify_status" value="Yes"><label for="inputDocumentStatusYes" required>&nbsp;Yes</label>&nbsp;
	<input type="Radio" id="inputVerifyStatusNo" name="verify_status" value="No" required><label for="inputDocumentStatusYes">&nbsp;No</label></td>
								  
								

                              </tr>
								
								<tr id="showStatus">
                              <td>Application Sanction &nbsp;<span class="high-light">*</span> </td>
                                  <td><input type="Radio"  id="inputAcceptSn" name="inputAcceptSanction" value="accept" required><label for="inputDocumentStatusYes">&nbsp;Accept</label>&nbsp;
	<input type="Radio" id="inputRejectSn" name="inputAcceptSanction" value="reject" required><label for="inputDocumentStatusYes">&nbsp;Reject</label></td>
								  
                           
								

                              </tr>
								
                             
                             
                              </tbody>
                          </table>
						  <div align="center"><button type="submit" name="process" class="btn btn-primary">Application Process</button></div>
						  <br>
						</form>
						 </div>
				
                  
	                  
               
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

	
		$(document).ready(function() {
	$('#inputFieldYes,#inputVerifyStatusYes,#inputVerifyStatusNo,#inputFieldNo,#inputAcceptSn,#inputRejectSn').change(function(e){

    if($('input[name=field_check]:checked').val()=='Yes' && $('input[name=verify_status]:checked').val()=='Yes')
	{
		console.log("Yess");
		$('input:radio[name="inputAcceptSanction"]').filter('[value="accept"]').prop("checked", true);
	}
	else
	{
		console.log("No");
		$('input:radio[name="inputAcceptSanction"]').filter('[value="reject"]').prop("checked", true);
	}
	
	});
	});

	</script>
	<script>
	

</script>



  </body>
</html>
