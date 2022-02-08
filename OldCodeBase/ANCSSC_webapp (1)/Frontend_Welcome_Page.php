<!DOCTYPE html>
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<head><title>ANCSSC | Welcome!</title></head>

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
        margin-top: 2vw;
        text-align: center;
    }

    .paragraph {
        text-align: center;
        margin-left: 0.8vw;
    }

    .info_card {
        font-family: sans-serif;
        font-size:calc(8px + 1vw);
        line-height: 3vw;
        margin-top: 2vw;
        margin-left: 3.5vw;
        border-style: solid;
        border-width: 0.3vw;
        border-radius: 17px;
        border-color: #FCC05E;
        padding: 1vw;
        padding-right: 4vw;
        width: calc(30px + 50vw);
    }

    .wheel_image {
        height: 14vw;
        width: 14vw;
        margin-left: 7vw;
        margin-top: 3vw;
    }

    .team_image {
        height: 11.8vw;
        width: 15vw;
        margin-top: 4.2vw;
        float: right;
        margin-left: 3.5vw;
    }

    .container {
        width: calc(30px + 50vw);
        margin-left: 23.5vw;

    }

    .button1 {
         margin-top: 5vw;
         /*margin-left: calc(24vw);*/
         background-color: #FCC05E;
         color: white;
         font-size:calc(10px + 1.2vw);
         font-family: sans-serif;
         padding: 1vw;
         width: calc(25px + 11vw);
         border-radius: 4px;
         margin-bottom: 3vw;
     }


    .button1:hover {
        background-color: #4E515B;
        color: white;
    }

    .button2 {
        margin-top: 5vw;
        /*margin-left: calc(13vw);*/
        background-color: #FCC05E;
        color: white;
        font-size:calc(10px + 1.2vw);
        font-family: sans-serif;
        padding: 1vw;
        width: calc(25px + 11vw);
        border-radius: 4px;
        margin-bottom: 3vw;
        float: right;
    }

    .button2:hover {
        background-color: #4E515B;
        color: white;
    }
</style>

<div class="topnav">
    <?php
    require 'Frontend_header_guest.php';
    ?>
</div>

<div class="main_title">Welcome to the ANCSSC<br>Knowledge Sharing Platform!</div>

<div class=row>
    <img class="wheel_image" src="sdg_wheel.jpg" alt="SDG wheel">
    <div class="info_card">
        <p class="paragraph">The Alliance of NGOs and CSOs for South-South Cooperation is the International Network of
            NGOs and CSOs which
            works in collaboration with the United Nations for South-South Cooperation (UNOSSC) to enhance civil
            society’s
            understanding of the importance of South-South Cooperation in developmental, humanitarian and related
            spheres.
        </p>
    </div>
    <img class="team_image" src="ancssc-team.jpg" alt="ANCSSC Team">
</div>

<div class="container">
    <button class="button1" onclick="document.location = 'Frontend_Login.php'">Login</button>

    <button class="button2" onclick="document.location = 'Frontend_Sign_Up.php'">Sign Up</button>
</div>

</html>




