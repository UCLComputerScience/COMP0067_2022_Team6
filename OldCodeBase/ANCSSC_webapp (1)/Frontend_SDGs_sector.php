<?php require 'auth_redirect.php'; ?>

<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANCSSC | SDG Sectors</title>
</head>


<style>

    .topnav {
        padding-bottom: 10vw;
    }

    .SDG_name {
        font-family: sans-serif;
        color: #4E515B;
        font-weight: bold;
        font-size: calc(2vw + 10px);
        padding-left: 14vw;
        padding-bottom: 1vw;
    }

    .sdg_image {
        width: 10vw;
        height: auto;
        padding-right: 2vw;
        top: 2vw;
        vertical-align: middle;
        margin-bottom: 2vw;
    }

    .sdg_description {
        font-family: sans-serif;
        color: #4E515B;
        font-size: calc(1vw + 10px);
        font-weight: normal;
        width: 60vw;
        text-align: left;
        padding-bottom: 3vw;
    }

    .subtopic {
        padding: 3vw;
        margin-top: 2.7vw;
        margin-left: 14vw;
        font-family: sans-serif;
        border-style: solid;
        border-width: 3px;
        border-radius: 17px;
        border-color: #4E515B;
        width: 60vw;
        text-align: center;
    }

    .subtopic_name {
        padding-bottom: 2.5vw;
        font-size: calc(1.5vw + 8px);
    }

    .button {
        color: #4E515B;
        padding: 1vw;
        margin: 1.5vw;
        border-style: solid;
        border-width: 2px;
        border-radius: 17px;
        border-color: #4E515B;
        text-decoration: none;
        left: 78vw;
        top: 2.7vw;
        font-weight: bold;
        font-family: Sans-serif;
        font-size: calc(1vw + 8px);
        z-index: 1;

    }

    .button1 {
        color: #4E515B;
        padding: 1vw;
        margin-left: 14vw;
        margin-top: 2vw;
        margin-bottom: 2vw;
        border-style: solid;
        border-width: 2px;
        border-radius: 17px;
        border-color: #4E515B;
        text-decoration: none;
        left: 78vw;
        top: 2.7vw;
        font-weight: bold;
        font-family: Sans-serif;
        font-size: calc(1vw + 8px);
        z-index: 1;

    }


</style>

<div class="topnav">
    <?php
    require 'Frontend_header_universal.php';
    ?>
</div>


<?php

require('db_connect.php');


if (!isset($_GET['id_sdg'])) {
    echo "Exit";
    exit;
}
$idSdg = $_GET['id_sdg'];
$picSdg = $_GET['sdg_pic'];
$nameSdg = $_GET['sdg_name'];

$query1 = "SELECT * FROM sectors WHERE id_sdg_f = $idSdg ORDER BY sector_name";
$query2 = "SELECT sdg_description FROM sdg WHERE id_sdg = $idSdg";

$queryResult = mysqli_query($link, $query1);
if ($queryResult == null) {
    echo "First query error";
    exit;
}

$queryResult2 = mysqli_query($link, $query2);
if ($queryResult2 == null) {
    echo "Second query error";
    exit;
}
$sdgDescription = mysqli_fetch_assoc($queryResult2);

echo '<div class="SDG_name"><img class=\'sdg_image\' src="SDG_images/';
echo $picSdg;
echo '">';
echo $nameSdg;
echo '<div class="sdg_description">';
echo $sdgDescription['sdg_description'];
echo '</div></div>';

echo '</div>    <a class="button1" href=\'Frontend_Edit_Sectors.php?id_sdg=' . $idSdg . '\'>Add a sector</a></div>';

while ($row = mysqli_fetch_assoc($queryResult)) {
    echo '<div class="subtopic">
    <div class="subtopic_name">';
    echo $row['sector_name'];
    echo '</div>    <a class="button" href=\'Frontend_sector_discussion_forum.php?id_sectors=' . $row['id_sectors'] . '&id_sdg=' . $idSdg . '&sdg_name=' . $nameSdg . '&sdg_pic=' . $picSdg . '&sector_name=' . $row['sector_name'] . '\'>Discussion forum</a>
    <a class="button" href=\'Frontend_sector_view_projects.php?id_sectors=' . $row['id_sectors'] . '&id_sdg=' . $idSdg . '&sdg_name=' . $nameSdg . '&sdg_pic=' . $picSdg . '&sector_name=' . $row['sector_name'] . '\'>View projects</a></div>';

}


mysqli_close($link);
?>   
    



    

    
