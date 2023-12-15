<?php

//error_reporting(0);
include('../Config/connection.php');

if(isset($_POST['submit']))
{
$complaintId=$_POST['complaints'];
$officerId=$_POST['investigationofficers'];
$appdate=$_POST['appdate'];
$description=$_POST['complaints'];
$query=mysqli_query($con,"insert into currentcomplaints(complaintId, officerId, description,date) values('$complaintId','$officerId','$appdate','$description')");
	if($query)
	{
		echo "<script>alert('Your assigned complaint successfuly');</script>";
	}


}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/systemAdmin/homepage.css">


    <link rel="stylesheet" href="assets/css/style.css">

  </head>
  <nav class="navbar bg-success" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Complaint Managment System</a>      
    </div>
  </div>
</nav>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

        <div class="container-fluid">
          <div class="row flex-nowrap">
              <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                  <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                      <a href="homepage.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                          <span class="fs-5 d-none d-sm-inline">Menu</span>
                      </a>
                      <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">                                                                
                          <div class="dropdown mt-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                              <i class="fa-solid fa-id-card-clip"></i> <span class="ms-1 d-none d-sm-inline">Complaints</span></a>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="all-complaint.php"><span class="ms-1 d-none d-sm-inline">All Complaints</span></a></li>
                              <li><a class="dropdown-item" href="notprocess-complaint.php"><span class="ms-1 d-none d-sm-inline">Pending</span></a></li>
                              <li><a class="dropdown-item" href="inprocess-complaint.php"><span class="ms-1 d-none d-sm-inline">In Process</span></a></li>
                              <li><a class="dropdown-item" href="closed-complaint.php"><span class="ms-1 d-none d-sm-inline">Closed</span></a></li>

                            </ul>
                          </div>      
                          <div class="dropdown mt-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                              <i class="fa-solid fa-file-shield"></i> <span class="ms-1 d-none d-sm-inline">Investigation</span></a>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="investigation-complain.php"><i class="fa-solid fa-tree"></i><span class="ms-1 d-none d-sm-inline">All Complaints</span></a></li>
                              <li><a class="dropdown-item" href="assign-complain.php"><i class="fa-solid fa-paw"></i><span class="ms-1 d-none d-sm-inline">Assign Complain</span></a></li>
                            </ul>
                          </div>     
                      </ul>                
                      <hr>
                  </div>
              </div>              
                <div class="row justify-content-center">
                    <div class="col py-3">
                    <!-- [ Main Content ] start -->
        <div class="row">
          
            <!-- [ form-element ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Investigation</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                            	<?php if(isset($_POST['submit']))
{?>
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                                    </div>
<?php } ?>


                                    <?php if(isset($_GET['del']))
{?>
<div class="alert alert-danger" role="alert">
                                    <strong>Oh snap!</strong>   <?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
                                    </div>
<?php } ?>

                                    <br />
                                <form method="post" name="investigationofficers">

                                <div class="form-group">
                                        <label for="officer">Investigator Officer</label>
                                        <select name="investigationofficers" class="form-control" required>
<option value="">Select Officer</option> 
<?php $query=mysqli_query($con,"select * from investigationofficers");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['officerId'];?>"><?php echo $row['firstName'];?></option>
<?php } ?>
</select>
                                        
                                    </div>

                                	
                                    <div class="form-group">
    <label for="complaints">complaints Id</label>
    <input type="text" placeholder="" name="complaintId" class="form-control" required>

    <?php
    $st = 'closed';
    if (isset($_GET['cid'])) {
        $cid = $_GET['cid'];
        $query = mysqli_query($con, "SELECT * FROM complaints WHERE complaintId ='$cid'");
        if ($query) {
            while ($row = mysqli_fetch_array($query)) {
                ?>
                <option value="<?php echo $row['complaintId']; ?>"><?php echo $row['complaintId']; ?></option>
                <?php
            }
        } else {
            echo "Query failed: " . mysqli_error($con);
        }
    } else {
        echo "Complaint ID not set.";
    }
    ?>
</select>
</div>

                                    

                                    <div class="form-group">
															<label for="AppointmentDate">
																Date
															</label>
<input class="form-control datepicker" name="appdate"  required="required" data-date-format="yyyy-mm-dd">
	
														</div>

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">SubCategory Name</label>
                                       
                                        <input type="text" placeholder="Enter SubCategory Name"  name="subcategory" class="form-control" required>
                                        
                                    </div>
                                
                                    <button type="submit" class="btn  btn-primary" name="submit">Add</button>
                                </form>
                            </div>
                           
                        </div>
                     <hr>
                      
                   
                    </div>
                </div>
          
            </div>
            <!-- [ form-element ] end -->
        </div>
        <!-- [ Main Content ] end -->
                   
                        
                    </div>
                </div>                  
          </div>
      </div>           
  </body>
</html>