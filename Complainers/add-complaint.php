<?php
session_start();
include('../Config/connection.php');
error_reporting(0);
if(strlen($_SESSION['userId'])==0)
    {   
header('location:index.php');
}


if(isset($_POST["submit"])){ 
    $complaintId=$_POST['complaintId'];
    $userId=$_POST['userId'];
    $institutionId=$_POST['institutionId'];
    $description=$_POST['description'];
    $location=$_POST['location'];
    $complaintFile=$_FILES['complaintFile']["name"];

    $status=$_POST['status'];
    $date=$_POST['date'];

		


// get the image extension
$extension = substr($complaintFile,strlen($complaintFile)-4,strlen($complaintFile));

// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif",".pdf",".PDF",".doc","docx");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename the image file
$compfilenew=md5($complaintFile).$extension;

// Code for move image into directory
move_uploaded_file($_FILES["complaintFile"]["tmp_name"],"complaintdocs/".$compfilenew);

$query = "INSERT INTO complaints VALUES('$complaintId', '$userId'.'$institutionId', '$description', '$location', '$complaintFile','$status', '$date')";
		mysqli_query($conn, $query);
if (!$query) {
    die("Query failed: " . mysqli_error($con));
}



// code for show complaint number
$sql=mysqli_query($con,"select complaintId from complaints  order by complaintId desc limit 1");
while($row=mysqli_fetch_array($sql))
{
 $cmpn=$row['complaintId'];
}
$complainno=$cmpn;
echo '<script> alert("Your complain has been successfully filled and your complaintno is  "+"'.$complainno.'")</script>';
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>CMS||Register Complaint</title>
   

    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- flatpickr CSS -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(document).ready(function () {
            flatpickr(".datepicker", {
                dateFormat: "Y-m-d",
                required: true,
            });
        });
    </script>
   
<script>
    
</script>
</head>
<body class="">
	<?php include('include/sidebar.php');?>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<?php include('include/header.php');?>

<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">New Complaint</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="add-complaint.php">Add Complaint</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
          
            <!-- [ form-element ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Add Complaint</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                            	
                                    <br />
                              <form method="post" name="complaint" enctype="multipart/form-data">
                                         <div class="form-group">
                                            <label for=""></label>
                                            <select class="form-select" aria-label="Default select example" required name="institutionId" >
                          <option selected disabled>Select an instituition</option>
                          <option value="1">Wildlife</option>
                          <option value="2">Forest</option>
                      </select>
                                        </div>

                                    <div class="form-group">
                                        <label for="">Complaint Details (max 2000 words)</label>
                                        <textarea  name="description" required="required" cols="10" rows="10" class="form-control" maxlength="2000"></textarea>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="">Location</label>
                                       <input type="text" name="location" required="required" value="" required="" class="form-control">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="">Complaint Related (any file)</label>
                                        <input type="file" name="complaintFile" class="form-control" value="">
                                        
                                    </div>

                                     <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="text" class="form-control datepicker" name="date" required="required">
                                        </div>
                                     
                                     
                                     
                                     
                                    <button type="submit" class="btn  btn-primary" name="submit">Submit</button>
                                </form>
                            </div>
                           
                        </div>
             
                   
                    </div>
                </div>
          
            </div>
            <!-- [ form-element ] end -->
        </div>
        <!-- [ Main Content ] end -->

    </div>
</section>


    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>




</body>

</html>
