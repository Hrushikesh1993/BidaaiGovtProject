<?php
session_start();
include'dbconnection.php';
include("function.php");
include("checklogin.php");
check_login();
$sql="";
$district="";
if(isset($_POST['searchButton']))
{
	$district=strtolower($_POST['district']);
	$dist_code=find_district_code($district);
	$sql = "select * from ".$dist_code.'_view'." group by financial_year desc";

  	
}
else
{
$sql = "select * from full_union";	
}


$query=mysqli_query($con,$sql);
$status_0=0;
$status_1=0;
$status_2=0;
$status_3=0;
$status_4=0;
$totals=0;
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
		<style>

	.timer_box{
    margin: 35px 24px;
    display: inline-block;
    padding: 20px 12px 0px 12px;
    text-align: center;
    width: 130px;
    border-radius: 50%;
        border: 4px solid #ffd777;
}
.timer_box h1{
    font-size: 48px;
    margin-top: 5px;
    margin-bottom: 0px;
    font-family: "Lato","Helvetica Neue",Helvetica,Arial,sans-serif;
    color: black;
}
.timer_box p{ margin-top: 0px;}
	</style>
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
              	  <h5 class="centered"><?php echo strtoupper ($_SESSION['login']);?></h5>
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
	            <div class="container" id="printCnt">
				<div class="row">
							<div id="timer" data-animated="FadeIn" align="center">
			<img alt="Brand" src="assets/img/gokdom_new.png" class="img-responsive">
			<div class="col-md-1"></div>
			<div class="col-md-10"><form action="" method="POST" id="searchForm">
										<div class="col-md-12" id="searchBlock">
										<div class="form-group col-md-3"> 
										<input type="text" class="form-control" placeholder="Search for District.." name="district" id="inputDistrict" onfocus="fetchId()" required></div>
										<div class="form-group col-md-1"> 
										<button type="submit" name="searchButton" id="searchButton" class="btn btn-primary"><i class="fa fa-search"></i></button>
										</div>
										<div class="col-md-4">
										<h3 align="center"><?php echo strtoupper($district);?> REPORT</h3>
										</div><div class="col-md-4"></div></div>
										</form></div>
			<div class="col-md-1"></div>
											            
				</div>
				</div>
				<div class="row">

		   <div class="col-md-1"></div>
				<div class="col-md-10"id="divToPrint">
				<div class="table-responsive">
				<table class="table" align="center">
    <thead>
      <tr class="success">
		<th><h4>District</h4></th>
        <th><h4>Financial Year</h4></th>
        <th><h4>Received Application</h4></th>
		<th><h4>Eligibility Check</h4></th>
        <th><h4>Eligibile Application</h4></th>
		<th><h4>Sanctioned Application</h4></th>
		<th><h4>Fund Released</h4></th>
		<th><h4>Rejected Application</h4></th>
      </tr>
    </thead>
    <tbody>
<?php
while($row=mysqli_fetch_assoc($query))
{
		$status_0=$status_0+$row['status_0'];
		$status_1=$status_1+$row['status_1'];
		$status_2=$status_2+$row['status_2'];
	    $status_3=$status_3+$row['status_3'];
		$status_4=$status_4+$row['status_4'];
		$totals=$totals+$row['totals'];

?>
      <tr class="warning">
		<td><h5><?php echo strtoupper($row['district']);?></h5></td>
        <td><h5><?php echo $row['financial_year'];?></h5></td>
		<td><h5><?php echo $row['totals'];?></h5></td>
        <td><h5><?php echo $row['status_1'];?></h5></td>
        <td><h5><?php echo $row['status_2'];?></h5></td>
		<td><h5><?php echo $row['status_3'];?></h5></td>
		<td><h5><?php echo $row['status_4'];?></h5></td>
		<td><h5><?php echo $row['status_0'];?></h5></td>
      </tr>      
<?php
}
?>
      <tr class="warning">
        <td><h5>Total</h5></td>
		<td></td>
		<td><h5><?php echo $totals;?></h5></td>
        <td><h5><?php echo $status_1;?></h5></td>
        <td><h5><?php echo $status_2;?></h5></td>
		<td><h5><?php echo $status_3;?></h5></td>
		<td><h5><?php echo $status_4;?></h5></td>
		<td><h5><?php echo $status_0;?></h5></td>
      </tr> 

      
    </tbody>
  </table>
				</div>
				</div>
				<div class="col-md-1"></div>
			
				
            
			
				</div>
				<div class="row"><div align="center"><button class="btn btn-primary" id="print_home" onclick="printDiv()">Print</button></div></div>

				</div>
			</section>
						
           </section>
	  </section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
<script src="assets/js/autocomplete/src/jquery.autocomplete.js"></script>
	<script src="assets/js/autocomplete/scripts/jquery.mockjax.js"></script>
  <script>
function fetchId()
{
	  $.ajax({
       type: "POST",
       url: "find_user.php",
       cache: false,
       success: function(response)
       {
			
			var array = response.split(",");
			console.log(array)

$( "#inputDistrict" ).autocomplete({
	lookup: array
});
         
       }
     });
}   
    function printDiv()
	  {
		   var divToPrint = document.getElementById('printCnt');
           var popupWin = window.open('', '_blank', 'width=300,height=300');
            popupWin.document.open();
             popupWin.document.write("<html><head><link href='assets/font-awesome/css/font-awesome.css' rel='stylesheet' /><link href='assets/css/style.css' rel='stylesheet'><style>table, th, td {border: 1px solid black; padding: 5px; text-align: center;}img{ display: block;margin-left: auto;margin-right: auto;width: 30%;}#inputDistrict,#searchButton,#print_home{display: none;} </style></head><body onload='window.print()' style='border: solid black; border-width: thin;'>" + divToPrint.innerHTML + "</html>");
            popupWin.document.close();
			
	  }
  </script>

  </body>
</html>
