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

  <script src="../active_history/script.js"></script>

  <div class="container history-section">
    <div class="btn-group btn-group-toggle" id="radio-buttons" data-toggle="buttons">
      <label class="btn btn-secondary active">
        <input type="radio" name="options" id="option1" autocomplete="off"> Küldött
      </label>
      <label class="btn btn-secondary">
        <input type="radio" name="options" id="option2" autocomplete="off" checked> Érkező
      </label>
    </div>
    <?php
    
    $empty = true;

    if ($resultArajanlatReceived->num_rows > 0) {
      $empty = false;
      while ($row = $resultArajanlatReceived->fetch_assoc()) {
        $sqlGetCegNev = "SELECT `nev` FROM `ceg` WHERE `ceg_id` = " . $row['kuldo_id'] . ";";
        $resultCegNev = $db::$conn->query($sqlGetCegNev);
        $rowCegNev = $resultCegNev->fetch_assoc();
        $cegNev = $rowCegNev['nev'];

        echo '<div class="row received">' .
          '<p class="hidden pdf-id">' . $row['arajanlat_id'] . '</p>' .
          '<div class="col-md-4">' .
          '<div class="history-item">' .
          '<h3>' . $cegNev . '</h3>' .
          '<p><strong>Küldési dátum:</strong> ' . $row['keszult'] . '</p>' .
          '<p><strong>Határidő:</strong> ' . $row['hatarido'] . '</p>' .
          '<div class="btn-container">' .
          '<div class="btn-container grid-container">' .
          '<button id="first" class="btn black-btn btn-action" onclick="viewPdf(' . $row['arajanlat_id'] . ')">Megtekintés</button>
          <button id="second" class="btn black-btn btn-action" onclick="downloadPdf(' . $row['arajanlat_id'] . ')">Letöltés</button>
          <button id="third" class="btn black-btn btn-action" onclick="accept(' . $row['arajanlat_id'] . ')">Elfogadás</button>
          <button id="fourth" class="btn black-btn btn-action" onclick="decline(' . $row['arajanlat_id'] . ')">Elutasítás</button>' .
          '</div>
              </div>
            </div>
          </div>
        </div>';
      }
      
    }
    if ($empty===true){
      echo '<div class="no-events received">' .
        '<p><em>Nincsenek aktív érkezett árajánlatok.</em></p>' .
        '</div>';
    }
    $empty = true;
    if ($resultArajanlatSent->num_rows > 0) {
      $empty = false;
      while ($row = $resultArajanlatSent->fetch_assoc()) {
        $sqlGetUserNev = "SELECT `nev` FROM `user` WHERE `user_id` = " . $row['fogado_id'] . ";";
        $resultUserNev = $db::$conn->query($sqlGetUserNev);
        $rowUserNev = $resultUserNev->fetch_assoc();
        $userNev = $rowUserNev['nev'];

        echo '<div class="row sent">' .
          '<p class="hidden pdf-id">' . $row['arajanlat_id'] . '</p>' .
          '<div class="col-md-4">' .
          '<div class="history-item">' .
          '<h3>' . $userNev . '</h3>' .
          '<p><strong>Küldési dátum:</strong> ' . $row['keszult'] . '</p>' .
          '<p><strong>Határidő:</strong> ' . $row['hatarido'] . '</p>' .
          '<div class="btn-container">' .
          '<div class="btn-container grid-container">' .
          '<button id="first" class="btn black-btn btn-action" onclick="viewPdf(' . $row['arajanlat_id'] . ')">Megtekintés</button>
          <button id="second" class="btn black-btn btn-action" onclick="downloadPdf(' . $row['arajanlat_id'] . ')">Letöltés</button>' .
          '</div> <p class="no-change"><em>Nem történt státuszváltozás.</em></p>
              </div>
            </div>
          </div>
        </div>';
      }
    }
    if ($empty===true){
      echo '<div class="no-events sent">' .
        '<p><em>Nincsenek aktív elküldött árajánlatok.</em></p>' .
        '</div>';
    }

    ?>
  </div>

</body>

</html>