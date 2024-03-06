<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Árajánlat készítő</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <script src="./script.js"></script>
    <h1 id="title" class="text-center">Árajánlat készítő weboldal</h1>
    <div id="login-interface" class="container d-flex justify-content-center align-items-center">
        
        <form action="validate_registration.php" id="login-form" class="border rounded p-4" method="post">
        <div class="container d-flex px-0 justify-content-between">
            <div><a href="../login/index.php" id="back" class="align-self-center"><i class="fas fa-arrow-left"></i> Vissza</a></div>
            <div class="" id="formTitle"><h2 class="text-center">Regisztráció</h2></div>
            <div id="filler"></div>
        </div>
            
            <div class="mb-3">
                <label for="loginEmail" class="form-label">Email cím:</label>
                <input type="email" id="loginEmail" name="loginEmail" class="form-control form-input"
                    value="<?php echo isset($_POST['loginEmail']) ?>">
            </div>
            <div class="mb-3">
                <label for="loginPassword" class="form-label">Jelszó:</label>
                <div class="input-group">
                    <input type="password" id="loginPassword" name="loginPassword" class="form-control password-input">
                    <button class="btn btn-outline-secondary" type="button" id="togglePasswordFirst"><i class="fas fa-eye"></i></button>
                </div>
            </div>
            <div class="mb-3">
                <label for="loginPasswordSecond" class="form-label">Jelszó mégegyszer:</label>
                <div class="input-group">
                    <input type="password" id="loginPasswordSecond" name="loginPasswordSecond" class="form-control password-input">
                    <button class="btn btn-outline-secondary" type="button" id="togglePasswordSecond"><i class="fas fa-eye"></i></button>
                </div>
            </div>
            <div>
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'email') {
                        echo '<p id="emailError">Adjon meg egy érvényes email címet!</p>';
                    } else if ($_GET['error'] == 'password_length') {
                        echo '<p id="passwordLengthError">A jelszónak legalább 7, és maximum 16 karakterből kell állnia!</p>';
                    } else if ($_GET['error'] == 'password_characters') {
                        echo '<p id="passwordCharacterError">A jelszónak tartalmaznia kell legalább egy nagybetűt és egy
                                számot!</p>';
                    } else if ($_GET['error'] == 'password_match') {
                        echo '<p id="passwordIdenticalError">A jelszavak nem egyeznek!</p>';
                    } else if ($_GET['error'] == 'user_exists') {
                        echo '<p id="userAlreadyExistsError">Ezzel az email címmel már van regisztrált felhasználó!</p>';
                    }
                }
                ?>
            </div>
            <div class="d-grid gap-2">
                <input type="submit" value="Regisztráció" class="btn btn-primary" id="register-button">
            </div>
        </form>
    </div>
</body>

</html>