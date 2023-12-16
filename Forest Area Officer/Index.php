

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
    <a class="navbar-brand" href="index.php">Complaint Managment System</a>      
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
                          <!-- <span class="fs-5 d-none d-sm-inline">Menu</span> -->
                      </a>
                      <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">                                                                
                          <div class="dropdown mt-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                              <i class="fa-solid fa-id-card-clip"></i> <span class="ms-1 d-none d-sm-inline">Complaints</span></a>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="all-complaint.php"><span class="ms-1 d-none d-sm-inline">All Complaints</span></a></li>
                              <li><a class="dropdown-item" href="investigation-complain.php"><span class="ms-1 d-none d-sm-inline">Assigned Complaints</span></a></li>
                            </ul>
                          </div>      
                          <div class="dropdown mt-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                              <i class="fa-solid fa-file-shield"></i> <span class="ms-1 d-none d-sm-inline">Status</span></a>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="notprocess-complaint.php"><span class="ms-1 d-none d-sm-inline">Pending</span></a></li>
                              <li><a class="dropdown-item" href="inprocess-complaint.php"><span class="ms-1 d-none d-sm-inline">In Process</span></a></li>
                              <li><a class="dropdown-item" href="closed-complaint.php"><span class="ms-1 d-none d-sm-inline">Closed</span></a></li></ul>
                          </div> 
                          <div class="dropdown mt-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                              <i class="fa-solid fa-file-shield"></i> <span class="ms-1 d-none d-sm-inline">My Profile</span></a>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="user-profile.php"><span class="ms-1 d-none d-sm-inline">Profile</span></a></li>
                              <li><a class="dropdown-item" href="../index.html"><span class="ms-1 d-none d-sm-inline">Logout</span></a></li>
                          </div>     
                      </ul>                
                      <hr>
                  </div>
              </div>              
                <div class="row justify-content-center">
                    <div class="col py-3">
                      <h1>Dashboard</h1>
                        <div class="dashboardItems">
                            <div class="card" style="width: 18rem;">
                                <img src="../img/systemAdmin/Forest.jpg" class="card-img-top" alt="wildlife image">
                                <div class="card-body">
                                    <h5 class="card-title">Forest Complaints</h5>
                                    <p class="card-text"> Click on the below button to view the complaints for the Forest Institution</p>
                                    <a href="all-complaint.php" class="btn btn-warning"><i class="fa-solid fa-arrow-right"></i><span class="ms-1 d-none d-sm-inline">Go to Complaints</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="dashboardItems">
                            <div class="card" style="width: 18rem;">
                                <img src="../img/systemAdmin/users.jpg" class="card-img-top" alt="Forest image">
                                <div class="card-body">
                                    <h5 class="card-title">Assigned Complaints</h5>
                                    <p class="card-text">Click on the below button to view the assigned complaints for the investigator officers.</p>
                                    <a href="investigation-complain.php" class="btn btn-success"><i class="fa-solid fa-arrow-right"></i><span class="ms-1 d-none d-sm-inline">Go to Complaints</span></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>                  
          </div>
      </div>           
  </body>
</html>