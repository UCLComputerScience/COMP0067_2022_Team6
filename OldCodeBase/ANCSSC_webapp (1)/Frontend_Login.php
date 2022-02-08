<?php require 'auth.php'; ?>

<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <head><title>ANCSSC | Login</title></head>

<style>
    .topnav {
        padding-bottom: 6vw;
    }

    .main_title {
        font-size:calc(14px + 1.5vw);
        font-family: sans-serif;
        color: #4E515B;
        font-weight: bold;
        margin-top: 2vw;
        text-align: center;
    }

    .input[type=text], select, textarea {
        width: calc(6px + 70vw);
        padding: 0.8vw 0.8vw 0.8vw 3vw;
        border: 1px solid #4E515B;
        font-family: sans-serif;
        border-radius: 4px;
        resize: vertical;
        font-size:calc(11px + 1.3vw);
        text-align: left;
        margin-left: 16.5vw;
    }

    .input[type=password], select, textarea {
        width: calc(6px + 70vw);
        padding: 0.8vw 0.8vw 0.8vw 3vw;
        border: 1px solid #4E515B;
        font-family: sans-serif;
        border-radius: 4px;
        resize: vertical;
        font-size:calc(11px + 1.3vw);
        margin-top: 1vw;
        text-align: left;
        margin-left: 16.5vw;
    }

    .input[type=submit] {
        background-color: #FCC05E;
        font-family: sans-serif;
        padding: 1vw 2vw 1vw 2vw;
        color: white;
        border: none;
        border-radius: 4px;
        font-size:calc(12px + 1.4vw);
        margin-left: 58vw;
        margin-top: 2.5vw;
    }

    .input[type=submit]:hover {
        background-color: #4E515B;
        color: white;
    }

    .login_form {
        margin-top: 2vw;
    }

    .message {
        text-align: center;
        font-family: sans-serif;
        font-size: 1.5vw;
        color: indianred;
    }

    .row {
        width: 100%;
    }

    .forgotten_password {
        text-align: center;
        margin-top: 3vw;
        font-size: calc(8px + 1.1vw);"
    }

</style>

<body>
<div class="topnav">
    <?php
    require 'Frontend_header_guest_non_login.php';
    ?>
</div>

<div class="main_title">LOGIN</div>

<?php
if (@$_SESSION['last_login'] == 'unsuccessful') {
    echo '<div class=\'message\'><p>Login unsuccessful! Please try again.</p></div>';
}
if (@$_SESSION['last_login'] == 'not_confirmed') {
    echo '<div class=\'message\'><p>You have not been confirmed yet. Please wait until your account is confirmed!</p></div>';
}

?>


<form class="login_form" action='' method="post">
    <div class="row">
        <input class="input" type="text" id="username" name="username" placeholder="Username">
    </div>
    <div class="row">
        <input class="input" type="password" name="password" placeholder="Password" id="password">
    </div>
    <div class="row">
        <input class="input" type="submit" name="submit" value="Log In">
    </div>
    <div class="forgotten_password" >For forgotten passwords, please email us at: info@ancssc.org with your username.<br>
        If you have forgotten both username and password, please call: +44 020 8368 8231.
</form>

</body>
</html>
