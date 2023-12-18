<?php
session_start();
error_reporting(0);
include('../Config/connection.php');
if(isset($_POST['resetpwd']))
  {
$username=$_POST['username'];
$contactNo=$_POST['contactNo'];
$newpassword=md5($_POST['newpassword']);
$sql =mysqli_query($con,"SELECT officerId FROM areaofficers WHERE username='$username' and contactNo='$contactNo'");
$rowcount=mysqli_num_rows($sql);

if($rowcount >0)
{
$query=mysqli_query($con,"update areaofficers set password='$newpassword' where username='$username' and contactNo='$contactNo'");
if($query){
echo "<script>alert('Your Password succesfully changed');</script>";
echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}else {
echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
}
}}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>CMS | Area Officer Password Recovery</title>
	<link rel="stylesheet" href="assets/css/style.css">
	<script type="text/javascript">
function valid()
{
if(document.passwordrecovery.newpassword.value!= document.passwordrecovery.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.passwordrecovery.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<h4>Complaint management system <hr /><span style="color:#fff;"> User Password Recovery</span></h4>
		<div class="card borderless">
			<div class="row align-items-center ">
				<div class="col-md-12">
					<form method="post" name="passwordrecovery" onSubmit="return valid();">
					<div class="card-body">
						<h4 class="mb-3 f-w-400">Reset Password</h4>
						<hr>
						<div class="form-group">
    
    <select name="institutionId" class="form-control" required>
        <option value="1">Wildlife</option>
        <option value="2">Forest</option>
    </select>
</div>	
						<div class="form-group mb-3">
							<input class="form-control" id="username" name="username" type="text" placeholder="Enter Your username" required />
						</div>
						<div class="form-group mb-3">
							<input type="text" class="form-control" placeholder="Contact Number" name="contactNo"  required>
						</div>
						<div class="form-group mb-3">
							<input type="password" class="form-control" placeholder="Password" name="newpassword" id="newpassword"  required>
						</div>
						<div class="form-group mb-3">
							<input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword"  required>
						</div>
						
						<button class="btn btn-block btn-primary mb-4"  type="submit" name="resetpwd">Reset</button>
						<hr>
						<p class="mb-2 text-muted"><a href="index.php" class="btn btn-primary">Signin</a></p>
					
					</div></form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>

<script src="admin/assets/js/pcoded.min.js"></script>



</body>

</html>
