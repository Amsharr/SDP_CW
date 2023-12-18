<?php
    require('C:/xampp/htdocs/SDP_CW/Config/connection.php');
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $sql="delete from `complainers` where userId=$id";
        $result=mysqli_query($con,$sql);
        if($result){
            echo '<script>
            window.location.href = "viewComplainers.php";
            alert("User deleted!!!")        
            </script>'; 
        }else{
            die(mysqli_error($con));
        }
    }
?>