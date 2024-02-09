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

            <form action="" id="login-form" class="">
                <div class="d-flex justify-content-between">
                    <a href="../login/index.php" id="back">Vissza-></a>
                    <h2 class="text-center align-self-center" id="register-title">Regisztráció</h2>
                    <div id="filler"></div>
                </div>

                <div id="login-inputs" class="">
                    <div class="justify-content-center">
                        <label for="loginEmail" class="">Email cím:</label>
                        <input type="email" id="loginEmail" class="form-control form-input">
                    </div>
                    <div class="form-outline">
                        <div class="d-flex justify-content-between">
                            <label for="loginPassword" class="mr-auto ">Jelszó:</label>
                            <div>
                                <input type="checkbox" class="showPasswordBox" onclick="showPassword()">Jelszó
                                megjelenítése
                            </div>
                        </div>
                        <input type="password" id="loginPassword" class="form-control form-input">
                    </div>
                    <div class="form-outline mb-3">
                        <div class="d-flex justify-content-between">
                            <label for="loginPassword" class="mr-auto input-label">Jelszó mégegyszer:</label>
                            <div>
                                <input type="checkbox" class="showPasswordBox" onclick="showPasswordSecond()">Jelszó
                                megjelenítése
                            </div>
                        </div>
                        <input type="password" id="loginPasswordSecond" class="form-control form-input">
                    </div>
                    <div>
                        <p id="emailError">Adjon meg egy érvényes email címet!</p>
                        <p id="passwordLengthError">A jelszónak legalább 7, és maximum 16 karakterből kell állnia!</p>
                        <p id="passwordCharacterError">A jelszónak tartalmaznia kell legalább egy nagybetűt és egy
                            számot!</p>
                        <p id="passwordIdenticalError">A jelszavak nem egyeznek!</p>
                        <p id="userAlreadyExistsError">Ezzel az email címmel már van regisztrált felhasználó!</p>
                    </div>
                </div>

                <div id="button-group" class="d-flex">
                    <input type="button" value="Regisztráció" class="button" id="register-button"
                        onclick="validation()">
                </div>
            </form>
        </div>
    </body>

    </html>
</body>

</html>