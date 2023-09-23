<?php
include('config.php');
include('session.php');

if(isset($_GET['rejectid'])){
    $Application_id = $_GET['rejectid'];

    // Update the application status in the database
    $query = "UPDATE busary_applications SET status='Rejected' WHERE Application_id=$Application_id";
    $result = mysqli_query($con, $query);

    if($result) {
        // Redirect to a success page
        header('Location: admindashboard.php?id=' . $Application_id);
    } else {
        // Redirect to an dashboard page
        header('Location: admindashboard.php');
    }
}
?>
