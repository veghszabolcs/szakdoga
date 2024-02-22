<?php

require_once "../connector/mysql.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    echo "Sikeres regisztráció!";
} 

$db = new DataBase();
$db->uploadUser($email, $hashedPassword);

?>