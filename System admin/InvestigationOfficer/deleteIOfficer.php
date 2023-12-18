<?php
    require('C:/xampp/htdocs/SDP_CW/Config/connection.php');
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $sql="delete from `investigationofficers` where officerId=$id";
        $result=mysqli_query($con,$sql);
        if($result){
            echo '<script>
            window.location.href = "viewInvestigationOfficers.php";
            alert("User deleted!!!")        
            </script>'; 
        }else{
            die(mysqli_error($con));
        }
    }
?>