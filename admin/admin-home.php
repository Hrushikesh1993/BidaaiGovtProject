<?php
session_start();
include'dbconnection.php';
include("function.php");
include("checklogin.php");
check_login();

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
                
                <div id="days" class="timer_box"><h1><?php echo get_count(1);?></h1><p>Received<br>Applications</p></div>
                <div id="hours" class="timer_box"><h1><?php echo get_count(2);?></h1><p>Eligibility<br>Check</p></div>
                <div id="minutes" class="timer_box"><h1><?php echo get_count(3);?></h1><p>Eligible<br>Applications</p></div>
                <div id="seconds" class="timer_box"><h1><?php echo get_count(4);?></h1><p>Rejected<br>Applications</p></div>
				<div id="seconds" class="timer_box"><h1><?php echo get_count(5);?></h1><p>Sanctioned<br>Applications</p></div>
            </div>
				</div>
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
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
