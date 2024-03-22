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
        <div id="head">
            <div id="headFirst">
                <h1>Árajánlat</h1>
            </div>
            <div id="headSecond">
                <h3>Ajánlatadó</h3>

            </div>
            <div id="headThird">
                <p>fdaa</p>
            </div>
        </div>
        <form action="../arajanlat_page/pdf.php" method="post">
            <label for="nev">add meg nev</label>
            <input type="text" name="nev" id="nev">
            <label for="ar">add meg ar</label>
            <input type="number" name="ar" id="ar">
            <label for="db">add meg db</label>
            <input type="number" name="db" id="db">
            <button type="submit">mega send</button>
        </form>
    </div>
</body>
</html>