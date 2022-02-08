<?php require 'auth_redirect.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANCSSC | Latest Announcements</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
        margin-bottom: 1vw;
    }

    .table {
        border: 0.1vw solid black;
        font-family: sans-serif;
        font-size: calc(7px + 0.9vw);
        font-weight: bold;
        margin-left: 14vw;
        margin-top: 2vw;
        margin-bottom: 2vw;
        width: 70%;
    }

    .th {
        background-color: #4E515B;
        color: white;
        font-weight: bold;
    }

    th, td {
        border: 1px solid darkgrey;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    a.go_back_button {
        background-color: #1f7ed1;
        background-image: linear-gradient(#1a69ad, #2396fa);
        color: white;
        border-color: black;
        padding: 1vw 2vw 1vw 2vw;
        font-family: sans-serif;
        border-radius: 4px;
        font-size: calc(7px + 1.2vw);
        text-decoration: none;
        margin-left: 70.7vw;
        margin-top: 2vw;
    }

    a.go_back_button:hover {
        color: black;
    }

    .th2 {
        background-color: #4E515B;
        color: white;
        font-weight: bold;
        width: 18vw;

    }

</style>

<div class="topnav">
    <?php
    require 'Frontend_header_universal.php';
    ?>
</div>

<div class="main_title">Announcements</div>


<table class="table">
    <thead>
    <tr>
        <th class="th" scope="col">Active Announcements</th>
        <th class="th2" scope="col">Time of Announcement</th>
    </tr>
    </thead>
    <tbody>
    <?php
    require('db_connect.php');
    $gobackref = 'Frontend_Admin_Welcome.php';
    if (isset($_SERVER['HTTP_REFERER']) && strlen($_SERVER['HTTP_REFERER']) > 0) {
        $gobackref = $_SERVER['HTTP_REFERER'];
    }
    $query = "SELECT * FROM announcements ORDER BY time_an DESC LIMIT 1000";

    $queryResult = mysqli_query($link, $query);
    if ($queryResult == null) {
        echo "First query error";
        exit;
    }

    while ($row = mysqli_fetch_assoc($queryResult)) {
        echo '<tr>';
        echo '<td>';
        echo $row['announcement'];
        echo '</td>';
        echo '<td>';
        echo $row['time_an'];
        echo '</td>';
        echo '</tr>';
    }

    mysqli_close($link);
    ?>
    </tbody>
</table>

<div class="row">
    <a class="go_back_button" href="<?php echo $gobackref; ?>">
        <b>Go Back</b>
    </a>
</div>

</body>
</html>