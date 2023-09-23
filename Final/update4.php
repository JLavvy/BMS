
<?php
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // User data to insert into database
    $Application_id = $_GET['updateid'];
    $application_amount = mysqli_real_escape_string($con, $_POST["Application_amount"]);
    $semester = mysqli_real_escape_string($con, $_POST["Busary_semester"]);

    // Get busary ID for the given username
    $query = "SELECT Busary_id FROM busary WHERE Busary_semester = '$semester'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        // Fetch the bursary ID from the result
        $row = mysqli_fetch_assoc($result);
        $Busary_id = $row['Busary_id'];
    }

   

    $timestamp = date("Y-m-d H:i:s");
    $query = "UPDATE busary_applications SET 
      Application_amount='$application_amount', 
      Application_busary_id='$Busary_id'
  WHERE Application_id=$Application_id";
   

    $result = mysqli_query($con, $query);
    header('location:admindashboard.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration Form</title>
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
                                        <h2 class="title mb-4">Application Update</h2>

                                        <form method="POST">
                                            

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="Date">Semester</label>
                                                    <div class="input-group input-group-icon">
                                                        <input type="semester" class="form-control input--style-4" id="sem" name="Busary_semester">

                                                    </div>
                                                </div>


                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="Amount">Amount</label>
                                                        <div class="input-group input-group-icon">
                                                            <input type="int" class="form-control input--style-4" id="amount" name="Application_amount">

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>



                                            <button type="submit" class="btn btn-primary btn-block">Update</button>
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