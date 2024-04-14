<?php
require('../fpdf/fpdf.php');

// Validate input method and content
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tetel_nev']) && isset($_POST['meretegyseg']) && isset($_POST['tetel_mennyiseg'])) {
    // Get and sanitize form data
    $tetel_nev = array_map('htmlspecialchars', $_POST['tetel_nev']);
    $meretegyseg = array_map('htmlspecialchars', $_POST['meretegyseg']);
    $tetel_mennyiseg = array_map('htmlspecialchars', $_POST['tetel_mennyiseg']);

    // Create PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 12);

    // Set UTF-8 encoding and font
    $pdf->AddFont('DejaVu', '', '../fpdf/font/DejaVuSansCondensed.ttf', true);
    $pdf->SetFont('DejaVu', '', 12);

    // Output form data to PDF
    for ($i = 0; $i < count($tetel_nev); $i++) {
        $pdf->Cell(0, 10, 'Tétel neve: ' . $tetel_nev[$i], 0, 1);
        $pdf->Cell(0, 10, 'Mértékegység: ' . $meretegyseg[$i], 0, 1);
        $pdf->Cell(0, 10, 'Mennyiség: ' . $tetel_mennyiseg[$i], 0, 1);
        $pdf->Ln(10); // Add some space between each set of inputs
    }

    // Output PDF
    $pdf->Output();
} else {
    // Invalid request
    echo "Invalid request!";
}
?>
