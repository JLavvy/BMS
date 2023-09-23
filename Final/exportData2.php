<?php
require('config.php');
require('fpdf/fpdf.php');

// Fetch records from database
$query = "SELECT * FROM loginn ORDER BY Login_id ASC";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    // Create a new PDF document
    $pdf = new FPDF();


    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Total Users', 0, 1, 'C');

    // Set column headers
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(70, 10, 'Login user name', 1);
    $pdf->Cell(70, 10, 'Login Rank', 1);
    $pdf->Ln();

    // Output each row of the data
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(70, 10, $row['Login_user_name'], 1);
        $pdf->Cell(70, 10, $row['Login_Rank'], 1);
        $pdf->Ln();
    }

    // Output the PDF as a download
    $filename = "signup-data_" . date('Y-m-d') . ".pdf";
    $pdf->Output($filename, 'D');
}
?>
