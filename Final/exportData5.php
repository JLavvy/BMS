<?php
include('config.php');

// Fetch records from database
$query = "SELECT * FROM shortlisted_applications ORDER BY Shortlisted_id ASC";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    $delimiter = ",";
    $filename = "Shortlisted-data_" . date('Y-m-d') . ".csv";

    // Create a file pointer
    $f = fopen('php://memory', 'w');

    // Set column headers
    $fields = array( 'Student Name', 'Amount', 'Date');
    fputcsv($f, $fields, $delimiter);

    // Output each row of the data, format line as csv and write to file pointer
    while ($row = mysqli_fetch_assoc($result)) {
        $Shortlisted_Application_id = $row['Shortlisted_Application_id'];
        $Student_sql = "SELECT s.Student_first_name, s.Student_Middle_name, s.Student_last_name FROM student s JOIN busary_applications b ON s.Student_id = b.Application_Student_id WHERE b.Application_id = '$Shortlisted_Application_id'";
        $Student_result = mysqli_query($con, $Student_sql);
        $Student_row = mysqli_fetch_assoc($Student_result);
        $first_name = $Student_row['Student_first_name'];
        $middle_name = $Student_row['Student_Middle_name'];
        $last_name = $Student_row['Student_last_name'];
        $student_name = $Student_row['Student_first_name'] . " " . $Student_row['Student_Middle_name'] . " " . $Student_row['Student_last_name'];


        $lineData = array( $student_name, $row['Shortlisted_Allocated_Amount'], $row['Shortlisted_Date']);
        fputcsv($f, $lineData, $delimiter);
    }

    // Move back to beginning of file
    fseek($f, 0);

    // Set headers to download file rather than displayed
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    // Output all remaining data on a file pointer
    fpassthru($f);
}

?>