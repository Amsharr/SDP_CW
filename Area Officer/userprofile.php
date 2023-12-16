<?php
session_start();
include('../Config/connection.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="anuj.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        table.table-bordered {
            border: 2px solid #000; /* Set border width to 2px and color to black */
            margin-top: 20px;
        }

        table.table-bordered th,
        table.table-bordered td {
            border: 2px solid #000; /* Set border width to 2px and color to black for table cells */
        }

        .profile-container {
            margin-left: 50px;
        }

        .profile-container button {
            margin-right: 10px;
        }
    </style>

</head>
<body>

<div style="margin-left:50px;">
    <form name="updateticket" id="updateticket" method="post">
        <table class="table table-bordered">
            <?php
            $ret1 = mysqli_query($con, "select * FROM complainers where userId='" . $_GET['uid'] . "'");
            while ($row = mysqli_fetch_array($ret1)) {
                ?>
                <tr>
                    <td colspan="2" style="text-align:center"><b>User Profile Details</b></td>
                </tr>

                <tr>
                    <td><b>First Name:</b></td>
                    <td><?php echo htmlentities($row['firstName']); ?></td>
                </tr>

                <tr>
                    <td><b>Last Name:</b></td>
                    <td><?php echo htmlentities($row['lastName']); ?></td>
                </tr>

                <tr>
                    <td><b>Email:</b></td>
                    <td><?php echo htmlentities($row['email']); ?></td>
                </tr>

                <tr>
                    <td><b>Address:</b></td>
                    <td><?php echo htmlentities($row['address']); ?></td>
                </tr>

                <tr>
                    <td><b>Contact:</b></td>
                    <td><?php echo htmlentities($row['contactNo']); ?></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <button name="Submit2" type="button" class="btn btn-danger" onclick="return f2();">Close</button>
                        <button name="Submit3" type="button" class="btn btn-primary" onclick="return f3();">Print</button>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </form>
</div>

<script language="javascript" type="text/javascript">
    function f2() {
        window.close();
    }

    function f3() {
        window.print();
    }
</script>
</body>
</html>
