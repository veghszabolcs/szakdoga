<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../active_history/style.css">
</head>

<?php
require_once "../active_history/getData.php";
require_once "../connector/mysql.php";
?>

<body>
  <div class="container history-section">
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
      <label class="btn btn-secondary active">
        <input type="radio" name="options" id="option1" autocomplete="off" checked> Active
      </label>
      <label class="btn btn-secondary">
        <input type="radio" name="options" id="option2" autocomplete="off"> Radio
      </label>
    </div>
    <?php


    if ($resultArajanlat->num_rows > 0) {
      while ($row = $resultArajanlat->fetch_assoc()) {
        $sqlGetCegNev = "SELECT `nev` FROM `ceg` WHERE `ceg_id` = " . $row['kuldo_id'] . ";";
        $resultCegNev = $db::$conn->query($sqlGetCegNev);
        $rowCegNev = $resultCegNev->fetch_assoc();
        $cegNev = $rowCegNev['nev'];

        echo '<div class="row ';
        if ($row['kuldo_id'] === $_SESSION['user_id']) {
          echo "sent";
        } else {
          echo "received";
        }
        echo '">' .
          '<p id="' . $row['arajanlat_id'] . '" class="hidden">' . $row['arajanlat_id'] . '</p>' .
          '<div class="col-md-4">' .
          '<div class="history-item">' .
          '<h3>' . $cegNev . '</h3>' .
          '<p><strong>Küldési dátum:</strong> ' . $row['keszult'] . '</p>' .
          '<p><strong>Határidő:</strong> ' . $row['hatarido'] . '</p>' .
          '<div class="btn-container">' .
          '<div class="btn-container grid-container">' .
          '<button id="first" class="btn black-btn btn-action">Megtekintés</button>
          <button id="second" class="btn black-btn btn-action">Letöltés</button>
          <button id="third" class="btn black-btn btn-action">Elfogadás</button>
          <button id="fourth" class="btn black-btn btn-action">Elutasítás</button>' .
          '</div>
              </div>
            </div>
          </div>
        </div>';
      }
    } else {
      echo '<div class="no-events">' .
        '<p><em>Nincsenek aktív árajánlat előzmények.</em></p>' .
        '</div>';
    }

    ?>
  </div>

</body>

</html>