<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<head><title>ANCSSC</title></head>

<style>

    .topnav {
        padding-bottom: 5vw;
    }

    .main_title {
        font-size:calc(14px + 1.5vw);
        font-family: sans-serif;
        color: #4E515B;
        font-weight: bold;
        padding: 1vw;
        text-align: center;
        margin-bottom: 1.5vw;
    }

    .container {
        margin-top: 2vw;
        width: 90%;
        margin-left: 5%;
    }

    .paragraph {
        font-family: sans-serif;
        font-size: calc(7px + 0.9vw);
        color: #4E515B;
    }

    .banner_image {
        height: 18vw;
        width: 84vw;
        margin-left: 8vw;
    }


    .col-75 {
        float: left;
        width: 48%;
        margin-left: 2vw;

    }

    .member_image {
        width: 24vw;
        height: 17vw;
        margin-bottom: 2vw;
        float: right;
    }

    .mini_title {
        font-size: calc(10px + 1.2vw);
        margin-bottom: 2vw;
        margin-top: 2vw;
        font-weight: bold;
        font-family: sans-serif;
        color: #4E515B;
    }

</style>

</head>

<div class="topnav">
    <?php
    require 'Frontend_header_guest.php';
    ?>
</div>

<img class="banner_image" src="SDGbanner.png" alt="SDG banner">

<div class="main_title">BECOME A MEMBER</div>

<div class="container">
    <div class="row">
        <p class="paragraph">We welcome NGOs and CSOs and grassroot organisations with current operations in the Global
            South to join our Alliance. If you are an NGO or CSO and would be interested in becoming a member of
            our Alliance, you can find our Registration Form <a href="Frontend_Sign_Up.php">here.</a> If you are
            interested in finding out more, please email us at ines@ancssc.org
        </p>
        <div class="col-75">
            <img class="member_image" src="join_team.png" alt="Join Team">
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="mini_title"><b>Benefits of our membership</b></div>
    </div>
    <p class="paragraph">
        ◘ A forum where you can have your voice heard regarding development issues in the Global South.<br><br>
        ◘ A place in which to network and engage with NGOs and CSOs, locally and globally.<br><br>
        ◘ A space for NGOs and CSOs to share updates on their projects, and
        showcase innovative solutions to development challenges in the Global South.<br><br>
        ◘ ANCSSC calendar containing information about, and dates of, relevant networking events and conferences
        worldwide, related to South-South development.<br><br>
        ◘ Access to guides and toolkits aimed at building the capacity of NGOs and CSOs in the Global South, via our
        online knowledge platforms.<br><br>
        ◘ Invitations to ANCSSC side events and free trainings held in different locations around the world. The
        facilitation of talent management and visibility for experts on the Global South.
    </p>
</div>
</body>






</html>