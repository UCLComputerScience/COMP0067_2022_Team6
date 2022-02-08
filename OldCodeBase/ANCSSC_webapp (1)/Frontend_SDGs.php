<?php require 'auth_redirect.php'; ?>

<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANCSSC | SDGs</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->

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

    .col-1 {
        flex: 16%;
        padding: 0.05vw;
        float: left;
    }

    .row {
        display: flex;
    }

    .btn {
        border: none;
        background-color: #FFFFFF;
    }

    .btn:hover {
        border: none;
        background-color: #4E515B;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: flex;
        clear: both;
    }


</style>

<div class="topnav">
    <?php
    require 'Frontend_header_universal.php';
    ?>
</div>

<div class="main_title">SUSTAINABLE DEVELOPMENT GOALS</div>

<?php


require 'db_connect.php';

$queryResult = mysqli_query($link, "SELECT * FROM sdg order by sdg_num");
if ($queryResult == null) {
    echo "First query error";
    exit;
}

$counter = 1;
while ($row = mysqli_fetch_assoc($queryResult)) {

    if ($counter == 1) {
        echo '<div class="row">';
    }

    echo '<div class="col-1">
        <button class="btn"><img src="SDG_images/' . $row['sdg_pic'] . '" alt = "SDG 1" style="width:100%;" onclick="document.location =
        \'Frontend_SDGs_sector.php?id_sdg=' . $row['id_sdg'] . '&sdg_pic=' . $row['sdg_pic'] . '&sdg_name=' . $row['sdg_name'] . '\'"></button>
    </div>';


    if ($counter == 6) {
        echo '</div>';
        $counter = 0;
    }
    $counter++;
}

mysqli_close($link);
?>

<div class="col-1">
    <button class="btn"><img src="SDG_images/sdg18.jpg" alt="SDG 6" style="width:100%;"></button>
</div>


</html>