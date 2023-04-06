<?php
include ('config.php');

if (isset($_GET['deleteid'])){
    $Login_id=$_GET['deleteid'];

    $select="DELETE FROM loginn where Login_id=$Login_id";
    $result = mysqli_query($con, $select);
    if ( $result ){
        header('location:admindashboard.php'); 
    }else{
        die(mysqli_error($con));
    }
}
if (isset($_GET['deleteid'])){
    $Student_id=$_GET['deleteid'];

    $select="DELETE FROM student where Student_id=$Student_id";
    $result = mysqli_query($con, $select);
    if ( $result ){
        header('location:reg.php'); 
    }else{
        die(mysqli_error($con));
    }
}
if (isset($_GET['deleteid'])){
    $Application_id=$_GET['deleteid'];

    $select="DELETE FROM busary_applications where Application_id=$Application_id";
    $result = mysqli_query($con, $select);
    if ( $result ){
        header('location:applicants.php'); 
    }else{
        die(mysqli_error($con));
    }
}
if (isset($_GET['deleteid'])){
    $University_id=$_GET['deleteid'];

    $select="DELETE FROM universities where University_id=$University_id";
    $result = mysqli_query($con, $select);
    if ( $result ){
        header('location:versity.php'); 
    }else{
        die(mysqli_error($con));
    }
}
?>