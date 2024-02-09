<?php

require_once "../connector/mysql.php";
$db = new DataBase();
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'";

$result = $db::$conn->query($sql);

if ($result->num_rows > 0) {
    echo "exist";
} else {
    echo "notexist";
}

?>