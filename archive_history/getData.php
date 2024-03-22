<?php

require_once "../connector/mysql.php";

$db = new DataBase();

$userId = $_SESSION['user_id'];
$sqlArajanlatReceived = "SELECT * FROM `arajanlat` WHERE `fogado_id` = $userId AND `statusz` IS NOT NULL;";
$resultArajanlatReceived = $db::$conn->query($sqlArajanlatReceived);


$sqlGetCeg = "SELECT * FROM `ceg` WHERE `user_id` = $userId";
$resultCeg = $db::$conn->query($sqlGetCeg);
if ($resultCeg->num_rows > 0) {
    while ($row = $resultCeg->fetch_assoc()) {
        $cegId = $row["ceg_id"];
    }
    $sqlArajanlatSent = "SELECT * FROM `arajanlat` WHERE `kuldo_id` = $cegId AND `statusz` IS NOT NULL;";
    $resultArajanlatSent = $db::$conn->query($sqlArajanlatSent);
} else {
    $resultArajanlatSent = "";
}

?>