<?php

require_once "../connector/mysql.php";
$db = new DataBase();

if(isset($_POST['email']) && !empty($_POST['email'])){
    $arajanlatId = $_POST['arajanlatId'];
    $email = $_POST['email'];
    echo $email;
    $sqlId = "SELECT `user_id` FROM `user` WHERE `email` LIKE '$email';";
    $resultId = $db::$conn->query($sqlId);
    var_dump($resultId);
    if ($resultId->num_rows > 0) {
        while($row = $resultId->fetch_assoc()){
            $fogadoId = $row['user_id'];
        }
    }else{
        header("Location: ../homepage/homepage.php?page=arajanlat_keszites&success=done&id=$arajanlatId&error=nouser");
    }
    $sql = "UPDATE `arajanlat` SET `fogado_id`='$fogadoId' WHERE `arajanlat_id` = $arajanlatId;";
    $stmt = $db::$conn->prepare($sql);
    if($stmt->execute()){
        header("Location: ../homepage/homepage.php?page=arajanlat_keszites&success=sent");
    }else{
        echo "Hiba";
    }
}

?>