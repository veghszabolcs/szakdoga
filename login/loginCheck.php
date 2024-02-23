<?php

require_once "../connector/mysql.php";
$db = new DataBase();
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM `user` WHERE `email` = '$email'";

$result = $db::$conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['email'] = $email;
        header("Location: ../homepage/homepage.php");
        exit;
    } else {
        header("Location: index.php?error=a");
        exit;
    }
} else {
    header("Location: index.php?error=incorrect_credentials");
    exit;
}

?>