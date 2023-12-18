<?php
session_start();
error_reporting(0);
include('../../Config/connection.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../../CSS/systemAdmin/homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <script language="javascript" type="text/javascript">
        var popUpWin = 0;

        function popUpWindow(URLStr, left, top, width, height) {
            if (popUpWin) {
                if (!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr, 'popUpWin',
                'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='
                + 600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top +
                '');
        }
    </script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<nav class="navbar bg-success" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Complaint Managment System</a>      
    </div>
  </div>
</nav>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div
                    class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="homepage.php"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <!-- <span class="fs-5 d-none d-sm-inline">Menu</span> -->
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <div class="dropdown mt-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown">
                                <i class="fa-solid fa-id-card-clip"></i> <span
                                    class="ms-1 d-none d-sm-inline">Complaints</span></a>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="all-complaint.php"><span
                                            class="ms-1 d-none d-sm-inline">All Complaints</span></a></li>
                                <li><a class="dropdown-item" href="investigation-complain.php"><span
                                            class="ms-1 d-none d-sm-inline">Assigned Complaints</span></a></li>
                            </ul>
                        </div>
                        <div class="dropdown mt-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown">
                                <i class="fa-solid fa-file-shield"></i> <span
                                    class="ms-1 d-none d-sm-inline">Status</span></a>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="notprocess-complaint.php"><span
                                            class="ms-1 d-none d-sm-inline">Pending</span></a></li>
                                <li><a class="dropdown-item" href="inprocess-complaint.php"><span
                                            class="ms-1 d-none d-sm-inline">In Process</span></a></li>
                                <li><a class="dropdown-item" href="closed-complaint.php"><span
                                            class="ms-1 d-none d-sm-inline">Closed</span></a></li>
                            </ul>
                        </div>
                        <div class="dropdown mt-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                              <i class="fa-solid fa-file-shield"></i> <span class="ms-1 d-none d-sm-inline">My Profile</span></a>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="user-profile.php"><span class="ms-1 d-none d-sm-inline">Profile</span></a></li>
                              <li><a class="dropdown-item" href="../../index.html"><span class="ms-1 d-none d-sm-inline">Logout</span></a></li>
                          </div>
                    </ul>
                    <hr>
                </div>
            </div>

            <!-- [ Main Content ] start -->
            <div class="col py-3">
                <!-- [ Main Content ] start -->
                <section class="">
                    <div class="pcoded-content">
                        <!-- [ breadcrumb ] start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Complaints Details</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="dashboard.php"><i
                                                        class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="all-complaint.php">Complaints
                                                    Details</a></li>
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
                                        <div class="card-body">
                                            <h5>View Complaints Details</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="card">
                                                        <div class="card-body table-border-style">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $st = 'closed';
                                                                        $cid = $_GET['cid'];
                                                                        $officerId = $_GET['officerId'];

                                                                        $query = mysqli_query($con, "SELECT complaints.*, complainers.firstName AS name, institutions.type AS instname, 
        investigationofficers.firstName AS officerName, currentcomplaints.officerId, currentcomplaints.date
        FROM complaints 
        JOIN complainers ON complainers.userId = complaints.userId 
        JOIN institutions ON institutions.institutionId = complaints.institutionId 
        JOIN currentcomplaints ON currentcomplaints.complaintId = complaints.complaintId 
        JOIN investigationofficers ON investigationofficers.officerId = currentcomplaints.officerId 
        WHERE complaints.complaintId='$cid' AND currentcomplaints.officerId='$officerId'");

                                                                        if (!$query) {
                                                                            die(mysqli_error($con)); // Output any MySQL errors
                                                                        }
                                                                        while ($row = mysqli_fetch_array($query)) {
                                                                        ?>
                                                                        <tr>
                                                                            <td><b>Complaint Number</b></td>
                                                                            <td><?php echo htmlentities($row['complaintId']);?></td>
                                                                            <td><b>Complainant Name</b></td>
                                                                            <td><?php echo htmlentities($row['name']);?></td>
                                                                            <td><b>Date</b></td>
                                                                            <td><?php echo htmlentities($row['date']);?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Institutions </b></td>
                                                                            <td><?php echo htmlentities($row['instname']);?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Complaint Details </b></td>
                                                                            <td colspan="5"> <?php echo htmlentities($row['description']);?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Final Status</b></td>
                                                                            <td colspan="5"> <?php $status = $row['status'];
                                                                            if ($status == ''): ?>
                                                                                    <span
                                                                                        class="badge badge-danger">Not Processed Yet</span>
                                                                                <?php elseif ($status == 'in process'):?>
                                                                                    <span class="badge badge-warning">In Process</span>
                                                                                <?php elseif ($status == 'closed'):?>
                                                                                    <span class="badge badge-success">Closed</span>
                                                                                <?php endif;?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="4">
                                                                                <a
                                                                                    href="javascript:void(0);"
                                                                                    onClick="popUpWindow('userprofile.php?uid=<?php echo htmlentities($row['userId']);?>');"
                                                                                    title="View User Details">
                                                                                    <button type="button"
                                                                                        class="btn btn-info">View User Details</button>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <tr>
                                                                                <td><b>Investigator Id</b></td>
                                                                                <td><?php echo htmlentities($row['officerId']);?></td>
                                                                                <td><b>Investigator Name</b></td>
                                                                                <td><?php echo htmlentities($row['officerName']);?></td>
                                                                                <td><b>Investigator Date</b></td>
                                                                                <td><?php echo htmlentities($row['date']);?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="4">
                                                                                    <a
                                                                                        href="javascript:void(0);"
                                                                                        onClick="popUpWindow('officerprofile.php?officerId=<?php echo htmlentities($row['officerId']);?>');"
                                                                                        title="View Investigator Details">
                                                                                        <button type="button"
                                                                                            class="btn btn-info">View Investigator Details</button>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                            <?php  } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ form-element ] end -->
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
</body>

</html>
