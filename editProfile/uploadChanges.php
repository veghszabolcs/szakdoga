<?php

session_start();

require_once "../connector/mysql.php";
$db = new DataBase();

$email = $_SESSION['email'];
$nev = $_POST['nev'];
$telefon = $_POST['telefon'];

$cegExists = isset($_POST['cegExists']);

$sqlUserUpdate = "UPDATE `user` SET `nev`='$nev', `telefon`='$telefon' WHERE `email` LIKE '$email'";


if ($db::$conn->query($sqlUserUpdate) !== TRUE) {
    header("Location: ../homepage/homepage.php?page=edit_profile&edit=fail");
} else {
    if (empty($_POST['cegNev']) || empty($_POST['cim']) || empty($_POST['kategoria']) || empty($_POST['adoszam']) || empty($_POST['irsz'])) {
        header("Location: ../homepage/homepage.php?page=edit_profile&edit=fail");
    }
    $sqlGetUserId = "SELECT `user_id` FROM `user` WHERE `email` LIKE '$email'";
    $result = $db::$conn->query($sqlGetUserId);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];

        if (isset($_POST['cegNev'])) $cegNev = $_POST['cegNev'];
        if (isset($_POST['cim'])) $szekhely = $_POST['cim'];
        if (isset($_POST['kategoria'])) $kategoria = $_POST['kategoria'];
        if (isset($_POST['adoszam'])) $adoszam = $_POST['adoszam'];
        if (isset($_POST['irsz']) && !empty($_POST['irsz'])) {
            $irsz = $_POST['irsz'];

            $sqlGetTelepulesId = "SELECT `telepules_id` FROM `telepules` WHERE `irsz` = $irsz";
            $result = $db::$conn->query($sqlGetTelepulesId);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $telepulesId = $row['telepules_id'];
            }
        }

        if ($cegExists) {
            if ($kategoria < 1) {
                $sqlCegInsert = "UPDATE `ceg` SET `telepules_id` = $telepulesId, `nev` = '$cegNev', `szekhely` = '$szekhely', `adoszam` = $adoszam WHERE `user_id` = $user_id";
            } else {
                $sqlCegInsert = "UPDATE `ceg` SET `telepules_id` = $telepulesId, `nev` = '$cegNev', `szekhely` = '$szekhely', `kategoria_id` = " . ($kategoria) . ", `adoszam` = $adoszam WHERE `user_id` = $user_id";
            }
        } else {
            if ($kategoria < 1) {
                $sqlCegInsert = "INSERT INTO `ceg` (`telepules_id`, `nev`, `szekhely`, `adoszam`, `user_id`) VALUES ($telepulesId, '$cegNev', '$szekhely', $adoszam, $user_id)";
            } else {
                $sqlCegInsert = "INSERT INTO `ceg` (`telepules_id`, `nev`, `szekhely`, `kategoria_id`, `adoszam`, `user_id`) VALUES ($telepulesId, '$cegNev', '$szekhely', " . ($kategoria) . ", $adoszam, $user_id)";
            }
        }

        if ($db::$conn->query($sqlCegInsert) === TRUE) {
            header("Location: ../homepage/homepage.php?page=edit_profile&edit=success");
        } else {
            header("Location: ../homepage/homepage.php?page=edit_profile&edit=fail");
        }
    } else {
        header("Location: ../homepage/homepage.php?page=edit_profile&edit=fail");
    }
}
