<?php
session_start();
error_reporting(0);
include('../Config/connection.php');
if(isset($_POST['submit']))
{
   $username=$_POST['username'];
   $password=md5($_POST['password']);
   $institutionId=$_POST['institutionId'];
$query=mysqli_query($con,"SELECT officerId ,institutionId,firstName, lastName FROM investigationofficers WHERE username='$username' and password='$password'");
$num=mysqli_fetch_array($query);
//If Login Suceesfull
if($num>0 && $institutionId==1)
{
$_SESSION['login']=$_POST['username'];
$_SESSION['officerId']=$num['officerId'];
$_SESSION['username']=$num['name'];
echo "<script>alert('Login Successful');</script>";

echo "<script type='text/javascript'> document.location ='homepageW.php'; </script>";
}
elseif($num> 0 && $institutionId== 2){
$_SESSION['login']=$_POST['username'];
$_SESSION['officerId']=$num['officerId'];
$_SESSION['username']=$num['name'];
echo "<script>alert('Login Successful');</script>";

echo "<script type='text/javascript'> document.location ='homepageF.php'; </script>";	
}
//If Login Failed
else{
    echo "<script>alert('Invalid login details');</script>";
    echo "<script type='text/javascript'> document.location ='login.php'; </script>";
exit();
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>
<body>
 
<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<h4>Complaint management system <hr /><span style="color:#fff;"> Investigatior officers Login</span></h4>
		<div class="card borderless">
			<div class="row align-items-center ">
				<div class="col-md-12">
					<form method="post">
						
					<div class="card-body">
						<h4 class="mb-3 f-w-400">Signin</h4>
						<hr>
						<div class="form-group mb-3">
							<div class="mb-3">
							<select name="institutionId" class="form-control" required>
								<option value="1">Wildlife</option>
								<option value="2">Forest</option>
							</select>
							</div>
							<input type="text" name="username" id="username" class="form-control" onBlur="emailAvailability()" required placeholder="username">
						</div>
						<div class="form-group mb-4">
							
							<input type="password" name="password" class="form-control" required placeholder="Enter Password">
						</div>
						
						<button class="btn btn-block btn-primary mb-4"  type="submit" name="submit">Signin</button>
						<hr>
						<p class="mb-2 text-muted">Forgot password? <a href="reset-password.php" class="f-w-400">Reset</a></p>

						
		          
					</div></form>
		
		                <i class="fa fa-home" aria-hidden="true"><a class="" href="../index.html">
		                    Back Home
		                </a></i>
		            
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>





</body>
</html>
