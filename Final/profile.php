<?php


include('config.php');
include("session.php");


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
    .card {
      margin-top: 30px;
      margin-bottom: 30px;
      padding: 30px;
      box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.3);
    }

    h4 {
      margin-bottom: 20px;
      font-weight: bold;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      font-weight: bold;
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
                      <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="admindashboard.php" style="color: #000;"> <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="reg.php" style="color: #000;"> <i class="fas fa-users"></i>Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="versity.php" style="color: #000;"><i class="fas fa-building"></i>Universities</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="applicants.php" style="color: #000;"><i class="fas fa-users"></i>Total Applicants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="" style="color: #000;"><i class="fas fa-users"></i>Shortlisted Applicants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php" style="color: #000;"><i class="fas fa-user"></i>Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php" style="color: #000;" onclick="<?php session_destroy(); ?>">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout</a>
                        </li>
                    </ul>
        </div>

        <div class="col-md-10 offset-md-2 content" style="overflow-y: auto;">
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <h4>Your Profile</h4>
                    <hr>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">


                    <form method="post">
                      <?php

                      ?>


                      <div class="form-group row">
                        <label for="name" class="col-4 col-form-label">Full Name</label>
                        <div class="col-8">
                          <input id="name" name="Admin_name" placeholder="Admin name" class="form-control here" type="text" value="<?php echo $userInfo['Admin_name']; ?>">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="email" class="col-4 col-form-label">Email Address</label>
                        <div class="col-8">
                          <input id="email" name="Admin_Email" placeholder="Email" class="form-control here" type="text" value="<?php echo $userInfo['Admin_email_address']; ?>">
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="number" class="col-4 col-form-label">Phone Number</label>
                        <div class="col-8">
                          <input id="pnumber" name="Admin_phone_number" placeholder="Phone Number" class="form-control here" required="required" type="text" value="<?php echo $userInfo['Admin_phone_number']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="location" class="col-4 col-form-label">Location</label>
                        <div class="col-8">
                          <input id="location" name="Admin_location" placeholder="Location" class="form-control here" type="text" value="<?php echo $userInfo['Admin_location']; ?>">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="offset-4 col-8">
                          <button name="submit" type="submit" class="btn btn-primary">Update My Profile</button>
                        </div>
                      </div>
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
</body>

</html>