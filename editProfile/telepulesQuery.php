<?php 

require_once "../connector/mysql.php";

$db = new DataBase();
$irsz = $_POST['irsz'];
$sql = 'SELECT * FROM `telepules` WHERE `irsz` = '.$irsz.';';

$result = $db::$conn->query($sql);

if($result->num_rows>0){
    $row = $result->fetch_assoc();
    echo $row['telepules_nev'].", ";
}

?>