<?php

require_once '../connector/mysql.php';
$db = new DataBase();
$email = $_SESSION['email'];

//user query
$sqlUser = "SELECT * FROM `user` WHERE `email` LIKE '$email';";

$resultUser = $db::$conn->query($sqlUser);

if ($resultUser->num_rows > 0) {
    while ($row = $resultUser->fetch_assoc()) {
        $userId = $row["user_id"];
        $nev = $row["nev"];
        $telefon = $row["telefon"];
    }
} else {
    echo "Hiba";
}


$sqlCeg = "SELECT * FROM `ceg` WHERE `user_id` = $userId;";

$resultCeg = $db::$conn->query($sqlCeg);

if ($resultCeg->num_rows > 0) {
    while ($row = $resultCeg->fetch_assoc()) {
        $cegId = $row["ceg_id"];
        $cegNev = $row["nev"];
        if (!empty($row['telepules_id'])) {
            $telepulesId = $row['telepules_id'];
        } else {
            $telepulesId = 10000;
        }
        $sqlGetTelepulesId = "SELECT `irsz` FROM `telepules` WHERE `telepules_id` = $telepulesId";
        $resultTelepules = $db::$conn->query($sqlGetTelepulesId);
        if ($resultTelepules->num_rows > 0) {
            $rowTelepules = $resultTelepules->fetch_assoc();
            $irsz = $rowTelepules['irsz'];
        }
        $szekhely = $row["szekhely"];
        $kategoria = $row["kategoria_id"];
        $adoszam = $row["adoszam"];
        $cegExists = true;
    }
} else {
    $cegExists = false;
}

//fill select
$sqlKategoria = 'SELECT * FROM `kategoria`;';
$resultKategoria = $db::$conn->query($sqlKategoria);

//kategoria query
$sqlSelectedKategoria = "SELECT `kategoria_id` FROM `ceg` WHERE `user_id` = $userId";
$resultSelectedKategoria = $db::$conn->query($sqlSelectedKategoria);
if ($resultSelectedKategoria->num_rows > 0) {
    $rowKategoria = $resultSelectedKategoria->fetch_assoc();
    $selectedKategoria = $rowKategoria['kategoria_id'];
}
