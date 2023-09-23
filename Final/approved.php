<?php
include('config.php');
session_start();
include('inactivity.php');

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bursary Management System</title>
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
        <table class="table table-borderless table-striped">
                        <thead>
                            <tr>

                                <th scope="col">Student</th>
                                <th scope="col">Allocated Amount</th>
                                <th scope="col">Allocation Date</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $select = "SELECT * FROM shortlisted_applications";
                            $result = mysqli_query($con, $select);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $Shortlisted_id = $row['Shortlisted_id'];
                                    $Shortlisted_Application_id = $row['Shortlisted_Application_id'];
                                    $Student_sql = "SELECT s.Student_first_name, s.Student_Middle_name, s.Student_last_name FROM student s JOIN busary_applications b ON s.Student_id = b.Application_Student_id WHERE b.Application_id = '$Shortlisted_Application_id'";
                                    $Student_result = mysqli_query($con, $Student_sql);
                                    $Student_row = mysqli_fetch_assoc($Student_result);
                                    $first_name = $Student_row['Student_first_name'];
                                    $middle_name = $Student_row['Student_Middle_name'];
                                    $last_name = $Student_row['Student_last_name'];



                                    $Shortlisted_amount = $row['Shortlisted_Allocated_Amount'];
                                    $Shortlisted_date = $row['Shortlisted_Date'];


                                    echo '
                    <tr>
                    <th scope="row">'. $first_name . ' ' . $middle_name . ' ' . $last_name . '</th>
                    <td>' . $Shortlisted_amount  . '</td>
                    <td>' . $Shortlisted_date  . '</td>
                   
                    
                  </tr>';
                                }
                            }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>