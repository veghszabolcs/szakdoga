<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Árajánlat készítő</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="hu">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Árajánlat készítő</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>

    <body>
        <script src="./script.js"></script>
        <h1 id="title" class="text-center">Árajánlat készítő weboldal</h1>
        <div id="login-interface" class="w-100 d-flex p-2 justify-content-center">

            <form action="validate_registration.php" id="login-form" class="" method="post">
                <div class="d-flex justify-content-between">
                    <a href="../login/index.php" id="back">Vissza-></a>
                    <h2 class="text-center align-self-center" id="register-title">Regisztráció</h2>
                    <div id="filler"></div>
                </div>

                <div id="login-inputs" class="">
                    <div class="justify-content-center">
                        <label for="loginEmail" class="">Email cím:</label>
                        <input type="email" id="loginEmail" name="loginEmail" class="form-control form-input" value="<?php echo isset($_POST['loginEmail'])?>">
                    </div>
                    <div class="form-outline">
                        <div class="d-flex justify-content-between">
                            <label for="loginPassword" class="mr-auto ">Jelszó:</label>
                            <div>
                                <input type="checkbox" class="showPasswordBox" onclick="showPassword()">Jelszó
                                megjelenítése
                            </div>
                        </div>
                        <input type="password" id="loginPassword" name="loginPassword" class="form-control form-input">
                    </div>
                    <div class="form-outline mb-3">
                        <div class="d-flex justify-content-between">
                            <label for="loginPassword" class="mr-auto input-label">Jelszó mégegyszer:</label>
                            <div>
                                <input type="checkbox" class="showPasswordBox" onclick="showPasswordSecond()">Jelszó
                                megjelenítése
                            </div>
                        </div>
                        <input type="password" id="loginPasswordSecond" name="loginPasswordSecond" class="form-control form-input">
                    </div>
                    <div>
                        <?php
                            if (isset($_GET['error'])){
                                if($_GET['error']=='email'){
                                    echo '<p id="emailError">Adjon meg egy érvényes email címet!</p>';
                                }else if($_GET['error']=='password_length'){
                                    echo '<p id="passwordLengthError">A jelszónak legalább 7, és maximum 16 karakterből kell állnia!</p>';
                                }else if($_GET['error']=='password_characters'){
                                    echo '<p id="passwordCharacterError">A jelszónak tartalmaznia kell legalább egy nagybetűt és egy
                                    számot!</p>';
                                }else if($_GET['error']=='password_match'){
                                    echo '<p id="passwordIdenticalError">A jelszavak nem egyeznek!</p>';
                                }else if($_GET['error']=='user_exists'){
                                    echo '<p id="userAlreadyExistsError">Ezzel az email címmel már van regisztrált felhasználó!</p>';
                                }
                            }
                        ?>
                    </div>
                </div>

                <div id="button-group" class="d-flex">
                    <input type="submit" value="Regisztráció" class="button" id="register-button">
                </div>
            </form>
        </div>
    </body>

    </html>
</body>

</html>