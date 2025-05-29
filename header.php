<?php 
include "connect.php";
ob_start();
session_start();
?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<!-- CSS
  ================================================== -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="plugins/mediaelement/mediaelementplayer.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
<link class="alt" href="colors/color1.css" rel="stylesheet" type="text/css">
<link href="style-switcher/css/style-switcher.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="path/to/flexslider.css" type="text/css" media="screen" />
<script src="path/to/jquery.min.js"></script>
<script src="path/to/jquery.flexslider.min.js"></script>

<!-- SCRIPTS
  ================================================== -->
<script src="js/js/modernizr.js"></script><!-- Modernizr -->
</head>
<body>
<div class="body" > 
  <!-- Start Site Header -->
  <header class="site-header">
    <div class="topbar">
      <div class="container">
        <div class="row" style="background-color:blue">
          <div class="col-md-8 col-sm-9 col-xs-8">
          </div>
          <div class="col-md-8 col-sm-6 col-xs-4">
            <a href="#" class="visible-sm visible-xs menu-toggle"><i class="fa fa-bars" style="color:white"></i></a> </div>
        </div>
      </div>           <center> <h3> <a href="index.php"><b style="color:green;width:100%"><strong>TAPACH </strong></b></a> </h3></center>
    </div>
    
    <div class="main-menu-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <nav class="navigation">
              <ul class="sf-menu">
                <li><a href="index.php">Home</a>
                 </li>
               	<?php
		if(!empty($_SESSION['customer'])) {   
						?>
                 <li><a href="#"><button class="btn btn-block btn-success">My Account</button></a>
				<ul class="dropdown">
                    <li><a href="main/main/myappointment-pending.php"><button class="btn btn-md btn-block btn-">Pending Registration</button></a></li>
                    <li><a href="main/main/myapproved_payment.php"><button class="btn btn-md btn-block btn-">Approved Registration</button></a></li>
                    <li><a href="main/main/completed.php"><button class="btn btn-md btn-block btn-">Completed Training</button></a></li>
                    <li><a href="main/main/attendance.php"><button class="btn btn-md btn-block btn-">Attendance</button></a></li>
                    <li><a href="main/main/inbox/inbox.php"><button class="btn btn-md btn-block btn-">Feedback</button></a></li>
                    <li><a href="main/main/logout.php"><button class="btn btn-md btn-block btn-">Logout</button></a></li>
                  </ul>
                </li>		<?php
					} else {
						?>
            <li><a href="#">Youth</a>
             <ul class="dropdown">
                <li><a href="main/main/registration.php">Register</a></li>
                <li><a href="main/main/login.php">Login</a></li>
              </ul>
            </li>
				                <li><a href="main/main/login-staff.php">Employees</a>
                </li>
                <?php	
					}
					?>
                <li><a href="#">Courses</a>
				<ul class="dropdown">
                    <li><a href="Carpentry.php">Carpentry </a></li>
                    <li><a href="Welding.php">Welding</a> </li>
                    <li><a href="Hairstyling.php">Hairstyling</a></li>
                    <li><a href="Tayloring.php">Tayloring</a></li>
                  </ul>
                </li>
                <li><a href="main/main/services/services.php">Mentorship Programme</a></li>
                <li><a href="#">MY CV</a>
				<ul class="dropdown">
                    <li><a href="main/main/services/build_cv.php">Build CV </a></li>
                    <li><a href="/TAPACH_YOUTH/main/main/CV.php">View My CV</a> </li>
                  </ul>
                </li>
                <li><a href="about.php">About</a>
                </li>
                <li><a href="main/main/faq.php">Help</a>
                </li>
                <li><a href="contactus.php">Contact Us</a> </li>
				</ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>