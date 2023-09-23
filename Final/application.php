<?php
require_once('config.php');


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // User data to insert into database

    $first_name = mysqli_real_escape_string($con, $_POST['Student_first_name']);
    $Middle_name = mysqli_real_escape_string($con, $_POST['Student_Middle_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['Student_last_name']);
    $application_amount = mysqli_real_escape_string($con, $_POST["Application_amount"]);
    $semester = mysqli_real_escape_string($con, $_POST["Busary_semester"]);
    

    // Get busary ID for the given username
    $query = "SELECT Busary_id FROM busary WHERE Busary_semester = '$semester'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        // Fetch the bursary ID from the result
        $row = mysqli_fetch_assoc($result);
        $Busary_id = $row['Busary_id'];
    }

    //Get Student ID for the given names
    $query = "SELECT Student_id FROM student WHERE Student_first_name='$first_name' AND Student_Middle_name='$Middle_name' AND Student_last_name='$last_name'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        // Get the first row from the result set
        $row = mysqli_fetch_assoc($result);

        // Get the student ID
        $Student_id = $row["Student_id"];
    }

    $timestamp = date("Y-m-d H:i:s");
    $insert = "INSERT INTO busary_applications (Application_Student_id, Application_amount,Application_date, Application_Busary_id) 
VALUES ('$Student_id', '$application_amount', '$timestamp','$Busary_id')";

    $result = mysqli_query($con, $insert);
    header('location:studentdashboard.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
  <link rel="stylesheet" href="style.css">
    <style>


    </style>
</head>

<body>
    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="logo">
                <img src="Images/image1.png" width="60" />
            </div>
            <a class="navbar-brand" href="#">BURSARY MANAGEMENT SYSTEM</a>


        </nav>
    </header>
    <div class="wrapper" style="margin-top: 60px;">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-2 d-none d-md-block sidebar bg-light" style="position:fixed;z-index:1000">
          <ul class="nav flex-column">
            <br />
            <div class="nav-item-container">
              <li class="nav-item">
                <a class="nav-link active" href="studentdashboard.php" style="color: #000;">
                  <i class="fas fa-tachometer-alt"></i>Dashboard
                </a>
              </li>
            </div>
            <br />
            <div class="nav-item-container">
              <li class="nav-item">
                <a class="nav-link active " href="Registration.php" style="color: #000;">
                  <i class="fas fa-users"></i>Registration
                </a>
              </li>
            </div>
            <br />
            <div class="nav-item-container">
              <li class="nav-item">
                <a class="nav-link" href="application.php" style="color: #000;">
                  <i class="fas fa-book"></i>Bursary Application
                </a>
              </li>
            </div>
            <br />

            <div class="nav-item-container">
              <li class="nav-item">
                <a class="nav-link" href="approved.php" style="color: #000;">
                  <i class="fas fa-book"></i>Shortlisted Applicants
                </a>
              </li>
            </div>
            <br />
           
            <div class="nav-item-container">
              <li class="nav-item">
                <a class="nav-link" href="logout.php" style="color: #000;">
                  <i class="fas fa-sign-out-alt"></i>Logout
                </a>
              </li>
            </div>
            <br />
          </ul>
        </div>
                <div class="col-md-10 offset-md-2 content" style="overflow-y: auto;">
                    <div class="container-fluid bg-gra-020 py-5">
                        <div class="row justify-content-center">
                            <div class="col-md-60">
                                <div class="card card-40">
                                    <div class="card-body">
                                        <h2 class="title mb-4">Application Form</h2>

                                        <form method="POST">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="first_name">First Name</label>
                                                    <input type="text" class="form-control input--style-4" id="first_name" name="Student_first_name">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="first_name">Middle Name</label>
                                                    <input type="text" class="form-control input--style-4" id="first_name" name="Student_Middle_name">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" class="form-control input--style-4" id="last_name" name="Student_last_name">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="Date">Semester</label>
                                                    <div class="input-group input-group-icon">
                                                        <input type="semester" class="form-control input--style-4" id="sem" name="Busary_semester">

                                                    </div>
                                                </div>


                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="Amount">Amount</label>
                                                        <div class="input-group input-group-icon">
                                                            <input type="int" class="form-control input--style-4" id="amount" name="Application_amount">

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>



                                            <button type="submit" class="btn btn-primary btn-block">Apply</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $('.js-datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
</body>

</html>