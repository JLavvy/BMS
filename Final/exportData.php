<?php
require('config.php');
require('fpdf/fpdf.php');

// Fetch records from database
$query = "SELECT * FROM universities ORDER BY University_id ASC";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    // Create a new PDF document
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Universities Report', 0, 1, 'C');

    // Set column headers
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(65, 10, 'University Name', 1);
    $pdf->Cell(50, 10, 'University Email', 1);
    $pdf->Cell(55, 10, 'University phone number', 1);
    $pdf->Cell(20, 10, 'Code', 1);
    $pdf->Ln();

    // Output each row of the data
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(65, 10, $row['University_name'], 1);
        $pdf->Cell(50, 10, $row['University_Email'], 1);
        $pdf->Cell(55, 10, $row['University_phone_number'], 1);
        $pdf->Cell(20, 10, $row['University_code'], 1);
        $pdf->Ln();
    }

    // Output the PDF as a download
    $filename = "university-data_" . date('Y-m-d') . ".pdf";
    $pdf->Output($filename, 'D');
}
