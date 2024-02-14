<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Árajánlat</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom">
        <div class="container-fluid">
            
            <a class="navbar-brand" href="#">Árajánlat készítő</a>
            
            <div class="navbar-nav me-auto">
                <a class="nav-link active" aria-current="page" href="#">Aktív árajánlatok megtekintése</a>
                <a class="nav-link" href="#">Árajánlat előzmények megtekintése</a>
            </div>

            <div class="d-flex align-items-center justify-content-center">
                <?php echo $_GET['loginEmail'];?>
                <a class="btn btn-primary edit-profile-button" href="#" role="button">Profil szerkesztése</a>
            </div>
        </div>
    </nav>

    <div id="content-container">

    </div>
</body>
</html>