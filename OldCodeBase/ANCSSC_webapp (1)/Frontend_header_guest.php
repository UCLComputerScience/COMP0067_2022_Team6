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

    a.login {

        position: absolute;
        background-color: white;
        padding: 0.6vw 2.3vw;
        color: #4E515B;
        border-style: solid;
        border-width: 0.2vw;
        border-radius: 17px;
        border-color: firebrick;
        text-decoration: none;
        left: 78vw;
        top: 2.7vw;
        font-weight: bold;
        font-family: sans-serif;
        font-size: calc(0.9vw + 5px);
        z-index: 1;
    }

    a.login:hover {
        background-color: lightgrey;
        color: black;

    .row {
        width: 100%;
    }

</style>

<div class="row">
    <div id="logo">
        <a href="Frontend_Welcome_Page.php"><img class='logo' src="ANCSSC.png"></a>
    </div>

    <a class='about_us' href='Frontend_About_Page.php' title='home'>ABOUT US</a>

    <a class='support_development' href='Frontend_Support_Goals.php' title='sustainable development goals'>SUPPORT
        DEVELOPMENT GOALS</a>

    <a class='login' href='Frontend_Login.php' title='login'>LOGIN</a>
</div>



