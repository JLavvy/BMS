<?php

include "config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Bursary Management System</title>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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
        <div class="col-md-2 d-none d-md-block sidebar  bg-light" style="position:fixed;z-index:1000">
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

          <button type="submit" id="submit" text=class="btn btn-light mb-3"><i class="fas fa-user-plus me-2"></i> <a href="add2.php">Create User</a>
          </button>
<br />
          <div class="float-right">
            <a href="exportData3.php" class="btn btn-success"><i class="dwn"></i> Export</a>
          </div>

          <table class="table table-borderless table-striped">
            <thead>
              <tr>
                <th scope="col">Student ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Middle Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone number</th>
                <th scope="col">Registration Number</th>
                <th scope="col">Course</th>
                <th scope="col">Admission</th>
                <th scope="col">Ward</th>
                <th scope="col">Versity</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $select = "SELECT * FROM student";
              $result = mysqli_query($con, $select);

              if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $Student_id = $row['Student_id'];
                  $Student_first_name = $row['Student_first_name'];
                  $Student_Middle_name  = $row['Student_Middle_name'];
                  $Student_last_name  = $row['Student_last_name'];
                  $Student_email_address = $row['Student_email_address'];
                  $Student_phone_number = $row['Student_phone_number'];
                  $Student_reg_number = $row['Student_reg_number'];
                  $Student_course = $row['Student_course'];
                  $Student_year_of_admission = $row['Student_year_of_admission'];

                  $Student_ward_id = $row['Student_ward_id'];
                  $ward_sql = "SELECT ward_name FROM ward WHERE ward_id ='$Student_ward_id'";
                  $ward_result = mysqli_query($con, $ward_sql);
                  $ward_row = mysqli_fetch_assoc($ward_result);
                  $ward_name = $ward_row['ward_name'];

                  $Student_university_id = $row['Student_university_id'];
                  $University_sql = "SELECT University_name FROM universities WHERE University_id ='$Student_university_id'";
                  $University_result = mysqli_query($con, $University_sql);
                  $University_row = mysqli_fetch_assoc($University_result);
                  $University_name = $University_row['University_name'];

                  echo '
                        <tr>
                            <th scope="row">' . $Student_id . '</th>
                            <td>' . $Student_first_name . '</td>
                            <td>' . $Student_Middle_name . '</td>
                            <td>' . $Student_last_name . '</td>
                            <td>' . $Student_email_address . '</td>
                            <td>' . $Student_phone_number . '</td>
                            <td>' . $Student_reg_number . '</td>
                            <td>' . $Student_course . '</td>
                            <td>' . $Student_year_of_admission  . '</td>
                            <td>' . $ward_name . '</td>
                            <td>' . $University_name . '</td>

                            <td>
                            <button class="btn btn-primary" style="margin-bottom: 10px;">
                              <a href="update.php?updateid=' . $Student_id . '" class ="text-light">Update</a>
                            </button> 
                            <br />
                          
                            <button class="btn btn-danger">
                              <a href="delete.php?deleteid=' . $Student_id . '" class ="text-light">Delete</a>
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
</body>

</html>