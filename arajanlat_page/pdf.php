<?php

    require_once "../fpdf/fpdf.php";

    // Get form inputs
    $input1 = $_POST['nev'];
    $input2 = $_POST['ar'];
    $input3 = $_POST['db'];

    // Create a new PDF instance
    $pdf = new FPDF();
    $pdf->AddPage();

    // Set font for the PDF
    $pdf->SetFont('Arial', 'B', 16);

    // Add inputs to the PDF
    $pdf->Cell(0, 10, 'Input 1: ' . $input1, 0, 1);
    $pdf->Cell(0, 10, 'Input 2: ' . $input2, 0, 1);
    $pdf->Cell(0, 10, 'Input 3: ' . $input3, 0, 1);

    // Output PDF as a file
    $pdfFilePath = '../arajanlatok/output.pdf';
    $pdf->Output($pdfFilePath, 'F');

?>
