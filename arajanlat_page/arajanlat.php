<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../arajanlat_page/style.css">
</head>

<body>

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
                    if ($resultCeg->num_rows > 0) {
                        while ($row = $resultCeg->fetch_assoc()) {
                            echo "Cég neve: " . $row['nev'] . "<br>";
                            echo '<input type="hidden" class="form-control" id="companyName" name="company[name]" placeholder="Adja meg a cég nevét" value="'.$row['nev'].'">';
                            echo "Címe: " . $row['szekhely'] . "<br>";
                            echo '<input type="hidden" class="form-control" id="companyAddress" name="company[address]" placeholder="Adja meg a címet" value="'.$row['szekhely'].'">';
                            echo "Adószáma: " . $row['adoszam'] . "<br>";
                            echo '<input type="hidden" class="form-control" id="taxNumber" name="company[taxNumber]" placeholder="Adja meg az adószámot" value="'.$row['adoszam'].'">';
                            $sqlUser = "SELECT * FROM `user` WHERE `user_id` = $userId;";
                            $resultUser = $db::$conn->query($sqlUser);
                            $rowUser = $resultUser->fetch_assoc();
                            echo "Illetékes neve: " . $rowUser['nev'] . "<br>";
                            echo '<input type="hidden" class="form-control" id="contactPerson" name="contact[name]" placeholder="Adja meg az illetékes nevét" value="'.$rowUser['nev'].'">';
                            echo "Illetékes telefonszáma: +36" . $rowUser['telefon'] . "<br>";
                            echo '<input type="hidden" class="form-control" id="contactNumber" name="contact[number]" placeholder="Adja meg az illetékes telefonszámát" value="'.$rowUser['telefon'].'">';
                        }
                    } else {
                        echo "<h5>Adja meg adatait itt, vagy a profil szerkesztése menüpontban.</h5>";
                        echo '<div class="form-group">
                        <label for="companyName">Cég neve:</label>
                        <input type="text" class="form-control" id="companyName" name="company[companyName]" placeholder="Adja meg a cég nevét" required>
                    </div>
                    <div class="form-group">
                        <label for="companyAddress">Cím:</label>
                        <input type="text" class="form-control" id="companyAddress" name="company[companyAddress]" placeholder="Adja meg a címet" required>
                    </div>
                    <div class="form-group">
                        <label for="taxNumber">Adószám:</label>
                        <input type="text" class="form-control" id="taxNumber" name="company[taxNumber]" placeholder="Adja meg az adószámot" required>
                    </div>
                    <div class="form-group">
                        <label for="contactPerson">Illetékes neve:</label>
                        <input type="text" class="form-control" id="contactPerson" name="contact[name]" placeholder="Adja meg az illetékes nevét" required>
                    </div>
                    <div class="form-group">
                        <label for="contactNumber">Illetékes telefonszáma:</label>
                        <input type="tel" class="form-control" id="contactNumber" name="contact[number]" placeholder="Adja meg az illetékes telefonszámát" required>
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
                    <button type="button" class="btn btn-secondary" onclick="addService()">Szolgáltatás hozzáadása</button>
                </div>
            </div>
            <button type="submit">mega send</button>
        </form>
    </div>
    <script src="../arajanlat_page/script.js"></script>
</body>

</html>