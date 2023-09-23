<?php
include ('config.php');
include ('session.php');

if (isset($_POST["submit"]))
{
  $Login_id=$_GET['updateid'];
  $Login_user_name=$_POST["Login_user_name"];
 
  $query="UPDATE loginn SET Login_user_name='$Login_user_name' WHERE Login_id=$Login_id";
  $result = mysqli_query($con, $query);

  if ($result)
  {
    // Redirect to dashboard.php if username is admin1 or admin2
    if ($Login_user_name == "admin1" || $Login_user_name == "admin2") {
      header('Location: admindashboard.php');
    } else {
      // Redirect to another page if username is not admin1 or admin2
      header('Location: admindashboard.php');
    }
  } else {
    echo "Error: " . mysqli_error($con);
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
            <h1 class="card-title text-center mb-5">Update </h1>

            <form method="post">
              <div class="mb-3">
                <label for="name" class="form-label">Username</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" id="name" name="Login_user_name" placeholder="Enter Username" required>
                </div>
              </div>
              
              
              <button type="submit" name="submit" class="btn btn-primary w-100 mb-3 onclick="window.location.href = 'admindashboard.php'">
              <i class="fas fa-sign-in-alt me-2"></i> Update
              </button>
              
  
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>

