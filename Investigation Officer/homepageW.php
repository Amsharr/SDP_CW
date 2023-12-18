<?php
    include('C:/xampp/htdocs/SDP_CW/Config/connection.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <nav class="navbar bg-success" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Complaint Management System</a>      
    </div>
  </div>
</nav>
  <body>
  <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="homepage.html" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">                    
                </ul>                
                <hr>
            </div>
        </div>  
        <div class="col py-3">
          <h3>Complaints assigned to me</h3>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>Complaint Id</th>
                <th>Description</th>
                <th>Date</th>
                <th>Status</th>
                <th>Remarks</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                $sql="Select * from `currentcomplaints`";
                $result=mysqli_query($con,$sql);
                if($result){
                while($row=mysqli_fetch_assoc($result)){
                  $id=$row['complaintId'];
                  $description=$row['description'];
                  $date=$row['date'];
                  $status=$row['status'];
                  $remarks=$row['investigatorRemarks'];
                    echo'<tr>
                    <td>'.$id.'</td>
                    <td>'.$description.'</td>
                    <td>'.$date.'</td>
                    <td style="display: flex; justify-content: space-between; align-items: center;">'.$status.'
                        <button class="btn btn-primary" name="edit">
                            <a href="changeStatus.php?updateId='.$id.'" class="text-light" style="text-decoration: none;">Change</a>
                        </button>
                    </td>
                    <td>'.$remarks.'
                        <button class="btn btn-primary" name="edit">
                            <a href="changeRemarks.php?updateId='.$id.'" class="text-light" style="text-decoration: none;">Change</a>
                        </button>
                    </td>                         
                    </tr>';
                }
                
                }
                ?>
            </tbody>
        </table>
      </div>    
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>