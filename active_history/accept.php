<?php

require_once "../connector/mysql.php";
session_start();
$db = new DataBase();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset ($_POST['arajanlat_id'])) {
    $arajanlat_id = $_POST['arajanlat_id'];
    $fogadoId = $_SESSION['user_id'];
    $sql = "UPDATE `arajanlat` SET `statusz`= 1,`statuszvaltozasi_datum`= now() WHERE `fogado_id`= $fogadoId AND `arajanlat_id`= $arajanlat_id";

    $stmt = $db::$conn->prepare($sql);

    if ($stmt->execute()) {
        echo "Sikeres művelet!";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

?>