<?php
session_start();
include('../Config/connection.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['userId']) || empty($_SESSION['userId'])) {
    header('location:index.php');
}

$userId = $_SESSION['userId'];
if (isset($_POST["submit"])) {
    // $userId = $_SESSION['userId'];
    $institutionId = $_POST['institutionId'];
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $date = $_POST['date'];

    // Check if the userId and institutionId exist in the referenced tables
    $userCheckQuery = "SELECT * FROM complainers WHERE userId = '$userId'";
    $institutionCheckQuery = "SELECT * FROM institutions WHERE institutionId = '$institutionId'";

    $userCheckResult = mysqli_query($con, $userCheckQuery);
    $institutionCheckResult = mysqli_query($con, $institutionCheckQuery);

    if ($userCheckResult && $institutionCheckResult && mysqli_num_rows($userCheckResult) > 0 && mysqli_num_rows($institutionCheckResult) > 0) {
        // Insert data into the complaints table
        $query = "INSERT INTO complaints (userId, institutionId, description, location, status, date) 
                  VALUES ('$userId', '$institutionId', '$description', '$location', 'open', '$date')";

        $result = mysqli_query($con, $query);

        if ($result) {
            // Get the last inserted complaintId
            $lastComplaintId = mysqli_insert_id($con);

            echo '<script>
                    alert("Your complaint has been successfully filled, and your complaint number is ' . $lastComplaintId . '");
                    window.location.href = "complaint-history.php";
                  </script>';
        } else {
            echo '<script>alert("Error: ' . mysqli_error($con) . '");</script>';
        }
    } else {
        echo '<script>alert("Invalid userId or institutionId");</script>';
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
</head>

<body class="">
    <?php include('include/sidebar.php'); ?>
    <?php include('include/header.php'); ?>

    <section class="pcoded-main-container">
        <div class="pcoded-content">
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

            <div class="row">
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
                                            <select class="form-select" aria-label="Default select example" required name="institutionId">
                                                <option selected disabled>Select an institution</option>
                                                <option value="1">Wildlife</option>
                                                <option value="2">Forest</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Complaint Details </label>
                                            <textarea name="description" required="required" cols="10" rows="10" class="form-control" maxlength="2000"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Location</label>
                                            <input type="text" name="location" required="required" value="" required="" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="text" class="form-control datepicker" name="date" required="required">
                                        </div>

                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
</body>

</html>
