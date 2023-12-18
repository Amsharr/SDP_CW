<?php

include('../Config/connection.php');

if (isset($_POST['update'])) {
    $complaintnumber = $_GET['cid'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];
    $query = mysqli_query($con, "insert into complaintremark(complaintNumber,status,remark) values('$complaintNumber','$status','$remark')");
    $sql = mysqli_query($con, "update complaints set status='$status' where complaintId='$complaintnumber'");

    echo "<script>alert('Complaint details updated successfully');</script>";
}

?>
<script language="javascript" type="text/javascript">
    function f2() {
        window.close();
    }

    function f3() {
        window.print();
    }
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>User Profile</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="anuj.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <div class="col py-3">

        <div style="margin-left:50px;">
            <form name="updateticket" id="updatecomplaint" method="post">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr height="50">
                        <td><b>Complaint Number</b></td>
                        <td><?php echo htmlentities($_GET['cid']); ?></td>
                    </tr>
                    <tr height="50">
                        <td><b>Status</b></td>
                        <td><select name="status" required="required" class="form-control">
                                <option value="">Select Status</option>
                                <option value="in process">In Process</option>
                                <option value="closed">Closed</option>
                            </select></td>
                    </tr>


                    <tr height="50">
                        <td><b>Remark</b></td>
                        <td><textarea name="remark" cols="50" rows="10" required="required"
                                class="form-control"></textarea></td>
                    </tr>

                    <tr>
                        <td colspan="1">&nbsp;</td>
                    </tr>

                    <tr height="50">
                        <td>&nbsp;</td>
                        <td><input type="submit" name="update" class="btn btn-primary" value="Submit"></td>
                    </tr>

                    <tr>
                        <td colspan="1">&nbsp;</td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input name="Submit2" type="submit" class="txtbox4 btn btn-danger" value="Close "
                                onClick="return f2();" style="cursor: pointer;" />
                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </div>

</body>

</html>
