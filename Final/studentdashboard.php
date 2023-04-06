<?php
// start the session
session_start();
include('config.php')

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Bursary System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
  padding: 0;
  margin: 0;
  font-family: 'Lato', sans-serif;
  color: #000;
}

.student-profile .card h3 {
  font-size: 20px;
  font-weight: 700;
}

.student-profile .table th,
.student-profile .table td {
  font-size: 14px;
  padding: 5px 10px;
}
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
                <div class="col-md-2 d-none d-md-block sidebar  bg-light" style="position:fixed;z-index:1000">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="studentdashboard.php" style="color: #000;"> <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Registration.php" style="color: #000;"><i class="fas fa-user-graduate"></i>Registration</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="application.php" style="color: #000;"><i class="fas fa-book"></i>Bursary Application</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="successful.php"style="color: #000;"><i class="fas fa-check"></i>Shortlisted Applicants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php "style="color: #000;" onclick="<?php session_destroy(); ?>">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout</a>
                        </li>
                    </ul>
                </div>



                <div class="col-md-10 offset-md-2 content" style="overflow-y: auto;">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="heading">
                                <div class="heading"><i class="fa fa-comments"></i> Notifications</div>
                                <div class="heading-body" style="font-weight:1000;color:red">
                                    <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount=10">
                                        ALERT!! BURSARY APPLICATION FOR 2023 HAS NOT YET BEEN ACTIVATED.KINDLY BE PATIENT.THANK YOU
                                    </marquee>
                                    

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="market-updates">
                        <div class="col-md-4 market-update-gd">
                            <div class="market-update-block clr-block-4">
                                <div class="col-md-4 market-update-right">
                                    <i class="fa fa-pencil"></i>
                                </div>
                                <div class="col-md-8 market-update-left">

                                <i class="fas fa-users"></i><span>Total Users</span>

                                <div>
                                

                                    <?php

                                    require 'config.php';

                                    $query = "SELECT Login_id FROM loginn ORDER BY Login_id";
                                    $query_run = mysqli_query($con, $query);

                                    $row = mysqli_num_rows($query_run);

                                    echo '<h3> ' . $row . ' </h3>';

                                    ?>

                                    
                                </div>
                            </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- Student Profile -->
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="fas fa-user"></i>Basic Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="40%">First name</th>
                
                <td></td>
              </tr>
              <tr>
                <th width="40%">Middle name</th>
                
                <td></td>
              </tr>
              <tr>
                <th width="40%">Last name</th>
                
                <td></td>
              </tr>
              <tr>
                <th width="40%">Email	</th>
                
                <td></td>
              </tr>
              <tr>
                <th width="40%">Phone Number</th>
                
                <td></td>
              </tr>
              <tr>
                <th width="40%">University</th>
                
                <td></td>
              </tr>
              <tr>
                <th width="40%">Registration Number</th>
                
                <td></td>
              </tr>
              <tr>
                <th width="40%">Course</th>
                
                <td></td>
              </tr>
              <tr>
                <th width="40%">Year of Admission</th>
                
                <td></td>
              </tr>
              <tr>
                <th width=40%">ward</th>
                
                <td></td>
              </tr>
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

                        

                    </div>
                </div>

                </main>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>