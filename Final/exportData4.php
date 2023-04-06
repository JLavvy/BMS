<?php
include('config.php');

// Fetch records from database
$query = "SELECT * FROM busary_applications ORDER BY Application_id ASC";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    $delimiter = ",";
    $filename = "Applications-data_" . date('Y-m-d') . ".csv";

    // Create a file pointer
    $f = fopen('php://memory', 'w');

    // Set column headers
    $fields = array('Application_id', 'Student Name', 'Amount', 'Date', 'Semester');
    fputcsv($f, $fields, $delimiter);

    // Output each row of the data, format line as csv and write to file pointer
    while ($row = mysqli_fetch_assoc($result)) {
        $Application_Student_id = $row['Application_Student_id'];
        $Student_sql = "SELECT Student_first_name, Student_Middle_name, Student_last_name FROM student WHERE Student_id ='$Application_Student_id'";
        $Student_result = mysqli_query($con, $Student_sql);
        $Student_row = mysqli_fetch_assoc($Student_result);
        $student_name = $Student_row['Student_first_name'] . " " . $Student_row['Student_Middle_name'] . " " . $Student_row['Student_last_name'];

        $Application_Busary_id = $row['Application_Busary_id'];
        $busary_sql = "SELECT Busary_semester FROM busary WHERE Busary_id ='$Application_Busary_id'";
        $busary_result = mysqli_query($con, $busary_sql);
        $busary_row = mysqli_fetch_assoc($busary_result);
        $Busary_semester = $busary_row['Busary_semester'];

        $lineData = array($row['Application_id'], $student_name, $row['Application_amount'], $row['Application_date'], $Busary_semester);
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