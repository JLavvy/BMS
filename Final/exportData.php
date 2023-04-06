<?php
include('config.php');


// Fetch records from database
$query = "SELECT * FROM universities ORDER BY University_id ASC";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    $delimiter = ",";
    $filename = "university-data_" . date('Y-m-d') . ".csv";

    // Create a file pointer
    $f = fopen('php://memory', 'w');

    // Set column headers
    $fields = array('University_id', 'University_name', 'University_Email', 'University_phone_number', 'University_code');
    fputcsv($f, $fields, $delimiter);

    // Output each row of the data, format line as csv and write to file pointer
    while ($row = mysqli_fetch_assoc($result)) {
        $lineData = array($row['University_id'], $row['University_name'], $row['University_Email'], $row['University_phone_number'], $row['University_code']);
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


<?php
include('config.php');


// Fetch records from database
$query = "SELECT * FROM loginn ORDER BY Login_id ASC";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    $delimiter = ",";
    $filename = "signup-data_" . date('Y-m-d') . ".csv";

    // Create a file pointer
    $f = fopen('php://memory', 'w');

    // Set column headers
    $fields = array('Login_id', 'Login_user_name', 'Login_Rank');
    fputcsv($f, $fields, $delimiter);

    // Output each row of the data, format line as csv and write to file pointer
    while ($row = mysqli_fetch_assoc($result)) {
        $lineData = array($row['Login_id'], $row['Login_user_name'], $row['Login_Rank']);
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