<?php
// start the session
session_start();
include('config.php')

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bursary Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
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
                            <a class="nav-link active" href="studentdashboard.php"> <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Registration.php"><i class="fas fa-user-graduate"></i>Registration</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="application.php"><i class="fas fa-book"></i>Bursary Application</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="successful.php"><i class="fas fa-check"></i>Shortlisted Applicants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php" onclick="<?php session_destroy(); ?>">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout</a>
                        </li>
                    </ul>
                </div>



                <div class="col-md-10 offset-md-2 content" style="overflow-y: auto;">
                </div>
            </div>
        </div>
    </div>
</body>
</html>