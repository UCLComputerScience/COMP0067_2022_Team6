<?php require 'auth_redirect.php'; ?>

<?php
require 'db_connect.php';


if (isset($_POST['submit'])) {
    $project_name = filter_var($_POST['projectname'], FILTER_SANITIZE_STRING);
    $project_sdg = filter_var($_POST['project_sdg'], FILTER_SANITIZE_STRING);
    $project_sector = $_POST['sector_id'] ? $_POST['sector_id'] : $project_data['id_sector_f'];
    $project_keywords = filter_var($_POST['keywords'], FILTER_SANITIZE_STRING);
    $project_summary = filter_var($_POST['projectsummary'], FILTER_SANITIZE_STRING);
    $project_description = filter_var($_POST['projectdescription'], FILTER_SANITIZE_STRING);
    $project_location = filter_var($_POST['Location'], FILTER_SANITIZE_STRING);
    $project_budget = $_POST['project_budget'] ? $_POST['project_budget'] : $project_data['project_budget'];
    $project_beneficiaries = filter_var($_POST['project_beneficiaries'], FILTER_SANITIZE_STRING);
    $project_contact_person = filter_var($_POST['ContactName'], FILTER_SANITIZE_STRING);
    $project_email = filter_var($_POST['ContactEmail'], FILTER_SANITIZE_EMAIL);
    $project_phone = filter_var($_POST['ContactNumber'], FILTER_SANITIZE_STRING);
    $project_website = filter_var($_POST['Website'], FILTER_SANITIZE_URL);
    $project_start = filter_var($_POST['StartDate'], FILTER_SANITIZE_STRING);
    $project_end = filter_var($_POST['EndDate'], FILTER_SANITIZE_STRING);
    $date = date('Y-m-d');
    if ($_POST['status'] =='finished') {
        $project_status = 1;
    } else {
        $project_status = 0;
    }
    $query_insert = "INSERT INTO `projects` (`id_sector_f`, `id_user_f`, `project_name`, `project_summary`,
                    `project_description`, `project_keywords`, `project_ngo_name`, `project_location`, `lat`, `lng`, `project_contact_person`, 
                        `project_email`, `project_phone`, `project_website`, `project_sdg`, `project_start`, `project_end`, `project_status`, `project_budget`, 
                        `project_beneficiaries`, `date_added`) VALUES ('$project_sector', '{$_SESSION['user']['id_user']}', '$project_name', 
                                                         '$project_summary', '$project_description', '$project_keywords', 
                                                         '{$_SESSION['user']['ngo_name']}', '$project_location', '{$_POST['lat']}', '{$_POST['lng']}', '$project_contact_person', '$project_email', 
                                                         '$project_phone', '$project_website', '{$_POST['sdg_id']}', '$project_start', '$project_end', $project_status, '$project_budget', 
                                                         '$project_beneficiaries', '$date')";
    $queryResult = mysqli_query($link, $query_insert);
    if ($queryResult == null) {
        echo "Query error - could not upload information";
        exit;
    } else {
        header('Location: Frontend_NGO_My_Projects.php');
    }
}

?>

