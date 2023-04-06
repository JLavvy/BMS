<?php
include('config.php');

// Fetch records from database
$query = "SELECT s.Student_id, s.Student_first_name, s.Student_Middle_name, s.Student_last_name, s.Student_email_address, s.Student_phone_number, s.Student_reg_number, s.Student_course, s.Student_year_of_admission, w.ward_name, u.University_name 
FROM student s 
JOIN ward w ON s.Student_ward_id = w.ward_id 
JOIN universities u ON s.Student_university_id = u.University_id
ORDER BY s.Student_id ASC";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    $delimiter = ",";
    $filename = "Student-data_" . date('Y-m-d') . ".csv";

    // Create a file pointer
    $f = fopen('php://memory', 'w');

    // Set column headers
    $fields = array('Student_id','Student_first_name', 'Student_Middle_name', 'Student_last_name', 'Student_email_address','Student_phone_number', 'Student_reg_number', 'Student_course','Student_year_of_admission', 'Student_ward',' Student_University');
    fputcsv($f, $fields, $delimiter);

    // Output each row of the data, format line as csv and write to file pointer
    while ($row = mysqli_fetch_assoc($result)) {
        $lineData = array($row['Student_id'], $row['Student_first_name'],$row['Student_Middle_name'],$row['Student_last_name'],$row['Student_email_address'],$row['Student_phone_number'],$row['Student_reg_number'],$row['Student_course'],$row['Student_year_of_admission'],$row['ward_name'],$row['University_name']);
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