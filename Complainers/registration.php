<?php
include('../Config/connection.php');
error_reporting(0);
if(isset($_POST['submit']))
{
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    $contactNo = $_POST['contactNo'];
    $email = $_POST['email'];
    $username = md5($_POST['username']);
    $password = $_POST['password'];

    // Check if email already exists
    $checkEmailQuery = mysqli_prepare($con, "SELECT COUNT(*) FROM complainers WHERE email = ?");
    mysqli_stmt_bind_param($checkEmailQuery, "s", $email);
    mysqli_stmt_execute($checkEmailQuery);
    mysqli_stmt_bind_result($checkEmailQuery, $emailCount);
    mysqli_stmt_fetch($checkEmailQuery);
    mysqli_stmt_close($checkEmailQuery);

    if ($emailCount > 0) {
        echo "<script>alert('Email already exists. Please choose a different email.');</script>";
    } else {
        $status = 1;
        $query = mysqli_prepare($con, "INSERT INTO complainers (firstName, lastName, address, contactNo, email, username, password, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        mysqli_stmt_bind_param($query, "sssssssi", $firstName, $lastName, $address, $contactNo, $email, $username, $password, $status);

        if (mysqli_stmt_execute($query)) {
            echo "<script>alert('Registration successful. Now You can login');</script>";
            echo "<script>closeModalAndRedirect();</script>";
        } else {
            echo "<script>alert('Registration failed. Please try again.');</script>";
        }

        mysqli_stmt_close($query);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <script>
        function userAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data:'email='+$("#email").val(),
                type: "POST",
                success:function(data){
                    $("#user-availability-status1").html(data);
                    $("#loaderIcon").hide();
                },
                error:function (){}
            });
        }

        function closeModalAndRedirect() {
            // Close the Lightbox
            var lightbox = document.getElementsByClassName('glightbox')[0];
            lightbox.click();

            // Redirect to homepage.php
            window.location.replace("homepage.php");
        }
    </script>
</head>
<body>
    <!-- [ auth-signin ] start -->
    <div class="auth-wrapper">
        <div class="auth-content text-center">
            <h4> <hr /><span style="color:#fff;">User Registration</span></h4>
            <hr />
            <div class="card borderless">
                <div class="row align-items-center ">
                    <div class="col-md-12">
                        <form method="post">
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" placeholder="Full Name" name="firstName" required="required" autofocus>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" placeholder="Last Name" name="lastName" required="required" autofocus>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" placeholder="Address" name="address" required="required" autofocus>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" maxlength="10" name="contactNo" placeholder="Contact no" required="required" autofocus>
                                </div>
                                <div class="form-group mb-4">
                                    <input type="email" class="form-control" placeholder="Email ID" id="email" onBlur="userAvailability()" name="email" required="required">
                                    <span id="user-availability-status1" style="font-size:12px;"></span>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" placeholder="Username" required="required" name="username"><br >
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" class="form-control" placeholder="Password" required="required" name="password"><br >
                                </div>
                                <button class="btn btn-block btn-primary mb-4"  type="submit" name="submit">Register</button>
                                <hr>
                            </div>
                        </form>
                        <i class="fa fa-home" aria-hidden="true">
                            <a class="" href="index.php">Back Home</a>
                        </i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.getElementById('closeLightboxBtn').addEventListener('click', function() {
        // Close the lightbox
        var lightbox = document.getElementsByClassName('glightbox')[0];
        lightbox.click();
    });
</script>
    <!-- [ auth-signin ] end -->
    <script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
</body>
</html>
