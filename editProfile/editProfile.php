<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../editProfile/style.css">
</head>

<body>

    <?php require_once "../editProfile/getData.php"; ?>

    <form action="../editProfile/uploadChanges.php" method="post">
        <div class="container mt-5">
            <?php
            if (isset($_GET['edit'])) {
                if ($_GET['edit'] === "success") {
                    echo '<div class="popup" id="successPopup">
                                Sikeres adatmódosítás!
                                <span class="close-btn" onclick="closePopup()">&times;</span>
                                </div>';
                } else {
                    echo '<div class="popup" id="failPopup">
                                Sikertelen adatmódosítás!
                                <span class="close-btn" onclick="closePopup()">&times;</span>
                                </div>';
                }
            }
            ?>

            <div class="row">
                <div class="col-12">
                    <h3>Személyes adatok</h3>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Név:</span>
                        <input type="text" name="nev" id="nev" class="form-control" placeholder="Adja meg a nevét" value="<?php echo $nev ?? ""; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Telefonszám:</span>
                        <div class="phone-prefix">+36</div>
                        <input type="tel" name="telefon" class="form-control" pattern="[0-9]*" maxlength="9" id="telefon" placeholder="Adja meg a telefonszámát" value="<?php echo $telefon ?? ""; ?>">
                    </div>
                    <hr>
                    <h3>Céges adatok</h3>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Cég neve:</span>
                        <input type="text" name="cegNev" class="form-control" placeholder="Adja meg a cég nevét" value="<?php echo $cegNev ?? ""; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Irányítószám:</span>
                        <input type="tel" name="irsz" class="form-control" placeholder="Adja meg a cég irányítószámát" maxlength="4" minlength="4" pattern="[0-9]*" value="<?php echo $irsz ?? ""; ?>" oninput="checkInputLength(this)">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Cím:</span>
                        <input type="text" name="cim" id="cim" class="form-control" placeholder="Adja meg a cég címét" value="<?php echo $szekhely ?? ""; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Adószám:</span>
                        <input type="text" name="adoszam" pattern="[0-9]*" maxlength="11" minlength="11" id="adoszam" class="form-control" placeholder="Adja meg a cég adószámát" value="<?php echo $adoszam ?? ""; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Kategória:</span>
                        <select name="kategoria" class="form-control custom-select">
                            <option value="0">Válasszon ki egy kategóriát</option>
                            <?php
                            while ($row = $resultKategoria->fetch_assoc()) {
                                echo "<option value='".$row['kategoria_id']."'";
                                if($row['kategoria_id']===$selectedKategoria){
                                    echo "selected";
                                }
                                echo ">" .$row['kategoria'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <input type="checkbox" name="cegExists" class="hidden" <?php echo ($cegExists ? 'checked' : '');?>>
                    <hr>
                    <div class="d-flex justify-content-center">
                        <button type="submit" id="submit">Adatok módosítása</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="../editProfile/script.js"></script>
</body>

</html>