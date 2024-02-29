<?php

require_once "../connector/mysql.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["loginEmail"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: register.php?error=email");
        exit;
    }

    $password = $_POST["loginPassword"];
    $passwordSecond = $_POST["loginPasswordSecond"];
    if (strlen($password) < 7 || strlen($password) > 16 || strlen($passwordSecond) < 7 || strlen($passwordSecond) > 16) {
        header("Location: register.php?error=password_length");
        exit;
    }

    if (!preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password)) {
        header("Location: register.php?error=password_characters");
        exit;
    }

    if($password != $passwordSecond){
        header("Location: register.php?error=password_match");
        exit;
    }

    if (userAlreadyExists($email)) {
        header("Location: register.php?error=user_exists");
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $db = new DataBase();
    $db->uploadUser($email, $hashedPassword);
    header("Location: ../login/index.php?msg=register_success");
    exit;
}

function userAlreadyExists($email) {
    $db = new DataBase();
    $email = $_POST['loginEmail'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $sql = "SELECT * FROM `user`WHERE email = '$email'";

    $result = $db::$conn->query($sql);

    if($result->num_rows>0){
        return true;
    }else{
        return false;
    }
}
?>
