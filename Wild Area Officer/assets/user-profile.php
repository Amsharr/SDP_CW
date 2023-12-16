<?php
session_start();
include('../Config/connection.php');

if (strlen($_SESSION['aid']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $contactNo = $_POST['contactNo'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $officerId = $_SESSION["officerId"];
        $instituitionId = $_SESSION["instituitionId"];
        


        $sql = mysqli_query($con, "update areaofficers set firstName='$firstName',lastName='$lastName', contactNo='$contactNo', username='$username' password='$password'  where officerId='$officerId and instituitionId = 1'");
        echo "<script>alert('Profile Updated successfully');</script>";
        echo "<script>window.location.href='admin-profile.php'</script>";
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
    <!-- flatpickr CSS -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <script>
        $(document).ready(function () {
            flatpickr(".datepicker", {
                dateFormat: "Y-m-d",
                required: true,
            });
        });
    </script>
</head>

<nav class="navbar bg-success" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Complaint Managment System</a>
    </div>
</nav>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="homepage.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
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
                                <li><a class="dropdown-item" href="closed-complaint.php"><span class="ms-1 d-none d-sm-inline">Closed</span></a></li>
                            </ul>
                        </div>
                    </ul>
                    <hr>
                </div>
            </div>
            <!-- [ Main Content ] start -->
            <div class="col py-3">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Area Officer Profile</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="admin-profile.php">Area Officer Profile</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
            <div class="col py-3">

        <div class="row">
          
            <!-- [ form-element ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Area Officer Profile</h5>
                    </div>
                    <div class="card-body">
                        <h5>View and Update Your Profile</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                            	<?php
$officerId=intval($_SESSION["officerId"]);
$query=mysqli_query($con,"select * from areaofficers where officerId='$officerId and instituitionId = 1'");
while($row=mysqli_fetch_array($query))
{
?>	
                                <form method="post">
                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <input type="text" value="<?php echo  htmlentities($row['firstName']);?>"  name="firsttName" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label for="">Last Name</label>
                                        <input type="text" value="<?php echo  htmlentities($row['lastName']);?>"  name="lastName" class="form-control" >
                                    </div>

                                       <div class="form-group">
                                        <label for="">Contact Number</label>
                                        <input type="text" value="<?php echo  htmlentities($row['contactNo']);?>"  name="contactNo" class="form-control" >
                                        
                                    </div>
                                       <div class="form-group">
                                        <label for="exampleInputEmail1">Username</label>
                                        <input type="text" value="<?php echo  htmlentities($row['username']);?>"  name="username" class="form-control" >
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="text" value="<?php echo  htmlentities($row['password']);?>"  name="password" class="form-control" readonly>
                                    </div>                                
                                    <button type="submit" class="btn  btn-success" name="submit">Submit</button>
                                </form><?php } ?>
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
          
        </div>
    </div>
    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
</body>

</html>

