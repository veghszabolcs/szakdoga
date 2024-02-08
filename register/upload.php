<?php

require_once "../connector/mysql.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo "Sikeres regisztráció!";
} else {
    echo "Email vagy jelszó hiányzik.";
}

$db = new DataBase();
$db->uploadUser($email, $password);

?>