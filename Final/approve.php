
<?php
include('config.php');
include('session.php');

if(isset($_GET['approveid'])){
    $Application_id = $_GET['approveid'];

    // Update the application status in the database
    $query = "UPDATE busary_applications SET Application_status='Approved' WHERE Application_id=$Application_id";
    $result = mysqli_query($con, $query);

    if($result) {
        // Insert approved application into shortlisted_applicants table
        $timestamp = date("Y-m-d H:i:s");
        $query = "INSERT INTO shortlisted_applications (Shortlisted_Application_id, Shortlisted_Allocated_Amount,	Shortlisted_Date) VALUES ('$Application_id', '10000', '$timestamp')";
        $result = mysqli_query($con, $query);

        if($result) {
            // Redirect to a success page
            header('Location: admindashboard.php?id=' . $Application_id);
        } else {
            // Redirect to an error page
            header('Location: admindashboard.php');
        }
    }    
}
?>

