<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
include("function.php");
check_login();
$sql_query=mysqli_query($con,"SELECT username from admin where utype='admin'");
$showTab="";
$execQuery="";
$financial_year="";
$constituency="";
$taluk="";
$appStatus="";
$district="";
if(isset($_POST['searchReport']))
{
	$sql="";
	$financial_year=$_POST['financial_year'];
	$district=$_POST['district'];
	$dist_code=find_district_code($district);
	$table_name=$dist_code.'_application_table';
	 $appStatus=$_POST['status'];
	 $constituency=$_POST['constituency'];
	 $taluk=$_POST['taluk'];
	if($appStatus=='Total Applications Applied')
	{
		if($constituency!='' && $taluk!='')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency'and taluk='$taluk' ORDER BY marriage_date";
		}
		else if($constituency!='' && $taluk=='')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency'  ORDER BY marriage_date";
		}
		else if($constituency=='' && $taluk!='')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and  taluk='$taluk'  ORDER BY marriage_date";
		}
		else
		{
				$sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' ORDER BY marriage_date";
		}
		 
	}
	else if($appStatus=='Pending in Eligibility Check')
	{
		if($constituency!='' && $taluk!='')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency'and taluk='$taluk' and  status=1 ORDER BY marriage_date";
		}
		else if($constituency!='' && $taluk=='')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency' and  status=1  ORDER BY marriage_date";
		}
		else if($constituency=='' && $taluk!='')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and  taluk='$taluk' and  status=1  ORDER BY marriage_date";
		}
		else
		{
				$sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and  status=1  ORDER BY marriage_date";
		}
	}
	else if($appStatus=='Pending in Sanction')
	{
		if($constituency!='' && $taluk!='')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency'and taluk='$taluk' and  status=2 ORDER BY marriage_date";
		}
		else if($constituency!='' && $taluk=='')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency' and  status=2  ORDER BY marriage_date";
		}
		else if($constituency=='' && $taluk!='')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and  taluk='$taluk' and  status=2  ORDER BY marriage_date";
		}
		else
		{
				$sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and  status=2  ORDER BY marriage_date";
		}
	}
	else if($appStatus=='Rejected')
	{
		if($constituency!='' && $taluk!='')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency'and taluk='$taluk' and  status=0 ORDER BY marriage_date";
		}
		else if($constituency!='' && $taluk=='')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency' and  status=0  ORDER BY marriage_date";
		}
		else if($constituency=='' && $taluk!='')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and  taluk='$taluk' and  status=0  ORDER BY marriage_date";
		}
		else
		{
				$sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and  status=0  ORDER BY marriage_date";
		}
	}
	else if($appStatus=='Pending in Fund Release')
	{
		if($constituency!='' && $taluk!='')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency'and taluk='$taluk' and  status=3 ORDER BY marriage_date";
		}
		else if($constituency!='' && $taluk=='')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency' and  status=3  ORDER BY marriage_date";
		}
		else if($constituency=='' && $taluk!='')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and  taluk='$taluk' and  status=3  ORDER BY marriage_date";
		}
		else
		{
				$sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and  status=3  ORDER BY marriage_date";
		}
	}
	else
	{
		if($constituency!='' && $taluk!='')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency'and taluk='$taluk' and  status=4 ORDER BY marriage_date";
		}
		else if($constituency!='' && $taluk=='')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and constituency='$constituency' and  status=4  ORDER BY marriage_date";
		}
		else if($constituency=='' && $taluk!='')
		{
			 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and  taluk='$taluk' and  status=4  ORDER BY marriage_date";
		}
		else
		{
				 $sql="SELECT app_id,id_parse,applicant_name,dob,parent,marriage_date,received_date,name_of_the_would_be_groom,status from $table_name where financial_year='$financial_year' and  status=4  ORDER BY marriage_date";
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

    <title>Admin | Reports</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
			<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet">
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
      <label for="inputStatus">3. District  </label>&nbsp;<span class="high-light">*</span>
            <select class="form-control" name="district" id="inputDistrict" required>
			<option value="<?php echo $district;?>" selected><?php echo strtoupper($district);?></option>
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
			    <div class="form-group col-md-3">
      <label for="inputStatus">4. Taluk  </label>
		<input type="text" class="form-control" placeholder="Search for Taluk.." name="taluk" id="inputTaluk" onfocus="fetchTaluk()" title="Leave blank to select " value="<?php echo $taluk;?>">
    </div>
  </div>
    <div class="form-row">
	<div class="form-group col-md-3">
      <label for="inputStatus">5. Constituency  </label>
		<input type="text" class="form-control" placeholder="Search for Constituency.." name="constituency" id="inputConstituency" onfocus="fetchCon()" title="Leave blank to select " value="<?php echo $constituency;?>">
    </div>
	<br/>
	<div class="form-group col-md-3"><button type="submit" name="searchReport" class="btn btn-primary"><i class="fa fa-search"></i></button></div>
	<div class="form-group col-md-3"></div>
	<div class="form-group col-md-3"></div>
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
						  <table class="table table-striped table-advance table-hover display"id="example"   style="width:100%">
	                  	  	  
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>SL.No</th>
                                  <th>Applicant ID</th>
                                  <th> Applicant Name</th>
                                  <th> Applicant DOB</th>
                         
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
                                  <td><?php echo convert_date_dmy($row['dob']);?></td>
                                 
                                  <td><?php echo convert_date_dmy($row['marriage_date']);?></td> 
								   <td><?php echo convert_date_dmy($row['received_date']);?></td>
								    <td><?php echo $row['name_of_the_would_be_groom'];?></td>
								  <td><?php echo status_description($row['status']);?></td>
								  								  <td>
                                     
                                     <a href="acknowledge.php?uid=<?php echo $row['app_id'];?>&district=<?php echo $district;?>&fid=<?php echo $row['id_parse'];?>"> 
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
		<script src="assets/js/autocomplete/src/jquery.autocomplete.js"></script>
	<script src="assets/js/autocomplete/scripts/jquery.mockjax.js"></script>



  <script>
  var fy=$('#inputFinancialYear :selected').text();
  var st=$('#inputStatus :selected').text();
  var dis=$('#inputDistrict :selected').text();
  var tal=$('#inputTaluk').val();
  var con=$('#inputConstituency').val();
  var display=fy+"\n"+st+" "+"Report"
  var pntDisplay=dis+" "+"Report"
  var display_bottom="* The above list is of "+dis+" "+"district"+" "+tal+" "+"taluk"+" "+"and"+" "+con+" "+"constituency."
    $(document).ready(function() {
    
 
    
    
 
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy',
            {
                extend: 'excel',
                messageTop:null,
				                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7]
                },
				messageBottom:display_bottom
			
            },
            {
                extend: 'pdf',
                 footer: true,
           exportOptions: {
                columns: [0,1,2,3,4,5,6,7]
            },
			   title: display,
			   messageBottom:display_bottom
            },
            {
                extend: 'print',
                title:pntDisplay,
                messageBottom: display_bottom,
				exportOptions: {
                columns: [0,1,2,3,4,5,6,7]
            }
            }
        ]
    } );
} );
  </script>

  <script>

function fetchTaluk()
{
	var district=$("#inputDistrict").val();
	  $.ajax({
       type: "POST",
       url: "find_taluk.php",
	   data:"district="+district,
       cache: false,
       success: function(response)
       {
			
			var array = response.split(",");
			console.log(array)

$( "#inputTaluk" ).autocomplete({
	lookup: array
});
         
       }
     });
}
function fetchCon()
{
	var district=$("#inputDistrict").val();
	  $.ajax({
       type: "POST",
       url: "find_constituency.php",
	   data:"district="+district,
       cache: false,
       success: function(response)
       {
			
			var array = response.split(",");
			console.log(array)

$( "#inputConstituency" ).autocomplete({
	lookup: array
});
         
       }
     });
} 

  </script>

  </body>
</html>
