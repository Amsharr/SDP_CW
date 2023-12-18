<?php
session_start();
include('../Config/connection.php');

// Check if the user is not logged in
if (empty($_SESSION['userId'])) {
    header('location:index.php');
    exit();
}

// Initialize variables
$fname = $lname = $address = $contactNo = $email = '';
$id = intval($_SESSION['userId']);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Retrieve form data
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $address = $_POST['address'];
    $contactNo = $_POST['contactNo'];
    $email = $_POST['email'];

    // Update the user profile using prepared statement
    $stmt = $con->prepare("UPDATE complainers SET firstName=?, lastName=?, address=?, contactNo=?, email=? WHERE userId=?");
    $stmt->bind_param("sssssi", $fname, $lname, $address, $contactNo, $email, $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Profile updated successfully
        echo "<script>alert('Profile Updated successfully');</script>";
    } else {
        // Error updating profile
        echo "<script>alert('Error updating profile');</script>";
    }

    // Close the statement
    $stmt->close();
}

// Retrieve user data for displaying in the form
$query = mysqli_query($con, "SELECT * FROM complainers WHERE userId='$id'");
if ($row = mysqli_fetch_array($query)) {
    $fname = htmlentities($row['firstName']);
    $lname = htmlentities($row['lastName']);
    $address = htmlentities($row['address']);
    $contactNo = htmlentities($row['contactNo']);
    $email = htmlentities($row['email']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>CMS || User Profile</title>
    <!-- Add your CSS and other head elements here -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="">
    <?php include('include/sidebar.php'); ?>
    <?php include('include/header.php'); ?>

    <section class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header">
                <!-- Your breadcrumb code here -->
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>User Profile</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="firstName">First Name</label>
                                            <input type="text" name="firstName" required value="<?php echo $fname; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="lastName">Last Name</label>
                                            <input type="text" name="lastName" required value="<?php echo $lname; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea name="address" required class="form-control"><?php echo $address; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="contactNo">Contact Number</label>
                                            <input type="text" name="contactNo" required value="<?php echo $contactNo; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">User Email</label>
                                            <input type="email" name="email" required value="<?php echo $email; ?>" class="form-control" readonly>
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
    <script src="assets/js/pcoded.min.js"></script>
</body>

</html>
