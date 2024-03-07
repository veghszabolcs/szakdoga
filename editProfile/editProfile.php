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
            <div class="row">
                <div class="col-12">
                    <h3>Személyes adatok</h3>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Név:</span>
                        <input type="text" name="nev" id="nev" class="form-control" placeholder="Adja meg a nevét" value="<?php echo $nev??""; ?>">
                        <div class="error-message" id="nameError">Nem megfelelő név</div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Telefonszám:</span>
                        <input type="tel" name="telefon" class="form-control" id="telefon" placeholder="Adja meg a telefonszámát" value="<?php echo $telefon??""; ?>">
                    </div>
                    <hr>
                    <h3>Céges adatok</h3>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Cég neve:</span>
                        <input type="text" name="cegNev" class="form-control" placeholder="Adja meg a cég nevét" value="<?php echo $cegNev??""; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Irányítószám:</span>
                        <input type="tel" name="irsz" class="form-control" placeholder="Adja meg a cég irányítószámát" maxlength="4" pattern="[0-9]*" value="<?php echo $telepulesId??""; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Cím:</span>
                        <input type="text" name="cim" class="form-control" placeholder="Adja meg a cég címét" value="<?php echo $szekhely??""; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Kategória:</span>
                        <select name="kategoria" class="form-control custom-select">
                            <option value="default">Válasszon ki egy kategóriát</option>
                        </select>
                    </div>
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