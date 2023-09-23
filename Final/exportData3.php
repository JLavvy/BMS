<?php
require('config.php');
require('fpdf/fpdf.php');

// Fetch records from database
$query = "SELECT s.Student_id, s.Student_first_name, s.Student_Middle_name, s.Student_last_name, s.Student_email_address, s.Student_phone_number, s.Student_reg_number, s.Student_course, s.Student_year_of_admission, w.ward_name, u.University_name 
FROM student s 
JOIN ward w ON s.Student_ward_id = w.ward_id 
JOIN universities u ON s.Student_university_id = u.University_id
ORDER BY s.Student_id ASC";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    // Create a new PDF document
    $pdf = new FPDF('L', 'mm', 'A3');

    // Set header
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Student Reports', 0, 1, 'C');

    // Set column headers
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(25, 10, 'First Name', 1);
    $pdf->Cell(30, 10, 'Middle Name', 1);
    $pdf->Cell(25, 10, 'Last Name', 1);
    $pdf->Cell(50, 10, 'Email', 1);
    $pdf->Cell(35, 10, 'Phone Number', 1);
    $pdf->Cell(35, 10, 'Reg Number', 1);
    $pdf->Cell(50, 10, 'Course', 1);
    $pdf->Cell(25, 10, 'YOA', 1);
    $pdf->Cell(30, 10, 'Ward', 1);
    $pdf->Cell(80, 10, 'University', 1);
    $pdf->Ln();

    // Output each row of the data
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(25, 10, $row['Student_first_name'], 1);
        $pdf->Cell(30, 10, $row['Student_Middle_name'], 1);
        $pdf->Cell(25, 10, $row['Student_last_name'], 1);
        $pdf->Cell(50, 10, $row['Student_email_address'], 1);
        $pdf->Cell(35, 10, $row['Student_phone_number'], 1);
        $pdf->Cell(35, 10, $row['Student_reg_number'], 1);
        $pdf->Cell(50, 10, $row['Student_course'], 1);
        $pdf->Cell(25, 10, $row['Student_year_of_admission'], 1);
        $pdf->Cell(30, 10, $row['ward_name'], 1);
        $pdf->Cell(80, 10, $row['University_name'], 1);
        $pdf->Ln();
    }

    // Output the PDF as a download
    $filename = "Student-data_" . date('Y-m-d') . ".pdf";
    $pdf->Output($filename, 'D');
}
?>

