<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
include("function.php");
check_login();
$showTab="";
$execQuery="";
$financial_year="";
$constituency="";
$taluk="";
$appStatus="";
$table_name=strtolower($_SESSION['district_code'])."_application_table";
if(isset($_POST['searchReport']))
{
	$sql="";
	$financial_year=$_POST['financial_year'];
	 $appStatus=$_POST['status'];
	 $constituency=$_POST['constituency'];
	 $taluk=$_POST['taluk'];
	if($appStatus=='Total Applications Applied')
	{
		if($constituency!='All' && $taluk!='All')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency'and taluk='$taluk' and created_by='".$_SESSION['login']."' ORDER BY marriage_date";
		}
		else if($constituency!='All' && $taluk=='All')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency' and created_by='".$_SESSION['login']."' ORDER BY marriage_date";
		}
		else if($constituency=='All' && $taluk!='All')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and  taluk='$taluk' and created_by='".$_SESSION['login']."' ORDER BY marriage_date";
		}
		else
		{
				$sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and created_by='".$_SESSION['login']."' ORDER BY marriage_date";
		}
		 
	}
	else if($appStatus=='Pending in Eligibility Check')
	{
		if($constituency!='All' && $taluk!='All')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency'and taluk='$taluk' and created_by='".$_SESSION['login']."' and status=1 ORDER BY marriage_date";
		}
		else if($constituency!='All' && $taluk=='All')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency' and created_by='".$_SESSION['login']."' and status=1  ORDER BY marriage_date";
		}
		else if($constituency=='All' && $taluk!='All')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and  taluk='$taluk' and created_by='".$_SESSION['login']."' and status=1  ORDER BY marriage_date";
		}
		else
		{
				$sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and created_by='".$_SESSION['login']."' and status=1  ORDER BY marriage_date";
		}
	}
	else if($appStatus=='Pending in Sanction')
	{
		if($constituency!='All' && $taluk!='All')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency'and taluk='$taluk' and created_by='".$_SESSION['login']."' and status=2 ORDER BY marriage_date";
		}
		else if($constituency!='All' && $taluk=='All')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency' and created_by='".$_SESSION['login']."' and status=2  ORDER BY marriage_date";
		}
		else if($constituency=='All' && $taluk!='All')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and  taluk='$taluk' and created_by='".$_SESSION['login']."' and status=2  ORDER BY marriage_date";
		}
		else
		{
				$sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and created_by='".$_SESSION['login']."' and status=2  ORDER BY marriage_date";
		}
	}
	else if($appStatus=='Rejected')
	{
		if($constituency!='All' && $taluk!='All')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency'and taluk='$taluk' and created_by='".$_SESSION['login']."' and status=0 ORDER BY marriage_date";
		}
		else if($constituency!='All' && $taluk=='All')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency' and created_by='".$_SESSION['login']."' and status=0  ORDER BY marriage_date";
		}
		else if($constituency=='All' && $taluk!='All')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and  taluk='$taluk' and created_by='".$_SESSION['login']."' and status=0  ORDER BY marriage_date";
		}
		else
		{
				$sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and created_by='".$_SESSION['login']."' and status=0  ORDER BY marriage_date";
		}
	}
	else if($appStatus=='Pending in Fund Release')
	{
		if($constituency!='All' && $taluk!='All')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency'and taluk='$taluk' and created_by='".$_SESSION['login']."' and status=3 ORDER BY marriage_date";
		}
		else if($constituency!='All' && $taluk=='All')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency' and created_by='".$_SESSION['login']."' and status=3  ORDER BY marriage_date";
		}
		else if($constituency=='All' && $taluk!='All')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and  taluk='$taluk' and created_by='".$_SESSION['login']."' and status=3  ORDER BY marriage_date";
		}
		else
		{
				$sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and created_by='".$_SESSION['login']."' and status=3  ORDER BY marriage_date";
		}
	}
	else
	{
		if($constituency!='All' && $taluk!='All')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency'and taluk='$taluk' and created_by='".$_SESSION['login']."' and status=4 ORDER BY marriage_date";
		}
		else if($constituency!='All' && $taluk=='All')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency' and created_by='".$_SESSION['login']."' and status=4  ORDER BY marriage_date";
		}
		else if($constituency=='All' && $taluk!='All')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and  taluk='$taluk' and created_by='".$_SESSION['login']."' and status=4  ORDER BY marriage_date";
		}
		else
		{
				$sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and created_by='".$_SESSION['login']."' and status=4  ORDER BY marriage_date";
		}
		
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

    <title><?php echo strtoupper($_SESSION['login']);?> | Reports</title>
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
          	<h3><i class="fa fa-angle-right"></i> Reports</h3>
			
				<div class="row">
				
				<form action="" method="POST" enctype="multipart/form-data">
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel col-md-12">
					  
					
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputFinancialYear">1. Financial Year</label>&nbsp;<span class="high-light">*</span>
      <select class="form-control" name="financial_year" id="inputFinancialYear" placeholder="" required>
	  <option  value="<?php echo $financial_year;?>" selected><?php echo $financial_year;?></option>
	  <option  value="2019-2020">2019-2020</option>
	  <option  value="2018-2019">2018-2019</option>
	  <option value="2017-2018">2017-2018</option>
	  <option value="2016-2017">2016-2017</option>
	  </select>
    </div>
	   
	    <div class="form-group col-md-3">
      <label for="inputStatus">2. Status </label>&nbsp;<span class="high-light">*</span>
            <select class="form-control" name="status" id="inputStatus" required>
	  <option  value="<?php echo $appStatus;?>" selected><?php echo $appStatus;?></option>
	  <option  value="Total Applications Applied">Total Applications Applied</option>
	  <option value="Pending in Eligibility Check">Pending in Eligibility Check</option>
	  <option value="Pending in Sanction">Pending in Sanction</option>
	  <option value="Pending in Fund Release">Pending in Fund Release</option>
	  <option value="Fund Released">Fund Released</option>
	  <option value="Rejected">Rejected</option>
	  
	 
	  </select>
    </div>
	    <div class="form-group col-md-3">
		<?php
			$talukQuery=mysqli_query($con,"SELECT * FROM taluk_details WHERE district_fn_id=(SELECT district_details.district_id from district_details WHERE district_details.district_name='".$_SESSION['login']."' )");
		?>
      <label for="inputTaluk">2. Taluk </label>&nbsp;<span class="high-light">*</span>
            <select class="form-control" name="taluk" id="inputTaluk" placeholder="" required">
			<option value="<?php echo $taluk;?>" selected><?php echo $taluk;?></option>
			<?php
				while($taluk_row=mysqli_fetch_array($talukQuery))
				{	
				     $district_ref_id=$taluk_row['district_fn_id'];
			?>
					<option value="<?php echo $taluk_row['taluk_name'];?>"><?php echo $taluk_row['taluk_name'];?></option>

			<?php
					
				}
					
	           
				
				?>
				<option value="All">All</option>
	  </select>
	

    </div>
		        <div class="form-group col-md-3">
		<?php
				
			$constituencyQuery=mysqli_query($con,"SELECT * FROM constituency_details WHERE constituency_district_id='".$district_ref_id."'");
		?>
      <label for="inputConstituency">3. Constituency </label>&nbsp;<span class="high-light">*</span>
      <select class="form-control" name="constituency" id="inputConstituency" placeholder="" required>
	  <option  value="<?php echo $constituency;?>" selected><?php echo $constituency;?></option>

	<?php
				while($constituency_row=mysqli_fetch_array($constituencyQuery))
				{	
				     
			?>
					<option value="<?php echo $constituency_row['constituency_name'];?>"><?php echo $constituency_row['constituency_name'];?></option>

			<?php
					
				}
					
	           
				
				?>
				<option value="All">All</option>
	  </select>
    </div>
	<br/>
	<div class="form-group col-md-4"><button type="submit" name="searchReport" class="btn btn-primary"><i class="fa fa-search"></i></button></div>
  </div>





	 

	

  

                         
                      </div>
                  </div>
				</form>  
              </div>
				<?php
				if($showTab==1)
				{
				?>
							  	<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                         <div class="table-responsive">
						  <table class="table table-striped table-advance table-hover display" id="example">
	                  	  	  
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>SL.No</th>
                                  <th >Registration ID</th>
                                  <th> Applicant Name</th>
                                  <th> Applicant Age</th>
								  <th> Applicant Parent Name</th>
                                  <th>Applicant Marriage Date</th>
								  <th>Application Received Date</th>
								  <th>Applicant's Would-be Groom</th>
								  <th>Applicantion Status</th>
								  <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
							  $cnt=1;
							  while($row=mysqli_fetch_array($execQuery))
							  {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['id_parse'].sprintf("%05d",$row['app_id']);?></td>
								  <td><?php echo $row['applicant_name'];?></td>
                                  <td><?php echo date_diff(date_create($row['dob']), date_create('today'))->y;  ?>&nbsp;years</td>
								  <td><?php echo $row['parent'];?></td>
                                  <td><?php echo convert_date_dmy($row['marriage_date']);?></td> 
								   <td><?php echo convert_date_dmy($row['received_date']);?></td>
								    <td><?php echo $row['name_of_the_would_be_groom'];?></td>
								  <td><?php echo status_description($row['status']);?></td>
								  <td>
                                     
                                     <a href="acknowledge.php?uid=<?php echo $row['app_id'];?>&fid=<?php echo $row['id_parse'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-print"></i></button></a>
                                     
                                  </td>
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
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>







  <script>
  var fy=$('#inputFinancialYear :selected').text();
  var st=$('#inputStatus :selected').text();
  var tal=$('#inputTaluk :selected').text();
  var con=$('#inputConstituency :selected').text();
  var display=fy+"\n"+st+" "+"Report"
  var display_bottom="* The above list is of "+tal+" "+"taluk"+" "+"and"+" "+con+" "+"constituency."
    $(document).ready(function() {
    
 
    
    
 
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy',
            {
                extend: 'excel',
                messageTop:null,
				                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8]
                },
				messageBottom:display_bottom
			
            },
            {
                extend: 'pdf',
                 footer: true,
           exportOptions: {
                columns: [0,1,2,3,4,5,6,7,8]
            },
			   title: display,
			   messageBottom:display_bottom
            },
            {
                extend: 'print',
                messageTop:null,
                messageBottom: display_bottom,
				exportOptions: {
                columns: [0,1,2,3,4,5,6,7,8]
            }
            }
        ]
    } );
} );
  </script>

  </body>
</html>
