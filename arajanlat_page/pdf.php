<?php
require_once('../fpdf/fpdf.php');

// FPDF objektum létrehozása
$pdf = new FPDF();
$pdf->AddPage();

// Betűtípus és méret beállítása
$pdf->SetFont('arial', '', 12);

// Cím
$pdf->Cell(0, 10, urldecode(em('Árajánlat')), 0, 1, 'C');

// Ajánlatadó adatai
$pdf->Ln(10); // Üres sor hozzáadása
$pdf->Cell(0, 10, urldecode(em('Ajánlatadó:')), 0, 1);
$pdf->Cell(0, 10, urldecode(em('Cég neve: ')) . urldecode(em($_POST['company']['name'])), 0, 1);
$pdf->Cell(0, 10, urldecode(em('Cím: ')) . urldecode(em($_POST['company']['address'])), 0, 1);
$pdf->Cell(0, 10, urldecode(em('Adószám: ')) . urldecode(em($_POST['company']['taxNumber'])), 0, 1);
$pdf->Cell(0, 10, urldecode(em('Illetékes neve: ')) . urldecode(em($_POST['contact']['name'])), 0, 1);
$pdf->Cell(0, 10, urldecode(em('Illetékes telefonszáma: ')) . urldecode(em($_POST['contact']['number'])), 0, 1);

// Tételek
if(isset($_POST['tetel_nev']) && !empty($_POST['tetel_nev'])) {
    $pdf->Ln(10); // Üres sor hozzáadása
    $pdf->Cell(0, 10, urldecode(em('Tételek:')), 0, 1);
    $tetelek = $_POST['tetel_nev'];
    $mennyisegek = $_POST['tetel_mennyiseg'];
    $darabarak = $_POST['tetel_darabara'];
    $meretegysegek = $_POST['meretegyseg'];

    for ($i = 0; $i < count($tetelek); $i++) {
        $pdf->Cell(0, 10, urldecode(em('Tétel neve: ')) . urldecode(em($tetelek[$i])), 0, 1);
        $pdf->Cell(0, 10, urldecode(em('Mennyiség: ')) . urldecode(em($mennyisegek[$i] . ' ' . $meretegysegek[$i])), 0, 1);
        $pdf->Cell(0, 10, urldecode(em('Darabár: ')) . urldecode(em($darabarak[$i])), 0, 1);
    }
}

// Szolgáltatások
if(isset($_POST['szolgaltatas_nev']) && !empty($_POST['szolgaltatas_nev'])) {
    $pdf->Ln(10); // Üres sor hozzáadása
    $pdf->Cell(0, 10, urldecode(em('Szolgáltatások:')), 0, 1);
    $szolgaltatasok = $_POST['szolgaltatas_nev'];
    $oradijak = $_POST['ora_dij'];

    for ($i = 0; $i < count($szolgaltatasok); $i++) {
        $pdf->Cell(0, 10, urldecode(em('Szolgáltatás neve: ')) . urldecode(em($szolgaltatasok[$i])), 0, 1);
        $pdf->Cell(0, 10, urldecode(em('Óradíj: ')) . urldecode(em($oradijak[$i])), 0, 1);
    }
}

// Fájl kimenet
$pdf->Output();

function em($word) {

    $word = str_replace("@","%40",$word);
    $word = str_replace("`","%60",$word);
    $word = str_replace("¢","%A2",$word);
    $word = str_replace("£","%A3",$word);
    $word = str_replace("¥","%A5",$word);
    $word = str_replace("|","%A6",$word);
    $word = str_replace("«","%AB",$word);
    $word = str_replace("¬","%AC",$word);
    $word = str_replace("¯","%AD",$word);
    $word = str_replace("º","%B0",$word);
    $word = str_replace("±","%B1",$word);
    $word = str_replace("ª","%B2",$word);
    $word = str_replace("µ","%B5",$word);
    $word = str_replace("»","%BB",$word);
    $word = str_replace("¼","%BC",$word);
    $word = str_replace("½","%BD",$word);
    $word = str_replace("¿","%BF",$word);
    $word = str_replace("À","%C0",$word);
    $word = str_replace("Á","%C1",$word);
    $word = str_replace("Â","%C2",$word);
    $word = str_replace("Ã","%C3",$word);
    $word = str_replace("Ä","%C4",$word);
    $word = str_replace("Å","%C5",$word);
    $word = str_replace("Æ","%C6",$word);
    $word = str_replace("Ç","%C7",$word);
    $word = str_replace("È","%C8",$word);
    $word = str_replace("É","%C9",$word);
    $word = str_replace("Ê","%CA",$word);
    $word = str_replace("Ë","%CB",$word);
    $word = str_replace("Ì","%CC",$word);
    $word = str_replace("Í","%CD",$word);
    $word = str_replace("Î","%CE",$word);
    $word = str_replace("Ï","%CF",$word);
    $word = str_replace("Ð","%D0",$word);
    $word = str_replace("Ñ","%D1",$word);
    $word = str_replace("Ò","%D2",$word);
    $word = str_replace("Ó","%D3",$word);
    $word = str_replace("Ô","%D4",$word);
    $word = str_replace("Õ","%D5",$word);
    $word = str_replace("Ö","%D6",$word);
    $word = str_replace("Ø","%D8",$word);
    $word = str_replace("Ù","%D9",$word);
    $word = str_replace("Ú","%DA",$word);
    $word = str_replace("Û","%DB",$word);
    $word = str_replace("Ü","%DC",$word);
    $word = str_replace("Ý","%DD",$word);
    $word = str_replace("Þ","%DE",$word);
    $word = str_replace("ß","%DF",$word);
    $word = str_replace("à","%E0",$word);
    $word = str_replace("á","%E1",$word);
    $word = str_replace("â","%E2",$word);
    $word = str_replace("ã","%E3",$word);
    $word = str_replace("ä","%E4",$word);
    $word = str_replace("å","%E5",$word);
    $word = str_replace("æ","%E6",$word);
    $word = str_replace("ç","%E7",$word);
    $word = str_replace("è","%E8",$word);
    $word = str_replace("é","%E9",$word);
    $word = str_replace("ê","%EA",$word);
    $word = str_replace("ë","%EB",$word);
    $word = str_replace("ì","%EC",$word);
    $word = str_replace("í","%ED",$word);
    $word = str_replace("î","%EE",$word);
    $word = str_replace("ï","%EF",$word);
    $word = str_replace("ð","%F0",$word);
    $word = str_replace("ñ","%F1",$word);
    $word = str_replace("ò","%F2",$word);
    $word = str_replace("ó","%F3",$word);
    $word = str_replace("ô","%F4",$word);
    $word = str_replace("õ","%F5",$word);
    $word = str_replace("ö","%F6",$word);
    $word = str_replace("÷","%F7",$word);
    $word = str_replace("ø","%F8",$word);
    $word = str_replace("ù","%F9",$word);
    $word = str_replace("ú","%FA",$word);
    $word = str_replace("û","%FB",$word);
    $word = str_replace("ü","%FC",$word);
    $word = str_replace("ý","%FD",$word);
    $word = str_replace("þ","%FE",$word);
    $word = str_replace("ÿ","%FF",$word);
    return $word;
}
?>