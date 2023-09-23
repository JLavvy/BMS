<?php
include('config.php');
session_start();


// set timeout period in seconds
$inactive = 300; // 5 minutes

// check if session is active
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $inactive)) {
    // last request was more than 5 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    header("Location: login.php"); // redirect to login page
    exit();
}

// update last activity time stamp
$_SESSION['LAST_ACTIVITY'] = time();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Bursary System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            padding: 0;
            margin: 0;
            font-family: 'Lato', sans-serif;
            color: #000;
        }

        .student-profile .card h3 {
            font-size: 20px;
            font-weight: 700;
        }

        .student-profile .table th,
        .student-profile .table td {
            font-size: 14px;
            padding: 5px 10px;
            color: #000;
        }

        .sidebar .nav-link:hover {
            background-color: white !important;
        }
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





                <div class="col-md-10 offset-md-2">
                    <div class="content-wrapper">
                        <div class="content " style="overflow-y: auto;">


                            <div class="market-updates">
                                <div class="col-md-10 mb-3 market-update-gd">
                                    <div class="market-update-block clr-block-4">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <div class="border rounded bg-light h-100 shadow">
                                                    <i class="fas fa-users"></i> <span class="ml-2">Total Users</span>
                                                    <div>
                                                        <?php
                                                        require 'config.php';
                                                        $query = "SELECT Login_id FROM loginn ORDER BY Login_id";
                                                        $query_run = mysqli_query($con, $query);
                                                        $row = mysqli_num_rows($query_run);
                                                        echo '<h3> ' . $row . ' </h3>';
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <div class="border rounded bg-light h-100 shadow">
                                                    <i class="fas fa-users"></i> <span class="ml-2">Total Applicants</span>
                                                    <div>
                                                        <?php
                                                        require 'config.php';
                                                        $query = "SELECT Application_id FROM busary_applications ORDER BY Application_id";
                                                        $query_run = mysqli_query($con, $query);
                                                        $row = mysqli_num_rows($query_run);
                                                        echo '<h3> ' . $row . ' </h3>';
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <div class="border rounded bg-light h-100 shadow">
                                                    <i class="fas fa-users"></i> <span class="ml-2">Shortlisted Applicants</span>

                                                    <div>
                                                        <?php
                                                        require 'config.php';
                                                        $query = "SELECT Shortlisted_id FROM Shortlisted_applications ORDER BY Shortlisted_id";
                                                        $query_run = mysqli_query($con, $query);
                                                        $row = mysqli_num_rows($query_run);
                                                        echo '<h3> ' . $row . ' </h3>';

                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="Buutons">
                                    <button type="submit" id="submit" text=class="btn btn-light mb-3"><i class="fas fa-user-plus me-2"></i> <a href="add.php">Create User</a>
                                    </button>
                                    <div class="float-right">
                                        <a href="exportData2.php" class="btn btn-success"><i class="dwn"></i> Export</a>
                                    </div>
                                </div>



                                <br />
                                <div class="card ">

                                    <div class="card-body">
                                        <table class="table table-striped bg-light">
                                            <thead>
                                                <tr>
                                                    <th>User Name</th>
                                                    <th>Login Rank</th>
                                                    <th>Operations</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $select = "SELECT * FROM loginn";
                                                $result = mysqli_query($con, $select);
                                                if ($result) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $Login_id = $row['Login_id'];
                                                        $Login_user_name = $row['Login_user_name'];
                                                        $Login_Rank = $row['Login_Rank'];
                                                ?>
                                                        <tr>
                                                            <td><?= $Login_user_name ?></td>
                                                            <td><?= $Login_Rank ?></td>
                                                            <td>
                                                                <button class="btn btn-primary"><a href="update.php?updateid=<?= $Login_id ?>" class="text-light">Update</a></button>
                                                                <button class="btn btn-danger"><a href="delete.php?deleteid=<?= $Login_id ?>" class="text-light">Delete</a></button>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>