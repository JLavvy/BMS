<?php
include('config.php');
include('session.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $Student_id = $_GET['updateid'];
  $Student_first_name = mysqli_real_escape_string($con, $_POST["Student_first_name"]);
  $Student_middle_name = mysqli_real_escape_string($con, $_POST["Student_Middle_name"]);
  $Student_last_name = mysqli_real_escape_string($con, $_POST["Student_last_name"]);
  $Student_email_address = mysqli_real_escape_string($con, $_POST["Student_email_address"]);
  $Student_phone_number = mysqli_real_escape_string($con, $_POST["Student_phone_number"]);
  $Student_reg_number = mysqli_real_escape_string($con, $_POST["Student_reg_number"]);
  $Student_course = mysqli_real_escape_string($con, $_POST["Student_course"]);
  $Student_year_of_admission = mysqli_real_escape_string($con, $_POST["Student_year_of_admission"]);
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


  $query = "UPDATE student SET 
      Student_first_name='$Student_first_name', 
      Student_middle_name='$Student_middle_name', 
      Student_last_name='$Student_last_name', 
      Student_email_address='$Student_email_address', 
      Student_phone_number='$Student_phone_number', 
      Student_reg_number='$Student_reg_number', 
      Student_course='$Student_course', 
      Student_year_of_admission='$Student_year_of_admission', 
      Student_ward_id='$ward_id', 
      Student_University_id='$University_id' 
    WHERE Student_id=$Student_id";

  $result = mysqli_query($con, $query);

  if ($result) {
    header('Location: reg.php');
    exit();
  } else {
    echo "Error: " . mysqli_error($con);
  }
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




    <div class="col-md-10 offset-md-2 content" style="overflow-y: auto;">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-5">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h1 class="card-title text-center mb-5">Registration Update</h1>

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


                                <button type="submit" id="submit" class="btn btn-primary w-100 mb-3"><i class="fas fa-user-plus me-2"></i> Update
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</body>

</html>