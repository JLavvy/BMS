<?php

require_once('config.php');
require_once('session.php');


if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $Login_user_name = $_POST['Login_user_name'];
    $Login_Password = $_POST['Login_Password'];
    $cpassword = $_POST['cpassword'];
    $hashed = password_hash($Login_Password, PASSWORD_DEFAULT);

    $select = "SELECT * FROM loginn WHERE Login_user_name = '$Login_user_name'";
    $result = mysqli_query($con, $select);

    if(mysqli_num_rows($result) > 0){
      $error[] = 'user already exist!';
  } else {
      if(strlen($Login_Password) < 8 || strlen($Login_Password) > 32){
          $error[] = 'password must be between 8 to 32 characters long!';

      } 
      else if($Login_Password != $cpassword){
          $error[] = 'password not matched!';

      } else {
   
            $login_rank = '';
            if ($Login_user_name == 'admin1' || $Login_user_name == 'admin2') {
                $login_rank = 'admin';
            } else {
                $login_rank = 'student';
            }
            $insert = "INSERT INTO loginn(Login_user_name, Login_Password, Login_rank) VALUES('$Login_user_name', '$Login_Password', '$login_rank')";
            mysqli_query($con, $insert);
            header('location:admindashboard.php');
        }
    }
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	
<div class="container my-5">
        <div class="row justify-content-center">
          <div class="col-md-9 col-lg-4">
            <div class="card shadow-sm">
              <div class="card-body">
                <h1 class="card-title text-center mb-5">Add User</h1>
    
                <form method="POST">
                  <div class="mb-3">
				  <?php
      if(isset($error)){
         foreach($error as $error){
        echo'<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
	  <br />
		
                    <label for="name" class="form-label">Username</label>
                    <div class="input-group">
                      <span class="input-group-text"><i class="fa fa-user"></i></span>
                      <input type="text" class="form-control" id="name" name="Login_user_name" placeholder="Enter username" required>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                      <span class="input-group-text"><i class="fa fa-lock"></i></span>
                      <input type="password" class="form-control" id="password"name="Login_Password" placeholder="Password" required>
                    </div>
                  </div>
                  
                  <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <div class="input-group">
                      <span class="input-group-text"><i class="fa fa-lock"></i></span>
                      <input type="password" class="form-control" id="confirm-password" name="cpassword"placeholder="Confirm Password" required>
                    </div>
                  </div>


    
                  <button type="submit" id="submit" class="btn btn-primary w-100 mb-3"><i class="fas fa-user-plus me-2"></i>Add User
                </button>

    
                 
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

</body>
</html>