<?php
	require('C:/xampp/htdocs/SDP_CW/Config/connection.php');
    $id=$_GET['updateId'];

    $sql="SELECT * from `currentcomplaints` where complaintId=$id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $status=$row['status'];

    //edit data 
	  if(isset($_POST["submit"])){
    $status=$_POST['status'];

    $query ="UPDATE `currentcomplaints` set complaintId=$id,status='$status' where complaintId=$id";
    mysqli_query($con, $query);
    echo '<script>
    window.location.href ="homepageW.php";
    alert("Updated successfully")        
    </script>';
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
   
  </head>
  <nav class="navbar bg-success" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Complaint Management System</a>      
      <div class="ml-auto">
        <div class="dropdown mt-3" style="margin-bottom: 10px;">                        
            <a class="btn btn-warning" href="login.php" role="button"><i class="fa-solid fa-arrow-right"></i> <span class="ms-1 d-none d-sm-inline">Logout</span></a>
        </div> 
      </div>
    </div>
  </nav>
  <body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="homepage.html" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">     
                          <div class="dropdown mt-3">                        
                            <a class="btn btn-secondary" href="homepage.php" role="button"><i class="fa-solid fa-arrow-right"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span></a>
                          </div> 
                          <br>  
                      </ul>                  
                    <hr>
                </div>
            </div>
            <div class="col py-3">
            <form method="post">
                    <div class="container">                    
                    <div class="mb-3">
                      <label>Status:</label>
                    <select class="form-select" name="status" required>
                        <option selected >Select status</option>
                        <option value="Open" <?php echo ($status == 'Open') ? 'selected' : ''; ?>>Open</option>
                        <option value="In progress" <?php echo ($status == 'In progress') ? 'selected' : ''; ?>>In progress</option>
                        <option value="Completed" <?php echo ($status == 'Completed') ? 'selected' : ''; ?>>Completed</option>
                      </select>
                    </div>
                    <!-- update button  -->
                    <div>
                        <button name="submit" type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>             
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>


