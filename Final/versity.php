<?php
require_once('config.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>University</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>


    </style>
</head>

<body>
   
<header id="header" style="border-bottom: 2px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="logo">
                <img src="Images/image1.png" width="60" />
            </div>
            <a class="navbar-brand" href="#">BURSARY MANAGEMENT SYSTEM</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" style="color: #000;" onclick="<?php session_destroy(); ?>">
                        <i class="fas fa-sign-out-alt"></i>Logout
                    </a>
                </li>
            </ul>

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
                                <a class="nav-link active" href="admindashboard.php" style="color: #000;">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                </a>
                            </li>
                        </div>
                        <br />
                        <div class="nav-item-container">
                            <li class="nav-item">
                                <a class="nav-link active " href="reg.php" style="color: #000;">
                                    <i class="fas fa-users"></i>Students
                                </a>
                            </li>
                        </div>
                        <br />
                        <div class="nav-item-container">
                            <li class="nav-item">
                                <a class="nav-link" href="versity.php" style="color: #000;">
                                    <i class="fas fa-building"></i>Universities
                                </a>
                            </li>
                        </div>
                        <br />
                        <div class="nav-item-container">
                            <li class="nav-item">
                                <a class="nav-link" href="applicants.php" style="color: #000;">
                                    <i class="fas fa-users"></i>Total Applicants
                                </a>
                            </li>
                        </div>
                        <br />
                        <div class="nav-item-container">
                            <li class="nav-item">
                                <a class="nav-link" href="successful.php" style="color: #000;">
                                    <i class="fas fa-users"></i>Approve/ Reject
                                </a>
                            </li>
                        </div>
                        <br />
                        <div class="nav-item-container">
                            <li class="nav-item">
                                <a class="nav-link" href="shortlisted.php" style="color: #000;">
                                    <i class="fas fa-users"></i>Shortlisted Applicants
                                </a>
                            </li>
                        </div>
                        <br />
                        
                    </ul>
                </div>
                <div class="col-md-10 offset-md-2 content" style="overflow-y: auto;">
                    <button type="submit" id="submit" text=class="btn btn-light mb-3"><i class="fas fa-user-plus me-2"></i> <a href="add4.php">Add University</a>
                    </button>
                    <div class="float-right">
                        <a href="exportData.php" class="btn btn-success"><i class="dwn"></i> Export</a>
                    </div>
                    <table class="table table-borderless table-striped">
                        <thead>
                            <tr>
                                
                                <th scope="col">University Name</th>
                                <th scope="col">University Email</th>
                                <th scope="col">Phone </th>
                                <th scope="col">University Code</th>
                                <th scope="col">Operations</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $select = "SELECT * FROM universities";
                            $result = mysqli_query($con, $select);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $University_id = $row['University_id'];
                                    $University_name = $row['University_name'];
                                    $University_Email = $row['University_Email'];
                                    $University_phone_number = $row['University_phone_number'];
                                    $University_code = $row['University_code'];





                                    echo '
                    <tr>
                    <th scope="row">' . $University_name . '</th>
                    <td>' . $University_Email  . '</td>
                    <td>' . $University_phone_number . '</td>
                    <td>' . $University_code . '</td>

                  
                    

                    <td>
                    <button class="btn btn-primary" ><a href="update3.php?updateid='.$University_id.'" class ="text-light">
                        Update
                    </a></button>

                    <button class="btn btn-danger" ><a href="delete.php?deleteid='.$University_id.'" class ="text-light">
                        Delete
                    </a></button>

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
    </div>

</body>

</html>