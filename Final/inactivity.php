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
