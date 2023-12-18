<?php
	require('C:/xampp/htdocs/SDP_CW/Config/connection.php');

	if(isset($_POST["submit"])){ 
        $institutionId=$_POST['institutionId'];
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $contactNo=$_POST['contactNo'];
        $position=$_POST['position'];                    
        $username=$_POST['username'];
        $password=md5($_POST['password']);

		$query = "INSERT INTO investigationofficers VALUES('', '$institutionId','$firstName', '$lastName', '$contactNo', '$position', '$username', '$password')";
		mysqli_query($con, $query);
		echo '<script>
      	window.location.href ="viewInvestigationOfficers.php";
        alert("Officer Account added")        
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
                    <!-- instituitionId -->
                    <div class="mb-3">
                      <label> Instituition:</label>
                      <select class="form-select" aria-label="Default select example" name="institutionId" required>
                        <option selected disabled>Select an instituition</option>
                        <option value="1">Wildlife</option>
                        <option value="2">Forest</option>
                      </select>
                    </div>
                    <!-- First Name -->
                    <div class="mb-3">
                        <label>First Name:</label>
                        <input type="text" name="firstName" class="form-control" autofocus="on" required>                     
                    </div>
                    <!-- Last Name -->
                    <div class="mb-3">
                        <label>Last Name:</label>
                        <input type="text" name="lastName" class="form-control" required>
                    </div>
                    <!-- contact No. -->
                    <div class="mb-3">
                        <label>Contact No.:</label>
                        <input type="text" name="contactNo" max=12 class="form-control" autofocus="on" required>                     
                    </div>
                    <div class="mb-3">
                      <label>Position:</label>
                      <select class="form-select" name="position" required>
                        <option selected disabled>Select position</option>
                        <option value="Junior">Junior</option>
                        <option value="Senior">Senior</option>
                        <option value="Captain">Captain</option>
                      </select>
                    </div>                    
                    <!-- Username -->
                    <div class="mb-3">
                        <label> Username: </label>
                        <input type="text" name="username" class="form-control" autofocus="on" required>                     
                    </div>
                    <!-- Password -->
                    <div class="mb-3">
                        <label> Password: </label>
                        <input type="password" name="password" class="form-control" autofocus="on" required>                     
                    </div>
                    <!-- Add button  -->
                    <div>
                        <button name="submit" type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>             
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>


