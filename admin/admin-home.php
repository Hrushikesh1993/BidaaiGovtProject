<?php
session_start();
include'dbconnection.php';
include("function.php");
include("checklogin.php");
check_login();
 $sql = "select DISTINCT financial_year as financial_year,\n"

    . "   count(distinct case when status = 1 then app_id end) as status_1, \n"

    . "   count(distinct case when status = 0 then app_id end) as status_0,\n"

    . "   count(distinct case when status = 2 then app_id end) as status_2,\n"

    . "   count(distinct case when status = 3 then app_id end) as status_3,\n"

    . "   count(distinct case when status = 4 then app_id end) as status_4,\n"

    . "   count(distinct app_id) as totals\n"

    . "from application_table where created_by='".$_SESSION['login']."'\n"

    . "group by financial_year DESC";
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
table,tr,td,th{
text-align:center;
}
h3,h4,h5{
	font-weight:bold;
	color:black;
}
	</style>
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
	            <div class="container">
				
				<div class="row">
			<div id="timer" data-animated="FadeIn" align="center">
							<img alt="Brand" src="assets/img/gokdom_new.png" class="img-responsive">
							<h3 align="center"><?php echo strtoupper($_SESSION['login']);?></h3>
                <div class="col-md-1"></div>
				<div class="col-md-10"id="divToPrint">
				<div class="table-responsive">
				<table class="table" align="center">
    <thead>
      <tr class="success">
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
			
				</div>
				<div class="row"><div align="center"><button class="btn btn-primary" id="print_home" onclick="printDiv()">Print</button></div></div>

				</div>
			</section>
						
           </section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
<script>
	
		 
      function printDiv()
	  {
		   var divToPrint = document.getElementById('timer');
           var popupWin = window.open('', '_blank', 'width=300,height=300');
            popupWin.document.open();
             popupWin.document.write("<html><head><link href='assets/font-awesome/css/font-awesome.css' rel='stylesheet' /><link href='assets/css/style.css' rel='stylesheet'><style>table, th, td {border: 1px solid black; padding: 5px; text-align: center;}img{ display: block;margin-left: auto;margin-right: auto;width: 30%;}</style></head><body onload='window.print()' style='border: solid black; border-width: thin;'>" + divToPrint.innerHTML + "</html>");
            popupWin.document.close();
			
	  }
	  
	
</script>

  </body>
</html>
