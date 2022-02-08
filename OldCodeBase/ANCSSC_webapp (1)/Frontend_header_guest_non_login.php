<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEADER</title>
</head>

<style>
    div.topbar {
        position: absolute;
    }


    .logo {
        height: 6.4vw;
        width: auto;
        position: absolute;
        top: 1vw;
        left: 1vw;
    }

    a.about_us {
        background-color: white;
        color: #FCC05E;
        border-radius: 20px;
        text-decoration: none;
        margin-top: 3.4vw;
        margin-left: calc(11vw + 22px);
        font-weight: bold;
        font-family: sans-serif;
        font-size: calc(0.9vw + 5px);
    }


    a.about_us:hover {
        color: #4E515B;
    }


    a.support_development {
        margin-top: 3.4vw;
        margin-left: 1.6vw;
        background-color: white;
        color: #FCC05E;
        border-radius: 20px;
        text-decoration: none;
        font-weight: bold;
        font-family: sans-serif;
        font-size: calc(0.9vw + 5px);
        text-align: center;
    }

    a.support_development:hover {
        color: #4E515B;
    }

    .row {
        width: 100%;
    }

</style>

<?php
@session_start();
?>
<div class="topbar">
    <div id="logo">

        <a href="Frontend_Welcome_Page.php"><img class='logo' src="ANCSSC.png"></a>

    </div>
</div>

<div class="row">
    <a class='about_us' href='Frontend_About_Page.php' title='home'>ABOUT US</a>

    <a class='support_development' href='Frontend_Support_Goals.php' title='sustainable development goals'>SUPPORT
        DEVELOPMENT GOALS</a>

</div>




