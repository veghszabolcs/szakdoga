<?php

require_once "../connector/mysql.php";
$db = new DataBase();

$email = $_SESSION['email'];
$nev = $_POST['nev'];
$telefon = $_POST['telefon'];
$sqlUserUpdate = "UPDATE `user` SET `nev`='$nev',`telefon`='$telefon' WHERE `email` LIKE '$email'";

if ($db::$conn->query($sql) === TRUE) {
    echo "User updated successfully";
} else {
    echo "Error updating user: ";
}

?>