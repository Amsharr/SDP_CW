<?php
    require('C:/xampp/htdocs/SDP_CW/Config/connection.php');

    if(isset($_GET['updateId'])) {
        $id = $_GET['updateId'];

        $sql = "SELECT * FROM `complains` WHERE complainId = $id";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $userId = $row['userId'];
            $institutionId = $row['institutionId'];
            $Description = $row['Description'];
            $status = $row['status'];
            $dateTime = $row['dateTime'];
        } else {
            echo "Error retrieving data: " . mysqli_error($conn);
            exit;
        }
    }

    //edit data 
    if(isset($_POST["submit"])){
        $complainId = $_POST['complainId'];
        $userId = $_POST['userId'];
        $institutionId = $_POST['institutionId'];
        $Description = $_POST['Description'];
        $status = $_POST['status'];
        $dateTime = $_POST['dateTime'];

        $query = "UPDATE `complains` SET userId=?, institutionId=?, Description=?, status=?, dateTime=? WHERE complainId=?";
        $stmt = mysqli_prepare($conn, $query);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssssi", $userId, $institutionId, $Description, $status, $dateTime, $complainId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            echo '<script>
                window.location.href ="viewForestComplaints.php";
                alert("Updated successfully");
                </script>';
        } else {
            echo "Error updating data: " . mysqli_error($conn);
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
   
  </head>
  <nav class="navbar bg-success" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Complaint Management System</a>      
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
                          <div class="dropdown mt-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                              <i class="fa-solid fa-id-card-clip"></i> <span class="ms-1 d-none d-sm-inline">Users</span></a>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="viewComplainers.php"><i class="fa-solid fa-person"></i> <span class="ms-1 d-none d-sm-inline">Complainers</span></a></li>
                              <li><a class="dropdown-item" href="viewAreaOfficers.php"><i class="fa-solid fa-person-military-to-person"></i><span class="ms-1 d-none d-sm-inline">Area Officers</span></a></li>
                              <li><a class="dropdown-item" href="viewInvestigationOfficers.php"><i class="fa-solid fa-person-military-pointing"></i><span class="ms-1 d-none d-sm-inline"> Investigation Offiers</span></a></li>
                            </ul>
                          </div>      
                          <div class="dropdown mt-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                              <i class="fa-solid fa-file-shield"></i> <span class="ms-1 d-none d-sm-inline">Complaints</span></a>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="viewComplaints.php"><i class="fa-solid fa-tree"></i><span class="ms-1 d-none d-sm-inline">Forest</span></a></li>
                              <li><a class="dropdown-item" href="viewWildlifeComplaints.php"><i class="fa-solid fa-paw"></i><span class="ms-1 d-none d-sm-inline">Wildlife</span></a></li>
                            </ul>
                          </div>  
                          <div class="dropdown mt-3">                        
                            <a class="btn btn-secondary" href="http://localhost/phpmyadmin/index.php?route=/database/structure&db=cms" role="button"><i class="fa-solid fa-database"></i> <span class="ms-1 d-none d-sm-inline">database</span></a>
                          </div>    
                      </ul>                  
                    <hr>
                </div>
            </div>
            <div class="col py-3">
            <form method="post">
                    <div class="container">
                    <!-- userId -->
                    <div class="mb-3">
                        <label> user Id:</label>
                        <input type="number" name="userId"class="form-control" value=<?php echo $userId;?> required>
                    </div>
                    <!-- instituitionId -->
                    <div class="mb-3">
                        <label> Instituition Id:</label>
                        <input type="number" name="instituitionId" min=1 max=2 class="form-control" placeholder="1 for Wildlife | 2 for Forest" value=<?php echo $institutionId;?> required>
                    </div>
                    <!-- Description -->
                    <div class="mb-3">
                        <label> Description: </label>
                        <input type="text" name="Description" class="form-control" autofocus="on" value=<?php echo $Description;?> required>                     
                    </div>
                    <!-- Status -->
                    <!-- <div class="mb-3">
                        <label> Status: </label>
                        <input type="dropdown" name="Status" class="form-control" autofocus="on" value=<?php echo $status;?> required>                     
                    </div> -->

                    <select class="form-select" name="status" value=<?php echo $status;?> required>
                        <option value="1">Investigate</option>
                        <option value="2">Under investigation</option>
                        <option value="3">Completed investigation</option>
                    </select>
                    <!-- Date/time -->
                    <div class="mb-3">
                        <label> Date & Time: </label>
                        <input type="datetime-local" name="dateTime" class="form-control" autofocus="on" value=<?php echo $dateTime;?> required>                     
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


