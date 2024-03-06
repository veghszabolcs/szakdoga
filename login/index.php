<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Árajánlat készítő</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <script src="./script.js"></script>
    <h1 id="title" class="text-center">Árajánlat készítő weboldal</h1>
    <div id="login-interface" class="container d-flex justify-content-center align-items-center">
    <form action="loginCheck.php" id="login-form" method="post" class="border rounded p-4">
        <h2 class="text-center mb-4">Bejelentkezés</h2>
        <div class="mb-3">
            <label for="loginEmail" class="form-label">Email cím:</label>
            <input type="email" name="email" id="loginEmail" class="form-control">
        </div>
        <div class="mb-3">
            <label for="loginPassword" class="form-label">Jelszó:</label>
            <div class="input-group">
                <input type="password" name="password" id="loginPassword" class="form-control password-input">
                <button class="btn btn-outline-secondary" type="button" id="togglePassword"><i class="fas fa-eye"></i></button>
            </div>
        </div>
        <div>
            <?php
            if (isset($_GET['error'])) {
                echo "<p class='text-danger'>Helytelen email vagy jelszó!</p>";
            }
            if (isset($_GET['msg'])){
                echo "<p class='text-success'>Sikeres regisztráció!</p>";
            }
            ?>
        </div>
        <div class="d-grid gap-2">
            <input type="submit" value="Bejelentkezés" class="btn btn-primary">
            <a href="../register/register.php" class="btn btn-secondary">Regisztráció</a>
        </div>
    </form>
</div>
</body>

</html>