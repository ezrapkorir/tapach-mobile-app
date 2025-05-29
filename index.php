<?php include "header.php"; ?> 
<?php include "header1.php"; ?> 
<?php 
$statement = $pdo->prepare("SELECT * FROM tbl_bookings where status='Pending'");
$statement->execute();
$pendingbook = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_bookings where status='Approved'");
$statement->execute();
$approvedbook = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_bookings where status='Pending'");
$statement->execute();
$pendingpayment = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_bookings where status='Pending'");
$statement->execute();
$msg = $statement->rowCount();

?> 
<?php
		if(empty($_SESSION['customer'])) {   
						?>
<div>
  <ul class="slides"><br>
  <center><img src="images/tapach.jpg" style="width:80%"><br>
  </ul>
</div>
<hr>
<div class="container"><br>
	<center><a href="main/main/registration.php"><button class="btn btn-lg btn-primary">Register Here <i class="fa fa-user-plus"></i></button></a></center>
	<br>
  <center><a href="main/main/login.php"><button class="btn btn-lg btn-success">Login <i class="fa fa-user"></i></button></a></center>
</div><hr>
<?php
					} else {
						?>
            	<div class="col-md-3 search-area">
				<form class="navbar-form navbar-left" role="search" action="search-result.php" method="get">
					<?php $csrf->echoInputField(); ?>
					<div class="form-group">
						<input type="text" class="form-control search-top" placeholder="Search" name="search_text">
					</div>
					<button type="submit" class="btn btn-secondary">Search</button>
				</form>
			</div>
<section class="content">
<div class="container">
           <div class="col-lg-12 col-xs-12" style="background-color:#2FCB78; border: 1px solid #000;">
              <!-- small box -->
              <div class="small-box bg-white" >
                <div class="inner">
                  <h4><?php echo $pendingbook; ?></h4>
                <a href="main/main/myappointment-pending.php"><p style="color:maroon;font-size:28px"><i class="fa fa-file-text"></i></p></a>
                  <h4>Pending Registration</h4>
                </div>
              </div>
            </div><hr>
            <!-- ./col -->
            <div class="col-lg-12 col-xs-12" style="background-color:#2FCB78; border: 1px solid #000;">
              <!-- small box -->
              <div class="small-box bg-white" >
                <div class="inner">
                  <h4><?php echo $approvedbook; ?></h4>
                  <a href="main/main/myapproved_payment.php"><p style="color:maroon;font-size:28px"><i class="fa fa-check-square-o"></i></p></a>
                  <h4>Approved/Completd Registration</h4>
                </div>
              </div>
            </div>
 <hr>
 <div class="col-lg-12 col-xs-12"style="background-color:#2FCB78; border: 1px solid #000;">
              <!-- small box -->
              <div class="small-box " >
                <div class="inner">
                  <h4><?php echo $msg; ?></h4>
                  <a href="main/main/inbox/inbox.php"><p style="color:maroon;font-size:28px"><i class="fa fa-envelope"></i></p></a>
                  <h4>Messages</h4>
                </div>
              </div>
            </div>
		

		  </div>
		  
</section>
<?php	
					}
					?>
          <?php include "footer.php"; ?>