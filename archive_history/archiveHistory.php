<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../active_history/style.css">
    <link rel="stylesheet" href="../archive_history/style.css">
</head>

<?php
require_once "../archive_history/getData.php";
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
            echo '<div class="row received">';
            while ($row = $resultArajanlatReceived->fetch_assoc()) {
                $sqlGetCegNev = "SELECT `nev` FROM `ceg` WHERE `ceg_id` = " . $row['kuldo_id'] . ";";
                $resultCegNev = $db::$conn->query($sqlGetCegNev);
                $rowCegNev = $resultCegNev->fetch_assoc();
                $cegNev = $rowCegNev['nev'];

                echo '<p class="hidden pdf-id">' . $row['arajanlat_id'] . '</p>' .
                    '<div class="">' .
                    '<div class="history-item">' .
                    '<h3>' . $cegNev . '</h3>' .
                    '<p><strong>Küldési dátum:</strong> ' . $row['keszult'] . '</p>' .
                    '<p><strong>Státuszváltozási dátum:</strong> ' . $row['statuszvaltozasi_datum'] . '</p>' .
                    '<div class="btn-container">' .
                    '<div class="btn-container grid-container">' .
                    '<button id="first" class="btn black-btn btn-action" onclick="viewPdf(' . $row['arajanlat_id'] . ')">Megtekintés</button>
          <button id="second" class="btn black-btn btn-action" onclick="downloadPdf(' . $row['arajanlat_id'] . ')">Letöltés</button>' .
                    '</div>';
                if ($row['statusz'] === "1") {
                    echo '<p class="accepted"><em>Elfogadva.</em></p>';
                } else {
                    echo '<p class="declined"><em>Elutasítva.</em></p>';
                }
                echo '</div>
            </div>
          </div>';
            }
            echo '</div>';
        }
        if ($empty === true) {
            echo '<div class="no-events received">' .
                '<p><em>Nincs érkezett árajánlat előzmény.</em></p>' .
                '</div>';
        }
        $empty = true;
        if (!empty($resultArajanlatSent)) {
            if ($resultArajanlatSent->num_rows > 0) {
                $empty = false;
                while ($row = $resultArajanlatSent->fetch_assoc()) {
                    $sqlGetUserNev = "SELECT `nev` FROM `user` WHERE `user_id` = " . $row['fogado_id'] . ";";
                    $resultUserNev = $db::$conn->query($sqlGetUserNev);
                    $rowUserNev = $resultUserNev->fetch_assoc();
                    $userNev = $rowUserNev['nev'];

                    echo '<div class="sent">' .
                        '<p class="hidden pdf-id">' . $row['arajanlat_id'] . '</p>' .
                        '<div class="">' .
                        '<div class="history-item">' .
                        '<h3>' . $userNev . '</h3>' .
                        '<p><strong>Küldési dátum:</strong> ' . $row['keszult'] . '</p>' .
                        '<p><strong>Státuszváltozási dátum:</strong> ' . $row['hatarido'] . '</p>' .
                        '<div class="btn-container">' .
                        '<div class="btn-container grid-container">' .
                        '<button id="first" class="btn black-btn btn-action" onclick="viewPdf(' . $row['arajanlat_id'] . ')">Megtekintés</button>
                        <button id="second" class="btn black-btn btn-action" onclick="downloadPdf(' . $row['arajanlat_id'] . ')">Letöltés</button>
                        </div>';
                    if ($row['statusz'] === "1") {
                        echo '<p class="accepted"><em>Elfogadva.</em></p>';
                    } else {
                        echo '<p class="declined"><em>Elutasítva.</em></p>';
                    }
                    echo '</div>
                        </div>
                        </div>';
                }
            }
        }
        if ($empty === true) {
            echo '<div class="no-events sent">' .
                '<p><em>Nincs elküldött árajánlat előzmény.</em></p>' .
                '</div>';
        }

        ?>



    </div>

</body>

</html>