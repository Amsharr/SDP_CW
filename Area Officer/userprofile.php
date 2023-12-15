<?php
session_start();
include('../Config/connection.php');

 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Profile</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<?php 

$ret1=mysqli_query($con,"select * FROM complainers where userId='".$_GET['uid']."'");
while($row=mysqli_fetch_array($ret1))
{
?>

    
  
		
    <tr>
      <td colspan="2" style="text-align:center"><b>User Profile Details</b></td>
      
    </tr>
    
    <tr height="50">
      <td><b>First Name:</b></td>
      <td><?php echo htmlentities($row['firstName']); ?></td>
    </tr>

    <tr height="50">
      <td><b>Last Name:</b></td>
      <td><?php echo htmlentities($row['lastName']); ?></td>
    </tr>
    
    <tr height="50">
      <td><b>Email:</b></td>
      <td><?php echo htmlentities($row['email']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Address:</b></td>
      <td><?php echo htmlentities($row['address']); ?></td>
    </tr>


      <tr height="50">
      <td><b>State:</b></td>
      <td><?php echo htmlentities($row['state']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Contact:</b></td>
      <td><?php echo htmlentities($row['contactNo']); ?></td>
    </tr>
    
    <tr>
  
      <td colspan="2">   
      <input name="Submit2" type="submit" class="txtbox4" value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>
   
    <?php } 

 
    ?>
 
</table>
 </form>
</div>

</body>
</html>
