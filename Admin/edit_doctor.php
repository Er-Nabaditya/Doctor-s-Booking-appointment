<?php 
include('../includes/connection.php');
if(isset($_POST['update_doctor'])){
    $query = "update doctors set name = '$_POST[name]',speciality = '$_POST[speciality]',email = '$_POST[email]',mobile = $_POST[mobile] where id = $_GET[did]";
    $query_result = mysqli_query($connection,$query);
    if($query_result){
        echo "<script type='text/javascript'>
                alert('Doctor updated successfully...');
            window.location.href = 'admin_dashboard.php';  
            </script>";
    }
    else{
        echo "<script type='text/javascript'>
                alert('Error...Plz try again.');
                window.location.href = 'admin_dashboard.php';
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>
    <!-- External CSS File -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Bootstrap Files -->
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <script src="../bootstrap-5/js/bootstrap.min.js"></script>
    <!-- jQuery Files -->
    <script src="../includes/jquery_latest.js"></script>
    <style>
    nav ul {
      display: flex;
      justify-content: center;
    }

    nav ul li {
      list-style-type: none;
      margin: 15px;
    }

    nav ul li a {
      text-decoration: none;
      font-size: 1.2rem;
    }

  </style>
</head>
<body>
    <div class="container-fluid header">
        <h2>Online Appointment Booking System</h2>
    </div>

    <div class="container text-center mt-3">
        <h5>Admin Panel!</h5>
    </div>
    <hr>
    <div class="container-fluid">
        <nav>
        <ul>
            <li><a class="btn btn-danger" href="admin_dashboard.php">Go to Dashboard</a></li>
        </ul>
        </nav>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4 m-auto">
        <h5 class="text-center mt-3">Edit Doctor Here!</h5>
        <form action="" method="POST">
            <?php 
                $query = "select * from doctors where id = $_GET[did]";
                $query_run = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($query_run)){
            ?>
            <div class="form-group m-3">
                <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
            </div>
            <div class="form-group m-3">
                <input type="text" class="form-control" name="speciality" value="<?php echo $row['speciality']; ?>">
            </div>
            <div class="form-group m-3">
                <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
            </div>
            <div class="form-group m-3">
                <input type="text" class="form-control" name="mobile" value="<?php echo $row['mobile']; ?>">
            </div>
            <div class="form-group m-3">
                <input type="submit" class="btn btn-primary" value="Update doctor" name="update_doctor">
            </div>
            <?php
                }
            ?>
        </form>
        </div>
    </div>
</body>
</html>