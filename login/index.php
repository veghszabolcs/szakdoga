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
            <h2 class="text-center align-self-center">Bejelentkezés</h2>
            <div id="login-inputs" class="">
                <div class="justify-content-center">
                    <label for="loginEmail" class="">Email cím:</label>
                    <input type="email" id="loginEmail" class="form-control form-input">
                </div>
                <div class="form-outline mb-4">
                    <div class="d-flex justify-content-between">
                        <label for="loginPassword" class="mr-auto input-label">Jelszó:</label>
                        <div>
                            <input type="checkbox" id="showPasswordBox" onclick="showPassword()">Jelszó megjelenítése
                        </div>
                    </div>
                    <input type="password" id="loginPassword" class="form-control form-input">
                </div>
                <div>
                    <p id="loginError">Nem megfelelő email vagy jelszó!</p>
                </div>
            </div>
            <div id="button-group" class="d-flex">
                <input type="button" value="Bejelentkezés" class="button" id="login-button" onclick="credentialsCheck()">
                <a href="../register/register.php"><input type="button" value="Regisztráció" id="register-button" class="button"></a>
            </div>
        </form>
    </div>
</body>

</html>