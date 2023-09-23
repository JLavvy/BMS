<?php
require_once('config.php');


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // User data to insert into database
  $name = mysqli_real_escape_string($con, $_POST['Login_user_name']);
  $first_name = mysqli_real_escape_string($con, $_POST['Student_first_name']);
  $Middle_name = mysqli_real_escape_string($con, $_POST['Student_Middle_name']);
  $last_name = mysqli_real_escape_string($con, $_POST['Student_last_name']);
  $email = mysqli_real_escape_string($con, $_POST['Student_email_address']);
  $cemail = mysqli_real_escape_string($con, $_POST['cemail']);
  $phone = mysqli_real_escape_string($con, $_POST['Student_phone_number']);
  $reg_number = mysqli_real_escape_string($con, $_POST['Student_reg_number']);
  $course = mysqli_real_escape_string($con, $_POST['Student_course']);
  $admission = mysqli_real_escape_string($con, $_POST['Student_year_of_admission']);
  $ward = mysqli_real_escape_string($con, $_POST['ward_name']);
  $university = mysqli_real_escape_string($con, $_POST['University_name']);


  // Get login ID for the given username
  $query = "SELECT Login_id FROM loginn WHERE Login_user_name = '$name'";
  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) > 0) {
    // Fetch the login ID from the result
    $row = mysqli_fetch_assoc($result);
    $Login_id = $row['Login_id'];
  }
  // Get ward ID for the given ward name
  $query = "SELECT ward_id FROM ward WHERE ward_name = '$ward'";
  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) > 0) {
    // Fetch the login ID from the result
    $row = mysqli_fetch_assoc($result);
    $ward_id = $row['ward_id'];
  }


  // Get university ID for the given university name
  $query = "SELECT University_id FROM universities WHERE University_name = '$university'";
  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) > 0) {
    // Fetch the login ID from the result
    $row = mysqli_fetch_assoc($result);
    $University_id = $row['University_id'];
  }



  $query = "INSERT INTO student (Student_first_name, Student_Middle_name, Student_last_name, Student_email_address,Student_phone_number, Student_reg_number, Student_course,Student_year_of_admission, Student_ward_id, Student_University_id, Student_Login_id) 
                    VALUES ('$first_name', '$Middle_name', '$last_name', '$email', '$phone','$reg_number','$course','$admission','$ward_id','$University_id','$Login_id')";



  $result = mysqli_query($con, $query);
  header('location:Registration.php');
}


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
          <div class="container my-5">
            <div class="row justify-content-center">
              <div class="col-md-19 col-lg-15">
                <div class="card shadow-sm">
                  <div class="card-body">
                    <h1 class="card-title text-center mb-5">Student Registration</h1>

                    <form method="post">
                      <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="fa fa-user"></i></span>
                          <input type="text" class="form-control" id="name" name="Login_user_name" placeholder="Enter Username" required>
                        </div>
                      </div>

                      <div class="mb-3">
                        <label for="first-name" class="form-label">First Name</label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                          <input type="text" class="form-control" id="first-name" name="Student_first_name" placeholder="Enter First Name" required>
                        </div>
                      </div>

                      <div class="mb-3">
                        <label for="middle-name" class="form-label">Middle Name</label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                          <input type="text" class="form-control" id="middle-name" name="Student_Middle_name" placeholder="Enter Middle Name">
                        </div>
                      </div>

                      <div class="mb-3">
                        <label for="last-name" class="form-label">Last Name</label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                          <input type="text" class="form-control" id="last-name" name="Student_last_name" placeholder="Enter Last Name">
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                          <input type="email" class="form-control" id="email" name="Student_email_address" placeholder="Enter Email Address">
                        </div>
                      </div>

                      <div class="mb-3">
                        <label for="confirm-email" class="form-label">Confirm Email</label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                          <input type="email" class="form-control" id="confirm-password" name="cemail" placeholder="Confirm Email" required>
                        </div>
                      </div>

                      <div class="mb-3">
                        <label for="phone-number" class="form-label">Phone Number</label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                          <input type="tel" class="form-control" id="phone-number" name="Student_phone_number" placeholder="Enter Phone Number" required>
                        </div>
                      </div>


                      <div class="mb-3">
                        <label for="ward" class="form-label">Ward</label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="fa-solid fa-house-user"></i></span>
                          <input type="text" class="form-control" id="ward" name="ward_name" placeholder="Enter Ward">
                        </div>
                      </div>


                      <div class="mb-3">
                        <label for="university" class="form-label">University</label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="fa-thin fa-building-columns"></i></span>
                          <input type="text" class="form-control" id="uni" name="University_name" placeholder="Enter University">
                        </div>
                      </div>



                      <div class="mb-3">
                        <label for="reg-number" class="form-label">Registration Number</label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-id-card-alt me-2"></i></span>
                          <input type="text" class="form-control" id="reg-number" name="Student_reg_number" placeholder="Enter Registration Number">
                        </div>
                      </div>

                      <div class="mb-3">
                        <label for="course" class="form-label">Course</label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                          <input type="text" class="form-control" id="course" name="Student_course" placeholder="Enter Course">
                        </div>
                      </div>

                      <div class="mb-3">
                        <label for="year" class="form-label">Year of Admission</label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-calendar-alt me-2"></i></span>
                          <input type="number" class="form-control" id="year" name="Student_year_of_admission" placeholder="Enter Admission Year" min="1900" max="2099">
                        </div>
                      </div>


                      <button type="submit" id="submit" class="btn btn-primary w-100 mb-3"><i class="fas fa-user-plus me-2"></i> Register
                      </button>

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