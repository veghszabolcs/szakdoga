<?php
require_once('../fpdf/fpdf.php');
require_once('../connector/mysql.php');

$db = new DataBase();
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('arial', 'B', 30);

$pdf->Cell(0, 10, es('Árajánlat'), 0, 1, 'C');

$pdf->SetFont('arial', '', 12);

$pdf->Ln(10);
$pdf->Cell(0, 10, es('Ajánlatadó:   Cég neve: ') . es($_POST['company']['name']), 0, 1);
$pdf->Cell(25);
$pdf->Cell(0, 10, es('Cím: ') . es($_POST['company']['address']), 0, 1);
$pdf->Cell(25);
$pdf->Cell(0, 10, es('Adószám: ') . es($_POST['company']['taxNumber']), 0, 1);
$pdf->Cell(25);
$pdf->Cell(0, 10, es('Illetékes neve: ') . es($_POST['contact']['name']), 0, 1);
$pdf->Cell(25);
$pdf->Cell(0, 10, es('Illetékes telefonszáma: +36') . es($_POST['contact']['number']), 0, 1);

if (!(isset($_POST['tetel_nev']) && !empty($_POST['tetel_nev'])) && !(isset($_POST['szolgaltatas_nev']) && !empty($_POST['szolgaltatas_nev']))) {
    header("Location: ../homepage/homepage.php?page=arajanlat_keszites&error=empty");
}

$sumTetelek = 0;
if (isset($_POST['tetel_nev']) && !empty($_POST['tetel_nev'])) {
    $pdf->Ln(10);
    $pdf->SetFont('arial', 'B', 15);
    $pdf->Cell(0, 10, es('Tételek:'), 0, 1);
    $pdf->SetFont('arial', '', 12);
    $tetelek = $_POST['tetel_nev'];
    $mennyisegek = $_POST['tetel_mennyiseg'];
    $darabarak = $_POST['tetel_darabara'];
    $meretegysegek = $_POST['meretegyseg'];

    for ($i = 0; $i < count($tetelek); $i++) {
        $pdf->Cell(75, 10, es($tetelek[$i]), 'B', 0);
        $pdf->Cell(75, 10, es($mennyisegek[$i] . ' ' . $meretegysegek[$i]), 'B', 0);
        $pdf->Cell(0, 10, es($darabarak[$i]) . ' forint/db', 'B', 1);
        $sumTetelek += $mennyisegek[$i] * $darabarak[$i];
    }
}

$sumSzolgaltatasok = 0;
if (isset($_POST['szolgaltatas_nev']) && !empty($_POST['szolgaltatas_nev'])) {
    $pdf->Ln(10);
    $pdf->SetFont('arial', 'B', 15);
    $pdf->Cell(0, 10, es('Szolgáltatások:'), 0, 1);
    $pdf->SetFont('arial', '', 12);

    $szolgaltatasok = $_POST['szolgaltatas_nev'];
    $idotartamok = $_POST['ido_tartam'];
    $oradijak = $_POST['ora_dij'];

    for ($i = 0; $i < count($szolgaltatasok); $i++) {
        $pdf->Cell(75, 10, es($szolgaltatasok[$i]), 'B', 0);
        $pdf->Cell(75, 10, es($idotartamok[$i] . " óra"), 'B', 0);
        $pdf->Cell(0, 10, es($oradijak[$i]) . es(' forint/óra'), 'B', 1);
        $sumSzolgaltatasok += $idotartamok[$i] * $oradijak[$i];
    }
}
$hatarido = $_POST['hatarido'];
$keszult = $_POST['keszult'];
$afa = 27;
$pdf->Ln(10);
$pdf->Cell(125);
$pdf->SetFont('arial', 'B', 15);
$pdf->Cell(25, 10, es('Végösszeg:'), 0, 1);
$pdf->SetFont('arial', '', 12);
$pdf->Cell(125);
$pdf->Cell(25, 10, es("Nettó:"), 0, 0);
$pdf->Cell(30, 10, number_format($sumTetelek + $sumSzolgaltatasok) . " Ft", 0, 1, "R");
$pdf->Cell(125, 10, es("Készült: " . $keszult), 0, 0);
$pdf->Cell(25, 10, es("Áfa:"), 0, 0);
$pdf->Cell(30, 10, $afa . "%", 0, 1, "R");
$pdf->Cell(125, 10, es("Határidő: " . $hatarido), 0, 0);
$pdf->Cell(25, 10, es("Bruttó:"), 0, 0);
$pdf->Cell(30, 10, number_format(($sumTetelek + $sumSzolgaltatasok) * (($afa / 100) + 1), 0) . " Ft", 0, 1, "R");

session_start();
$userId = $_SESSION['user_id'];

$cegNev = $_POST['company']['name'];
$szekhely = $_POST['company']['address'];
$adoszam = $_POST['company']['taxNumber'];

$sqlCeg = "SELECT * FROM `ceg` WHERE `user_id` = $userId;";
$resultCegCheck = $db::$conn->query($sqlCeg);

if ($resultCegCheck->num_rows === 0) {
    $sqlCegInsert = "INSERT INTO `ceg` (`nev`, `szekhely`, `adoszam`, `user_id`) VALUES ('$cegNev', '$szekhely', $adoszam, $userId)";
    $db::$conn->query($sqlCegInsert);
}

$resultCeg = $db::$conn->query($sqlCeg);
if ($resultCeg->num_rows > 0) {
    while ($row = $resultCeg->fetch_assoc()) {
        $cegId = $row['ceg_id'];
    }
} else {
    echo "Hiba";
}

$sql = "INSERT INTO `arajanlat` (`kuldo_id`, `keszult`, `hatarido`)  VALUES ('$cegId','$keszult','$hatarido')";
$stmt = $db::$conn->prepare($sql);

if ($stmt->execute()) {
    $sql = "SELECT MAX(`arajanlat_id`) AS 'arajanlat_id' FROM `arajanlat`;";
    $result = $db::$conn->query($sql);
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $arajanlatId = $row['arajanlat_id'];
        }
        $filePath = '../arajanlatok/' . $arajanlatId . '.pdf';
        $pdf->Output($filePath, 'F');
        header("Location: ../homepage/homepage.php?page=arajanlat_keszites&success=done&id=$arajanlatId");
    } else {
        echo "Hiba";
    }
} else {
    echo "Hiba: " . $stmt->error;
}

function es($word)
{
    return mb_convert_encoding($word, 'ISO-8859-2', 'UTF-8');
}
