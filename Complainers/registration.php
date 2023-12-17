<?php
include('../Config/connection.php');
error_reporting(0);
if(isset($_POST['submit']))
{
	$firstName=$_POST['firstName'];
	$lastName=$_POST['lastName'];
	$address=$_POST['address'];
	$contactNo=$_POST['contactNo'];
    $email=$_POST['email'];
	$username=md5($_POST['username']);
    $password=$_POST['password'];
	
	$status=1;
	$query=mysqli_query($con,"insert into complainers(firstName,lastName,address,contactNo,contactNo,email,username,password,status) values('$firstName','$lastName','$address','$contactNo','$email','$username','$password','$status')");
	
	echo "<script>alert('Registration successfull. Now You can login');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="assets/css/style.css">
    <script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
</head>
<body>
    <!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
				<h4> <hr /><span style="color:#fff;">User Registration</span></h4>
				<hr />
		<div class="card borderless">
			<div class="row align-items-center ">
				<div class="col-md-12">
					<form method="post">
						
					<div class="card-body">
				
				
						<div class="form-group mb-3">
							
							<input type="text" class="form-control" placeholder="Full Name" name="firstName" required="required" autofocus>
						</div>
                        <div class="form-group mb-3">
							
							<input type="text" class="form-control" placeholder="Last Name" name="lastName" required="required" autofocus>
						</div>
                        <div class="form-group mb-3">
							
							<input type="text" class="form-control" placeholder="Address" name="address" required="required" autofocus>
						</div>
                        <div class="form-group mb-3">
							
							<input type="text" class="form-control" maxlength="10" name="contactNo" placeholder="Contact no" required="required" autofocus>
						</div>
						

						<div class="form-group mb-4">
							
							<input type="email" class="form-control" placeholder="Email ID" id="email" onBlur="userAvailability()" name="email" required="required">
		             <span id="user-availability-status1" style="font-size:12px;"></span>
						</div>
						<div class="form-group mb-3">	
							<input type="text" class="form-control" placeholder="Username" required="required" name="username"><br >
						</div>
						<div class="form-group mb-3">	
							<input type="password" class="form-control" placeholder="Password" required="required" name="password"><br >
						</div>
						<button class="btn btn-block btn-primary mb-4"  type="submit" name="submit"  ><a href="homepage.php">Register</a></button>
						<hr>
						
					</div></form>
					 <i class="fa fa-home" aria-hidden="true"><a class="" href="../index.php">
		                    Back Home
		                </a></i>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->
</body>
</html>