<?php
// start the session
session_start();
include('config.php')

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
        .name li {
            list-style: none;
        }
    </style>
</head>

<body>
    <section id="section">

        <div class="logo">
            <img src="Images/image1.png" width="60" />
        </div>
        <div class="name" style list>


            <li>
                <a class="nav-link active" href="#"> <i class="fas fa-tachometer-alt"></i>Dashboard</a>
            </li>
            <li>
                <a class="nav-link" href="profile.php"><i class="fas fa-user"></i>Profile</a>
            </li>
            <li>
                <a class="nav-link" href=""><i class="fas fa-user"></i>Bursaries</a>
            </li>
            <li>
                <a class="nav-link" href="logout.php" onclick="<?php session_destroy(); ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout</a>
            </li>

        </div>



    </section>





    <div class="col-md-10 offset-md-2 content" style="overflow-y: auto;">
        

        <table class="table table-borderless table-striped">
            <thead>
                <tr>
                    <th scope="col">Login ID</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Login Password</th>
                    <th scope="col">Login Rank</th>

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
                        $Login_Password = $row['Login_Password'];
                        $Login_Rank = $row['Login_Rank'];

                        echo '
                    <tr>
                    <th scope="row">' . $Login_id . '</th>
                    <td>' . $Login_user_name . '</td>
                    <td>' . $Login_Password . '</td>
                    <td>' . $Login_Rank . '</td>
                    

                    <td>
                    <button class="btn btn-primary" ><a href="update.php ? updateid=' . $Login_id . '" class ="text-light">
                        Update
                    </a></button>

                    <button class="btn btn-danger" ><a href="delete.php ? deleteid=' . $Login_id . '" class ="text-light">
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

    </main>

    </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>