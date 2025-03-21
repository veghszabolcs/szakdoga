<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../arajanlat_page/style.css">
</head>

<body>

    <?php
    if (isset($_GET['success']) && $_GET['success'] === "done") {
        echo '
            <div class="popup" id="successPopup">
            <h1>Sikeres árajánlat készítés!</h1>
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <p>Elküldi valakinek?</p>
            <form method="post" action="../arajanlat_page/send.php">
                <label for="user">Címzett felhasználó email címe:</label>
                <input type="text" name="email" id="email">
                <input type="hidden" value="' . $_GET["id"] . '" name="arajanlatId">
                <button type="submit">Küldés</button>
            </form>';
        if (isset($_GET['error']) && $_GET['error'] === 'nouser') {
            echo '<p>Nincs felhasználó ilyen email címmel!</p>';
        }
        echo '<script src="../editProfile/script.js"></script>
        </div>';
    } elseif (isset($_GET['success']) && $_GET['success'] === "sent") {
        echo '<div class="popup" id="successPopup">
        <h1>Sikeresen elküldte az árajánlatot!</h1>
        <span class="close-btn" onclick="closePopup()">&times;</span>
        <script src="../editProfile/script.js"></script>
    </div>';
    }
    ?>

    <h1 id="title">Árajánlat készítése</h1>
    <div id="content">
        <form action="../arajanlat_page/pdf.php" method="post">
            <div id="head">
                <div id="headFirst">
                    <h1>Ajánlatadó: </h1>
                </div>
                <div id="headSecond">
                    <?php
                    require_once "../connector/mysql.php";
                    $db = new DataBase();

                    $userId = $_SESSION['user_id'];
                    $sqlCeg = "SELECT * FROM `ceg` WHERE `user_id` = $userId;";
                    $resultCeg = $db::$conn->query($sqlCeg);
                    $sqlUser = "SELECT * FROM `user` WHERE `user_id` = $userId;";
                    $resultUser = $db::$conn->query($sqlUser);
                    $userRow = $resultUser->fetch_assoc();
                    $cegRow = $resultCeg->fetch_assoc();
                    if ($resultCeg->num_rows > 0 && !empty($cegRow['nev']) && !empty($cegRow['szekhely']) && !empty($cegRow['adoszam']) && !empty($userRow['telefon'])) {
                        $row = $cegRow;
                        echo "Cég neve: " . $row['nev'] . "<br>";
                        echo '<input type="hidden" class="form-control" id="companyName" name="company[name]" placeholder="Adja meg a cég nevét" value="' . $row['nev'] . '">';
                        echo "Címe: " . $row['szekhely'] . "<br>";
                        echo '<input type="hidden" class="form-control" id="companyAddress" name="company[address]" placeholder="Adja meg a címet" value="' . $row['szekhely'] . '">';
                        echo "Adószáma: " . $row['adoszam'] . "<br>";
                        echo '<input type="hidden" class="form-control" id="taxNumber" name="company[taxNumber]" placeholder="Adja meg az adószámot" value="' . $row['adoszam'] . '">';
                        $sqlUser = "SELECT * FROM `user` WHERE `user_id` = $userId;";
                        $resultUser = $db::$conn->query($sqlUser);
                        $rowUser = $resultUser->fetch_assoc();
                        echo "Illetékes neve: " . $rowUser['nev'] . "<br>";
                        echo '<input type="hidden" class="form-control" id="contactPerson" name="contact[name]" placeholder="Adja meg az illetékes nevét" value="' . $rowUser['nev'] . '">';
                        echo "Illetékes telefonszáma: +36" . $rowUser['telefon'] . "<br>";
                        echo '<input type="hidden" class="form-control" id="contactNumber" name="contact[number]" placeholder="Adja meg az illetékes telefonszámát" value="' . $rowUser['telefon'] . '">';

                    } else {
                        echo "<h5>Adja meg adatait itt, vagy a profil szerkesztése menüpontban.</h5>";
                        echo '<div class="form-group">
                        <label for="companyName">Cég neve:</label>
                        <input type="text" class="form-control" id="companyName" maxlength="30" name="company[name]" placeholder="Adja meg a cég nevét" required>
                    </div>
                    <div class="form-group">
                        <label for="companyAddress">Cím:</label>
                        <input type="text" class="form-control" id="companyAddress" maxlength="30" name="company[address]" placeholder="Adja meg a címet" required>
                    </div>
                    <div class="form-group">
                        <label for="taxNumber">Adószám:</label>
                        <input type="text" class="form-control" id="taxNumber" pattern="[0-9]*" maxlength="10" minlength="10" name="company[taxNumber]" placeholder="Adja meg az adószámot" required>
                    </div>
                    <div class="form-group">
                        <label for="contactPerson">Illetékes neve:</label>
                        <input type="text" class="form-control" id="contactPerson" maxlength="30" name="contact[name]" placeholder="Adja meg az illetékes nevét" required>
                    </div>
                    <label for="contactNumber">Illetékes telefonszáma:</label><br>
                    <div class="form-group">
                        <div class="input-group mb-3">
                        <div class="phone-prefix">+36</div>
                        <input type="text" class="form-control" id="contactNumber" pattern="[0-9]*" maxlength="9" minlength="9" name="contact[number]" placeholder="Adja meg az illetékes telefonszámát" value="" required>
                        </div>
                    </div>';
                        
                    }
                    ?>
                </div>
            </div>
            <hr>
            <div id="tetel">
                <div id="tetelFirst">
                    <h1>Tételek: </h1>
                </div>
                <div id="tetelSecond">
                    <div id="tetelek"></div>
                    <button type="button" class="btn btn-secondary" onclick="addInput()">Tétel hozzáadása</button>
                </div>
            </div>
            <hr>
            <div id="szolgaltatas">
                <div id="szolgaltatasFirst">
                    <h1>Szolgáltatások: </h1>
                </div>
                <div id="szolgaltatasSecond">
                    <div id="szolgaltatasok"></div>
                    <button type="button" class="btn btn-secondary" onclick="addService()">Szolgáltatás
                        hozzáadása</button>
                </div>
            </div>
            <hr>
            <div id="hatarido">
                <div id="hataridoFirst">
                    <h1>Határidő: </h1>
                </div>
                <div id="hataridoSecond">
                    <label for="hatarido">Határidő dátuma:</label>
                    <input type="date" id="keszult" name="keszult" style="display: none;">
                    <input type="date" id="hataridoInput" name="hatarido" min="" max="2029-12-31" required>
                </div>
            </div>
            <button type="submit">mega send</button>
        </form>
    </div>
    <script src="../arajanlat_page/script.js"></script>
    <?php
    if (isset($_GET['error']) && $_GET['error'] === 'empty') {
        echo "<script type='text/javascript'>alert('Legalább egy tételt vagy szolgáltatást meg kell adnia!');</script>";
    }
    ?>
</body>

</html>