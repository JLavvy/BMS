<?php
include('config.php');
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>  
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
          <div class="col-md-9 col-lg-5">
            <div class="card shadow-sm">
              <div class="card-body">
                <h3 class="card-title text-center mb-5">Forgot Password</h3>
      
                <form>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                          <input type="email" class="form-control" id="email" placeholder="Email address" required>
                        </div>
                      </div>
                     
      
                  <button type="submit" class="btn btn-primary w-100 mb-3">Reset Password</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      
</body>
</html>
