
<?php
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // User data to insert into database

   
    $University_name = mysqli_real_escape_string($con, $_POST['University_name']);
    $University_Email = mysqli_real_escape_string($con, $_POST['University_Email']);
    $University_phone_number = mysqli_real_escape_string($con, $_POST["University_phone_number"]);
    $University_code= mysqli_real_escape_string($con, $_POST["University_code"]);

    
    $insert = "INSERT INTO universities (University_name,University_Email, University_phone_number,University_code ) 
VALUES ('$University_name', '$University_Email', '$University_phone_number',' $University_code')";

    $result = mysqli_query($con, $insert);
    header('location:versity.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
  <link rel="stylesheet" href="style.css">
    <style>


    </style>
</head>

<body>
    
    <div class="wrapper" style="margin-top: 60px;">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-md-10 offset-md-2 content" style="overflow-y: auto;">
                    <div class="container-fluid bg-gra-020 py-5">
                        <div class="row justify-content-center">
                            <div class="col-md-60">
                                <div class="card card-40">
                                    <div class="card-body">
                                        <h2 class="title mb-4">University Form</h2>

                                        <form method="POST">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="name">University Name</label>
                                                    <input type="text" class="form-control input--style-4" id="name" name="University_name">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="email">University Email</label>
                                                    <input type="email" class="form-control input--style-4" id="email" name="University_Email">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="phone">University Phone Number</label>
                                                    <input type="text" class="form-control input--style-4" id="phone" name="University_phone_number">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="versity">University Code</label>
                                                    <div class="input-group input-group-icon">
                                                        <input type="text" class="form-control input--style-4" id="versity" name="University_code">

                                                    </div>
                                                </div>


                                               


                                            </div>



                                            <button type="submit" class="btn btn-primary btn-block">Add</button>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $('.js-datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
</body>

</html>                       