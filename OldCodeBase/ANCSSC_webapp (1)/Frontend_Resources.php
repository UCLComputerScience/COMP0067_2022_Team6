<?php require 'auth_redirect.php'; ?>

<DOCTYPE! html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANCSSC | Resources</title>
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
        margin-top: 2vw;
        margin-bottom: 4vw;
    }

    .table {
        font-family: sans-serif;
        font-size: calc(7px + 0.9vw);
        font-weight: bold;
        margin-top: 2vw;
        margin-bottom: 2vw;
        width: 98%;
        position: absolute;
    }

    .th {
        background-color: #FCC05E;
        color: white;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .th2 {
        background-color: #FCC05E;
        color: white;
        font-weight: bold;
        width: 10vw;
    }

    th {
        color: white;
        background-color: #4E515B;
        height: 40px;
        text-align: center;
    }

    td {
        color: black;
        background-color: #FFFFFF;
        height: 40px;
        text-align: center;
        font-weight: normal;
    }
</style>

<div class="topnav">
    <?php
    require 'Frontend_header_universal.php';
    ?>
</div>

<div class="main_title">RESOURCES</div>

<table class="table">
    <thead>
    <tr>
        <th class="th" scope="col">Topic</th>
        <th class="th" scope="col">Resource</th>
        <th class="th2" scope="col">Date Added</th>
    </tr>
    </thead>
    <tbody>
    <?php 
    require 'db_connect.php';

    $query = "SELECT * FROM resources ORDER BY resource_time DESC LIMIT 1000";

    $queryResult = mysqli_query($link, $query);
    if ($queryResult == null) {
        echo "First query error";
        exit;
    }

    while ($row = mysqli_fetch_assoc($queryResult)) {
        echo '<tr>';
        echo '<td>';
        echo $row['resource_topic'];
        echo '</td>';
        echo '<td>';
        echo $row['resource_message'];
        echo '</td>';
        echo '<td>';
        echo $row['resource_time'];
        echo '</td>';
        echo '</tr>';
    }

    mysqli_close($link);
    ?>

</html>