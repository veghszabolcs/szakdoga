<?php

require_once "../connector/mysql.php";

$db = new DataBase();
$email = $_SESSION['email'];

$sqlGetUserId = "SELECT * FROM `user` WHERE `email` LIKE '$email';";
$resultUser = $db::$conn->query($sqlGetUserId);

if ($resultUser->num_rows > 0) {
    while ($row = $resultUser->fetch_assoc()) {
        $userId = $row["user_id"];
    }
} else {
    echo "Hiba";
}

$sqlArajanlat = "SELECT * FROM `arajanlat` WHERE `fogado_id` = $userId;";
$resultArajanlat = $db::$conn->query($sqlArajanlat);

?>