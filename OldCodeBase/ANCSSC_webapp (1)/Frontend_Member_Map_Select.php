<?php require 'auth_redirect.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANCSSC | Member Map</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>
</head>

<style>
    .topnav {
        padding-bottom: 9vw;
    }

    .main_title {
        font-size:calc(14px + 1.5vw);
        font-family: sans-serif;
        color: #4E515B;
        font-weight: bold;
        padding: 1vw;
        text-align: center;
        margin-top: 2vw;
        margin-bottom: 4vw;
    }

    .ngomap {
        height: 450px;
        width: 100%;
    }
</style>

<?php

$chosenData = htmlspecialchars_decode($_POST['coord']);

?>

<body>
    <div class="topnav">
        <?php
        require 'Frontend_header_universal.php';
        ?>
    </div>

    <div class="main_title">SEARCH RESULTS MAP</div>

    <div id="ngomap" class="ngomap"></div>

    <script type="text/javascript">
        var member_map = L.map('ngomap').setView([0, 0], 2);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1Ijoia2FtaWxlc2FrIiwiYSI6ImNrZG9udDd1azBtcnYyd3R2dWppczBwaTUifQ.AFa6j7Pr5ub6xF2qkhHIkA'
        }).addTo(member_map);

        var members = <?php echo $chosenData ?>;

        members.forEach(addToMap);

        function addToMap(member) {
            var coord = [member.lat, member.lng];
            var hoverMessage = '';
            if (member.project_name) {
                hoverMessage = member.project_name;
            } else {
                hoverMessage = member.ngo_name;
            }
            L.marker(coord).addTo(member_map).bindPopup(hoverMessage);
        }
    </script>

</body>
</html>