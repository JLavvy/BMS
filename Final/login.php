<?php
include ('config.php');
include('header.php');
session_start();

if (isset($_POST["submit"]))
{
  $Login_user_name=$_POST["Login_user_name"];
  $Login_Password=$_POST["Login_Password"];

  $query="SELECT * FROM loginn WHERE Login_user_name='$Login_user_name'";
  $result = mysqli_query($con, $query);
  
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($Login_Password, $row['Login_Password'])) {
      // Password is correct, set session variable and redirect to dashboard
      $_SESSION['uuid'] = $row['Login_id'];
      $_SESSION['Login_user_name'] = $Login_user_name;
      if ($Login_user_name == "admin1" || $Login_user_name == "admin2") {
        setcookie('user_type', 'admin', time()+86400, '/');
        header('Location: admindashboard.php');
      } else {
        setcookie('user_type', 'student', time()+86400, '/');
        header('Location: studentdashboard.php');
      }
    } else {
      // Password is incorrect, show error message
      echo "Incorrect password!";
    }
  } else {
    // User doesn't exist, show error message
    echo "User doesn't exist!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Bursary Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-9 col-lg-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h1 class="card-title text-center mb-5">Login</h1>

            <form method="post">
              <div class="mb-3">
                <label for="name" class="form-label">Username</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" id="name" name="Login_user_name" placeholder="Enter Username" required>
                </div>
              </div>

              <div class="mb-3">
                <label for="Login_Password" class="form-label">Password</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fa fa-lock"></i></span>
                  <input type="Password" class="form-control" id="Login_Password" name="Login_Password" placeholder="Password" required>
                </div>
              </div>

              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember-me">
                <label class="form-check-label" for="remember-me">Remember me</label>
              </div>
              
              <button type="submit" name="submit" class="btn btn-primary w-100 mb-3">
              <i class="fas fa-sign-in-alt me-2"></i> Login
              </button>
              
  
              <div class="mb-3 text-center">
                <h6>Don't have an account?  <button type="button" class="btn btn-link" onclick="window.location.href = 'signup.php'">Signup</button></h6>
               
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>

