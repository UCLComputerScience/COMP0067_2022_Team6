<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANCSSC | Sign Up</title>
    <script src="dist_form/jquery.js"></script>
    <script src="dist_form/jquery.validate.js"></script>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>
    <script>
        $(document).ready(function () {
                $('#form1').validate({
                    rules: {
                        email: {
                            email: true,
                            required: true
                        },
                        phone: {
                            required: true
                        },
                        address: {
                            required: true
                        },
                        city: {
                            required: true
                        },
                        country: {
                            required: true
                        },
                        postcode: {
                            required: true
                        },
                        NGO: {
                            required: true
                        },
                        password: {
                            minlength: 6,
                            required: true
                        },
                        password_confirmation: {
                            minlength: 6,
                            equalTo: "#password",
                            required: true
                        },
                        Website: {
                            required: true
                        },
                        username: {
                            required: true
                        },
                    }
                });
        });
    </script>
</head>

<style>
    .topnav {
        padding-top: 2vw;
        padding-bottom: 9vw;
    }

    .input[type=text], input[type=password], select, textarea {
        width: 90%;
        padding: 0.4vw 1vw;
        border: 1px solid #4E515B;
        border-radius: 4px;
        resize: vertical;
        font-size: calc(7px + 0.9vw);
    }

    .main_title {
        font-size:calc(14px + 1.5vw);
        font-family: sans-serif;
        color: #4E515B;
        font-weight: bold;
        padding: 1vw;
        text-align: center;
    }

    .input {
        font-family: sans-serif;
        font-size: calc(7px + 0.9vw);
        margin-top: 1vw;
    }

    .input[type=submit] {
        background-color: #FCC05E;
        color: white;
        font-size: calc(7px + 1.2vw);
        /*padding: 1.2vw 2.3vw 1.2vw 2.3vw;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
        margin-left: 63vw;
        margin-top: 2.5vw;*/
        width: 90%;
        padding: 0.4vw 1vw;
        border: none;
        border-radius: 4px;
    }

    .input[type=submit]:hover {
        background-color: #4E515B;
    }

    .input[type=file] {
        font-family: sans-serif;
        font-size: calc(7px + 0.9vw);
        margin-top: 0.8vw;
    }

    .label {
        font-size: calc(7px + 0.9vw);
        color: #4E515B;
        margin-top: 0.8vw;
    }

    .container {
        width: 100%;
        border-radius: 0.5vw;
        padding: 0.5vw;
        margin-left: auto;
        margin-right: auto;
        display: table;
    }

    .col-25 {
        float: left;
        width: 48%;
        margin-top: 0.6vw;
        margin-left: 1.5vw;
        display: table-cell;
    }

    .col-75 {
        float: left;
        width: 48%;
        margin-top: 0.6vw;
        margin-left: 1.5vw;
        display: table-cell;

    }

    .row {
        display: inline;
    }

    .button {
        margin-right: 4vw;
    }

    .project_description {
        font-size: calc(7px + 0.7vw);
        width: 98%;
        text-align: center;
        margin-top: 4vw;
        border-style: solid;
        border-width: calc(1px + 0.3vw);
        border-radius: 14px;
        border-color: #FCC05E;
    }

    .map_description {
        font-size: calc(7px + 0.7vw);
        width: 98%;
        text-align: center;
        padding: 1vw;
    }

    .ngomap {
        height: 600px;
        width: 95%;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
   @media screen and (max-width: 60vw) {
        .col-25, .col-75, .input[type=submit] {
            width: 100%;
            margin-top: 0;
        }

</style>

<div class="topnav">
    <?php
    require 'Frontend_header_guest.php';
    ?>
</div>

<body>
<div class="main_title">BECOME A MEMBER</div>

<div class="container">
    <form name="signup" id="signup" action="sign_up.php" method="post" onsubmit="ExtraSubmit();">
        <div class="col-25">
            <div class="map_description">Please choose (using right click) where you are based - this will be displayed to other members!</div>
            <div id="ngomap" class="ngomap"></div>
            <div class="project_description">Please note that after signing up, the ANCSSC will review your
                application, and it may take 1-2 days before your login details work
            </div>
        </div>
        
        <input type="hidden" id="lat" name="lat" value="">
        <input type="hidden" id="lng" name="lng" value="">
        <div class="col-75">
            <div class="row">
                <input class="input" type="text" id="NGO" name="NGO" placeholder="NGO name: *">
            </div>
            <div class="row">
                <input class="input" type="text" id="address" name="address" placeholder="Address Line 1: *">
            </div>
            <div class="row">
                <input class="input" type="text" id="city" name="city" placeholder="Town/City: *">
            </div>
            <div class="row">
                <input class="input" type="text" id="country" name="country" placeholder="Country: *">
            </div>
            <div class="row">
                <input class="input" type="text" id="postcode" name="postcode" placeholder="Postcode: *">
            </div>
            <div class="row">
                <input class="input" type="text" id="region" name="region" placeholder="Region of Operation:">
            </div>        
            <div class="row">
                <input class="input" type="text" id="contact" name="contact" placeholder="Person of Contact:">
            </div>
            <div class="row">
                <input class="input" type="text" id="Website" name="Website" placeholder="Organisation Website: *">
            </div>
            <div class="row">
                <input class="input" type="text" id="phone" name="phone" placeholder="Phone Number: *">
            </div>            
            <div class="row">
                <input class="input" type="text" id="email" name="email" placeholder="Email: *">
            </div>            
            <div class="row">
                <input class="input" type="text" id="employee_number" name="employee_number"
                       placeholder="Number of Employees:">
            </div>
            <div class="row">
                <input class="input" type="text" id="volunteer_number" name="volunteer_number"
                       placeholder="Number of Volunteers:">
            </div>
            <div class="row">
                <input class="input" type="text" id="username" name="username" placeholder="Username: *"
                       required>
            </div>
            <div class="row">
                <input class="input" type="password" id="password" name="password" placeholder="Password: *">
            </div>
            <div class="row">
                <input class="input" type="password" id="password" name="password_confirmation"
                       placeholder="Confirm Password: *">
            </div>
            <div class="row">
                <input class="input button" type="submit" name="submit" value="Sign Up">
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    // Define a map instance
    var member_map = L.map('ngomap').setView([0, 0], 2);

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
        document.signup.lat.value = window.ngoLat;
        document.signup.lng.value = window.ngoLng;
        return true;
    }
</script>

</body>
</html>