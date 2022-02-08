<?php require 'auth_redirect.php'; 

if ($_SESSION['role'] != 'admin') {
    header("Location: Frontend_Welcome_NGO.php");
}
?>

<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANCSSC | Admin Control Panel</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
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
    }

    a.button {
        width: 36%;
        font-family: sans-serif;
        text-align: center;
        background-color: #FCC05E;
        font-weight: bold;
        font-size: calc(7px + 1.2vw);
        color: white;
        padding-top: 3.5vw;
        padding-bottom: 3.5vw;
        cursor: pointer;
        border-radius: 4px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 3vw;
        text-decoration: none;
    }

    a.button:hover {
        background-color: #4E515B;
        color: white;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: flex;
        clear: both;
    }

    .row {
        display: flex;
    }

</style>

<body>

<div class="topnav">
    <?php
    require 'Frontend_header_admin.php';
    ?>
</div>


<div class="main_title">ADMIN CONTROL PANEL</div>

<div class="row">
    <a class="button" href="Frontend_Add_Announcements.php">ANNOUNCEMENTS</a>
</div>
<div class="row">
    <a class="button" href="Frontend_Add_Resources.php">RESOURCES</a>
</div>
<div class="row">
    <a class="button" href="Frontend_Approve_NGO.php">NGO REGISTRATION APPROVAL</a>
</div>
<div class="row">
    <a class="button" href="database_manager/index.php">ANCSSC DATABASE MANAGER</a>
</div>
<div class="row">
    <a class="button" href="Frontend_statistics.php">STATISTICS AND REPORTS</a>
</div>
</body>
</html>