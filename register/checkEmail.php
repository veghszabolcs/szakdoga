<?php

require_once "../connector/mysql.php";
if (isset($_POST['email']) && !empty($_POST['email'])) {
    $db = new DataBase();

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $sql = "SELECT * FROM `user`WHERE email = '$email'";

    $result = $db::$conn->query($sql);

    if($result->num_rows>0){
        echo "exist";
    }else{
        echo "notexist";
    }
}

?>