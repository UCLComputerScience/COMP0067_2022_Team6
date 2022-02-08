<?php require 'auth_redirect.php'; 

if ($_SESSION['role'] != 'admin') {
    header("Location: Frontend_Welcome_NGO.php");
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANCSSC | Add announcement</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>

<style>
    .topnav {
        padding-bottom: 9vw;
    }

    * {
        box-sizing: border-box;
    }

    .input[type=text], select, textarea {
        width: 90%;
        padding-top: 1.2vw;
        padding-left: 1.2vw;
        padding-bottom: 8vw;
        border: 1px solid #4E515B;
        border-radius: 4px;
        resize: vertical;
        font-size: calc(7px + 0.9vw);
        font-family: sans-serif;
    }

    .main_title {
        font-size: 2.4vw;
        font-family: sans-serif;
        color: #4E515B;
        font-weight: bold;
        padding: 1vw;
        text-align: center;
        margin-bottom: 2vw;
    }

    .input {
        font-family: sans-serif;
        font-size: 1.3vw;
    }

    .input[type=submit] {
        background-color: #FCC05E;
        color: white;
        font-size: calc(7px + 1.2vw);
        padding: 1.2vw 2.3vw 1.2vw 2.3vw;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 2vw;
        margin-left: 22vw;
    }

    .input[type=submit]:hover {
        color: black;
    }

    a.cancel_button {
        background-color: #4E515B;
        color: white;
        font-size: calc(7px + 1.2vw);
        padding: 1.2vw 2.3vw 1.2vw 2.3vw;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 2vw;
        margin-left: 2vw;
        font-family: sans-serif;
        text-decoration: none;
    }

    a.cancel_button:hover {
        color: black;
    }

    .row-1 {
        width: 75%;
        margin-left: 15vw;
    }


    .container {
        border-radius: 0.4vw;
        float: left;
        width: 100%;
    }

    /* Clear floats after the columns */
    .row-1:after {
        content: "";
        display: table;
        clear: both;
    }

    .message {
        font-family: sans-serif;
        font-size: 1.8vw;
        color: lightgreen;
        text-align: center;
        margin-bottom: 1vw;
    }


</style>
<body>
<div class="topnav">
    <?php
    require 'Frontend_header_universal.php';
    ?>
</div>
<div class="main_title">ADD NEW ANNOUNCEMENT</div>

<?php
require 'db_connect.php';
if (isset($_POST['submit'])) {
    $announcement = filter_var($_POST['announcement'], FILTER_SANITIZE_STRING);
    $query2 = "INSERT INTO announcements (announcement, id_user_f) VALUES ('$announcement',{$_SESSION['user']['id_user']})";
    $queryResult = mysqli_query($link, $query2);
    if ($queryResult == null) {
        echo "Adding announcement error";
        exit;
    } else {
        echo '<div class="message">Announcement added successfully!</div>';
    }
}
?>

<div class="container">
    <form action='' method="post">
        <div class="row-1">
            <input class="input" type="text" id="announcement" name="announcement" placeholder="Add new announcement:">
        </div>
        <div class="row-1">
            <input class="input" type="submit" name="submit" value="Post Announcement">
            <a class="cancel_button" href="Frontend_Admin_Navigation_Page.php">Cancel</a>
        </div>
    </form>
</div>


</body>
</html>