<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANCSSC | New Project</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="jquery-3.1.1.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>
    <script>
        $(document).ready(function () {
            $.each(sdgSecArr, function (sdgId, sdgArr) {
                $('#select_sdg').append('<option value="' + sdgId + '">' + sdgArr['sdg_num'] + '. ' + sdgArr['sdg_name'] + '</option>');
            });
            $('#select_sdg').prop('disabled', false);
            $('#select_sdg').on('change', function () {
                $('#select_sector').empty().append('<option value="0"></option>');
                $('#select_sector option[value=0]').prop('selected', true);
                var sdgId = $('#select_sdg').val();
                if (sdgId == 0) {
                    $('#select_sector').prop('disabled', true);
                } else {
                    $.each(sdgSecArr[sdgId]['sectors'], function (key, sector) {
                        $('#select_sector').append('<option value="' + sector['sec_id'] + '">' + sector['sec_name'] + '</option>');
                    });
                    $('#select_sector').prop('disabled', false);
                }
            });
        });
    </script>
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
        margin-left: 25vw;
        margin-bottom: 1.5vw;
    }

    .row {
        width: 100%;
        display: flex;
    }

    .info_card {
        font-family: fontawesome;
        line-height: 3vw;
        border-style: solid;
        border-width: calc(1px + 0.3vw);
        border-radius: 14px;
        border-color: #FCC05E;
        padding: 1vw;
        padding-right: 4vw;
    }

    * {
        box-sizing: border-box;
    }

    .input[type=text], select,  textarea {
        width: 90%;
        font-size: calc(7px + 0.9vw);
        padding: 0.4vw;
        border-style: inset;
        border-radius: 4px;
        resize: vertical;
        font-family: sans-serif;
        margin-bottom: 0.6vw;
        border-width: 0.15vw;
        border-color: #f2f2f2;
        background-color: #f2fcff;
    }

    .card_text {
        font-size: calc(7px + 0.9vw);
        font-family: sans-serif;
        border-width: 0.15vw;
        border-radius: 4px;
        background-color: #f2fcff;
        padding: 0.4vw;
        margin-bottom: 0.6vw;
    }


    .label {
        font-size: calc(7px + 0.9vw);
        padding: 0.4vw;
        display: inline-block;
        font-family: sans-serif;
        color: #4E515B;
    }

    .input[type=submit] {
        background-color: #FCC05E;
        color: white;
        padding: 1.2vw 2.3vw 1.2vw 2.3vw;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
        font-size: calc(7px + 1.2vw);
        margin-top: 2vw;
        margin-left: 33vw;
    }

    .input[type=submit]:hover {
        color: black;
    }

    .text {
        width: 90%;
        font-size: calc(7px + 0.9vw);
        padding: 0.4vw;
        border-style: inset;
        border-radius: 4px;
        resize: vertical;
        font-family: sans-serif;
        margin-bottom: 0.6vw;
        border-width:1.5px;
        border-color: #f2f2f2;
        background-color: #f2fcff;
    }

    a.cancel_button {
        background-color: #4E515B;
        color: white;
        padding: 1.2vw 2.3vw 1.2vw 2.3vw;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: calc(7px + 1.2vw);
        margin-top: 2vw;
        margin-left: 2vw;
        font-family: sans-serif;
        text-decoration: none;
        text-align: center;
    }


    a.cancel_button:hover {
        color: black;
    }

    .select {
        font-size: 1.3vw;
        font-family: sans-serif;
    }

    .container {
        border-radius: 5px;
        padding: 0.5vw;
        float: left;
        width: 100%;
    }

    .textbox {
        font-family: sans-serif;
        font-size: calc(7px + 0.9vw);
        padding-bottom: 12vw;
    }

    .checkbox {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
    }

    .checklabel {
        font-family: sans-serif;
        font-size: calc(7px + 0.9vw);
        margin-left: 2.5vw;
    }

    .col-25 {
        float: left;
        width: 20%;
        margin-top: 0.6vw;
        margin-left: 1.5vw;
    }

    .col-75 {
        float: left;
        width: 70%;
        margin-top: 0.6vw;
        margin-left: 1.5vw;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
    .col-1 {
        width: 70%;
        float: left;
    }

    .col-2 {
        width: 28%;
        max-width: 70vw;
        float: left;
    }

    .map {
        width: 100%;
        float: left;
        margin: auto;
    }

    .map_description {
        font-size: calc(7px + 0.7vw);
        font-family: sans-serif;
        width: 98%;
        text-align: center;
        padding: 1vw;
    }

    .projectmap {
        height: 500px;
        width: 95%;
        margin: auto;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
        .col-1, .col-2 {
            width: 100%;
            margin-top: 2vw;
            margin-bottom: 2vw;
        }


</style>

<body>

<div class="topnav">
    <?php

    require 'Frontend_header_universal.php';

    $query = "SELECT * FROM sdg ORDER BY sdg_num";

    $queryResult = mysqli_query($link, $query);
    if ($queryResult == null) {
        echo "First query error";
        exit;
    }

    $SDG_sector_array = array();

    while ($row = mysqli_fetch_assoc($queryResult)) {
        $SDG_sector_array[$row['id_sdg']] = array("sdg_id" => $row['id_sdg'], "sdg_name" => $row['sdg_name'], "sdg_num" => $row['sdg_num'], "sectors" => array());
    }
    foreach ($SDG_sector_array as $k => $v) {
        $query2 = "SELECT * FROM sectors WHERE id_sdg_f = $k ORDER BY sector_name";
        $queryResult2 = mysqli_query($link, $query2);
        if ($queryResult2 == null) {
            echo "Second query error";
            exit;
        }

        while ($row2 = mysqli_fetch_assoc($queryResult2)) {
            $SDG_sector_array[$k]['sectors'][] = array("sec_id" => $row2['id_sectors'], "sec_name" => $row2['sector_name']);
        }
    }

    echo '<script> var sdgSecArr = ';
    echo json_encode($SDG_sector_array);
    echo ';</script>';
    mysqli_close($link);

    ?>

</div>

<div class="main_title">ADD A NEW PROJECT</div>

<form name="newproject" id="newproject" action="" method="post" onsubmit="ExtraSubmit();">
    <div class="col-1">
        <div class="container">
            <div class="row">
                <div class="col-25">
                    <label class="label" for="projectname">Add Project Name<br>(alphanumeric only)</label>
                </div>
                <div class="col-75">
                    <input class="input" type="text" id="projectid" name="projectname" placeholder="Add a project name">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label class="label" for="SDG">Choose SDG</label>
                </div>
                <div class="col-75">
                    <select class="text" id="select_sdg" name="sdg_id" disabled>
                        <option value="0" selected disabled></option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label class="label" for="Sector">Choose Sector</label>
                </div>
                <div class="col-75">
                    <select class="text" id="select_sector" name="sector_id" disabled>
                        <option value="0" selected disabled></option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label class="label" for="keywords">Project keywords</label>
                </div>
                <div class="col-75">
                    <input class="input" type="text" id="keywords" name="keywords" placeholder="Add the project keywords">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label class="label" for="projectsummary">Project summary</label>
                </div>
                <div class="col-75">
                    <input class="input" type="text" id="projectsummary" name="projectsummary"
                           placeholder="Add a brief project summary (2 lines or less)">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label class="label" for="projectdescription">Add Project Description</label>
                </div>
                <div class="col-75">
                <textarea class="textbox" id="projectdescription" name="projectdescription"
                          placeholder="Add your project description."
                ></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="info_card">

            <ul class="fa-ul">
                <li><span class="fa-li"><i class="fas fa-location-arrow"></i></span>
                    <input class="card_text" type="text" id="Location" name="Location" placeholder="Project Location *"></li>
                <li><span class="fa-li"><i class="far fa-dollar"></i></span><select class="card_text" type="text" name="project_budget">
                        <option value="" selected disabled></option>
                        <option value="Very Low">Very Low</option>
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                        <option value="Very High">Very High</option></select></li>
                <li><span class="fa-li"><i class="far fa-handshake-o"></i></span><input class="card_text" type="text" name="project_beneficiaries"
                                                                                        placeholder="Beneficiaries *"></li>
                <li><span class="fa-li"><i class="fas fa-user"></i></span>
                    <input class="card_text" type="text" id="ContactName" name="ContactName" placeholder="Contact Name"></li>
                <li><span class="fa-li"><i class="fas fa-at"></i></span>
                    <input class="card_text" type="text" id="ContactEmail" name="ContactEmail" placeholder="Contact Email *"></li>
                <li><span class="fa-li"><i class="fas fa-phone"></i></span>
                    <input class="card_text" type="text" id="ContactNumber" name="ContactNumber" placeholder="Contact Number *">
                </li>
                <li><span class="fa-li"><i class="fas fa-laptop"></i></span>
                    <input class="card_text" type="text" id="Website" name="Website" placeholder="NGO Website"></li>
                <li><span class="fa-li"><i class="far fa-calendar"></i></span>
                    <input class="card_text" type="text" id="StartDate" name="StartDate" placeholder="Start (YYYY-MM-DD) *"></li>
                <li><span class="fa-li"><i class="far fa-calendar"></i></span>
                    <input class="card_text" type="text" id="EndDate" name="EndDate" placeholder="End (YYYY-MM-DD) *"></li>
                <li><span class="fa-li"><i class="far fa-calendar"></i></span>
                    <input class="checkbox" type="checkbox" id="status" name="status" value="finished">
                    <label class="checklabel" for="status">Finished</label></li>
            </ul>
        </div>
    </div>

    <input type="hidden" id="lat" name="lat" value="">
    <input type="hidden" id="lng" name="lng" value="">

    <div class="map">
        <div class="map_description">Please choose (using right click) where the project is based - this will be displayed to other members!</div>
        <div id="projectmap" class="projectmap"></div>
    </div>

    <div class="row">
        <input class="input" type="submit" name="submit" value="Save Project">
        <a class="cancel_button" href="Frontend_SDGs.php">Cancel</a>
    </div>
</form>



<script type="text/javascript">
    // Define a map instance
    var member_map = L.map('projectmap').setView([0, 0], 2);

    // Add a tile layer to the map
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1Ijoia2FtaWxlc2FrIiwiYSI6ImNrZG9udDd1azBtcnYyd3R2dWppczBwaTUifQ.AFa6j7Pr5ub6xF2qkhHIkA'
    }).addTo(member_map);

    // Set initial latitude and longitude values to 0
    var ngoLat = 0;
    var ngoLng = 0;

    // Capture lat and lng values on right-clicking a place on the map
    member_map.on("contextmenu", function(ev) {
        window.ngoLat = ev.latlng.lat;
        window.ngoLng = ev.latlng.lng;
        L.marker(ev.latlng).addTo(member_map);
    });

    // Add marked lat and lng values to the submitted form
    function ExtraSubmit() {
        document.newproject.lat.value = window.ngoLat;
        document.newproject.lng.value = window.ngoLng;
        return true;
    }
</script>

</body>
</html>