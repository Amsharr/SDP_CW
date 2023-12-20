
<?php
// session_start();
error_reporting(0);
include('../../Config/connection.php');
if (!isset($_SESSION['userId']) || empty($_SESSION['userId'])) {
    header('location:index.php');
}

$userId = $_SESSION['userId'];
?>
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
		
			
				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
					<a href="index.php" class="b-brand">
						<!-- ========   change your logo hear   ============ -->
						<strong>Complaint Management</strong>
					</a>
					<a href="#!" class="mob-toggler">
						<i class="feather icon-more-vertical"></i>
					</a>
				</div>
				<div class="collapse navbar-collapse">
				
					<ul class="navbar-nav ml-auto">
						
						<li>
							<div class="dropdown drp-user">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="feather icon-user"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right profile-notification">
									<div class="pro-head">
										<img src="assets/images/user/user.png" class="img-radius" alt="User-Profile-Image">
										<?php

$ret=mysqli_query($con,"select firstName from complainers");
$row=mysqli_fetch_array($ret);
$name=$row['firstName'];

?>
										<span> <?php echo $name; ?></span>
										<a href="login.php" class="dud-logout" title="Logout">
											<i class="feather icon-log-out"></i>
										</a>
									</div>
									<ul class="pro-body">
										<li><a href="profile.php" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
										<li><a href="login.php" class="dropdown-item"><i class="feather icon-lock"></i> Logout</a></li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
				
			
	</header>