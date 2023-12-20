<?php
    include('C:/xampp/htdocs/SDP_CW/Config/connection.php');
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
            <a class="btn btn-warning" href="../login.php" role="button"><i class="fa-solid fa-arrow-right"></i> <span class="ms-1 d-none d-sm-inline">Logout</span></a>
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
                            <a class="btn btn-secondary" href="../homepage.php" role="button"><i class="fa-solid fa-arrow-right"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span></a>
                          </div>   
                          <br>                                                        
                          <div class="dropdown mt-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                              <i class="fa-solid fa-id-card-clip"></i> <span class="ms-1 d-none d-sm-inline">Users</span></a>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="../complainers/viewComplainers.php"><i class="fa-solid fa-person"></i> <span class="ms-1 d-none d-sm-inline">Complainers</span></a></li>
                              <li><a class="dropdown-item" href="../AreaOfficers/viewAreaOfficers.php"><i class="fa-solid fa-person-military-to-person"></i><span class="ms-1 d-none d-sm-inline">Area Officers</span></a></li>
                              <li><a class="dropdown-item" href="../InvestigationOfficer/viewInvestigationOfficers.php"><i class="fa-solid fa-person-military-pointing"></i><span class="ms-1 d-none d-sm-inline"> Investigation Offiers</span></a></li>
                            </ul>
                          </div>      
                          <div class="dropdown mt-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                              <i class="fa-solid fa-file-shield"></i> <span class="ms-1 d-none d-sm-inline">Complaints</span></a>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="../ForestComplaints/viewForestComplaints.php"><i class="fa-solid fa-tree"></i><span class="ms-1 d-none d-sm-inline">Forest</span></a></li>
                              <li><a class="dropdown-item" href="../WildlifeComplaints/viewWildlifeComplaints.php"><i class="fa-solid fa-paw"></i><span class="ms-1 d-none d-sm-inline">Wildlife</span></a></li>
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
        <h3>Complainers details</h3>
        <div>
            <a href="addUser.php">
                <button name="Add" type="Add" class="btn btn-success">Add user</button>
            </a>            
        </div>
        <br>
        <div>
        <form method="post">
            <div style="display: flex; align-items: center;">
              <div style="margin-right: 10px;">
                <input type="number" id="userId" name="userId" class="form-control" placeholder="Enter UserId" >
              </div>
              <div>
                <input type="submit" value="Filter" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
        <br>          
        <table class="table table-bordered">
            <thead>
                <tr>
                <th >user Id</th>
                <th >First Name</th>
                <th >Last Name</th>
                <th>Address</th>
                <th >Contact No.</th>
                <th >Email</th>
                <th>Username</th> 
                <th>Password</th>  
                <th>Operations</th>        
                </tr>
            </thead>
            <tbody>

            <?php
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $userId = $_POST['userId'];

                  // Check if $userId is empty
                  if (!empty($userId)) {
                      $sql = "SELECT * FROM `complainers` WHERE userID = '$userId'";
                  } else {
                      // If $userId is empty, fetch all records
                      $sql = "SELECT * FROM `complainers`";
                  }
                  
              } else {
                  // If no form is submitted, display all records
                  $sql = "SELECT * FROM `complainers`";
              }
                
                $result=mysqli_query($con,$sql);
                if($result){
                while($row=mysqli_fetch_assoc($result)){
                    $id=$row['userId'];
                    $firstName=$row['firstName'];
                    $lastName=$row['lastName'];
                    $address=$row['address'];
                    $contactNo=$row['contactNo'];
                    $email=$row['email'];
                    $username=$row['username'];
                    $password=$row['password'];
                    echo'<tr>
                    <td scope="row">'.$id.'</td>
                    <td>'.$firstName.'</td>
                    <td>'.$lastName.'</td>
                    <td>'.$address.'</td>
                    <td>'.$contactNo.'</td>
                    <td>'.$email.'</td>
                    <td>'.$username.'</td>
                    <td>'.str_repeat('*', strlen($password)).'</td>
                    <td>
                    <button class="btn btn-primary" name="edit"><a href="editUser.php?updateId='.$id.'" class="text-light">EDIT</a></button>
                    <button class="btn btn-danger" name="delete"><a href="deleteUser.php?deleteid='.$id.'" class="text-light">DELETE</a></button>                  
                    </td>                           
                    </tr>';
                }
                
                }
                ?>
            </tbody>
        </table>
      </div>             
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>