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

//ceg query
$sqlCeg = "SELECT * FROM `ceg` WHERE `user_id` = $userId;";

$resultCeg = $db::$conn->query($sqlCeg);

if ($resultCeg->num_rows > 0) {
    while ($row = $resultCeg->fetch_assoc()) {
        $cegId = $row["ceg_id"];
        $cegNev = $row["nev"];
        $telepulesId = $row["telepules_id"];
        $szekhely = $row["szekhely"];
        $kategoria = $row["kategoria"];
        $adoszam = $row["adoszam"];
        $cegExists = true;
    }
} else {
    $cegExists = false;
}

?>