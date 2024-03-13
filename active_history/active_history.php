<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../active_history/style.css">
</head>

<?php
require_once "../active_history/getData.php";
?>

<body>
  <div class="container history-section">
    <?php


    if ($resultArajanlat->num_rows > 0) {
      while ($row = $resultArajanlat->fetch_assoc()) {
        echo '<div class="row">' .
          '<div class="col-md-4">' .
          '<div class="history-item">' .
          '<h3>' . $row['kuldo_id'] . '</h3>' .
          '<p><strong>Küldési dátum:</strong> ' . $row['keszult'] . '</p>' .
          '<p><strong>Határidő:</strong> ' . $row['hatarido'] . '</p>';
      }
    } else {
      echo '<div class="no-events">' .
        '<p><em>Nincsenek aktív árajánlat előzmények.</em></p>' .
        '</div>';
    }

    ?>
  </div>


  <div class="container">

    <div class="row">
      <div class="col-md-4">
        <div class="history-item">
          <h3>Event Name</h3>
          <p><strong>Start Date:</strong> January 1, 2022</p>
          <p><strong>End Date:</strong> January 5, 2022</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="history-item">
          <h3>Event Name</h3>
          <p><strong>Start Date:</strong> January 1, 2022</p>
          <p><strong>End Date:</strong> January 5, 2022</p>
          <div class="btn-container">
              <div class="btn-group">
                <button class="btn black-btn btn-action">Button 1</button>
                <button class="btn black-btn btn-action">Button 2</button>
                <button class="btn black-btn btn-action">Button 3</button>
                <button class="btn black-btn btn-action">Button 4</button>
              </div>
          </div>
        </div>
        <!-- Add more col-md-4 divs for additional history items -->
      </div>

</body>

</html>