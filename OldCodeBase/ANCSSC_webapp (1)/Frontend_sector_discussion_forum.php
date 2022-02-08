<?php require 'auth_redirect.php'; ?>

<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANSCCS | Discussion forum</title>
</head>


<style>

    .topnav {
        padding-bottom: 9vw;
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
    }


    .subtopic_name {
        font-family: sans-serif;
        font-weight: bold;
        font-size: calc(1.5vw + 8px);
        color: #4E515B;
        margin-left: 14vw;
        margin-bottom: 1vw;
        margin-top: 2vw;
    }

    .your_comment input {
        font-size: calc(1vw + 8px);
        width: 64.5vw;
        border: solid;
        border-color: #4E515B;
        border-width: 0.2vw;
        margin-left: 14vw;
        border-radius: 17px;
        padding: 3vw;
        margin-bottom: 1vw;
        margin-top: 1vw;
    }


    .other_comments {
        font-family: sans-serif;
        width: 60vw;
        font-size: calc(1vw + 8px);
        border: solid;
        border-color: #4E515B;
        border-width: 2px;
        margin-left: 14vw;
        margin-top: 2.5vw;
        border-radius: 17px;
        padding: 2vw;
        color: #4E515B;
        margin-bottom: 1vw;
    }

    .username {
        font-weight: bold;
        padding-bottom: 0.5vw;
    }

    .time {
        font-weight: normal;
        font-size: calc(0.8vw + 6px);
        margin-bottom: 1vw;

    }

    .button {
        color: #4E515B;
        padding: 1vw;
        margin-left: 14vw;
        margin-bottom: 2vw;
        margin-top: 2vw;
        border-style: solid;
        border-width: 2px;
        border-radius: 17px;
        border-color: #4E515B;
        text-decoration: none;
        left: 38vw;
        top: 20.5vw;
        font-weight: bold;
        font-family: Sans-serif;
        font-size: 1.4vw;
        z-index: 1;
    }

    .button1 {
        color: #75CD90;
        padding: calc(0.6vw + 2px);
        margin-left: 14vw;
        margin-bottom: 1vw;
        background-color: white;
        margin-top: 1vw;
        border-style: solid;
        border-width:1.5px;
        border-radius: 17px;
        border-color: #75CD90;
        text-decoration: none;
        left: 38vw;
        top: 20.5vw;
        font-weight: bold;
        font-family: Sans-serif;
        font-size: calc(0.8vw + 6px);
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


if (!isset($_GET['id_sectors'])) {
    echo "Exit";
    exit;
}

$idSectors = $_GET['id_sectors'];
$sdgPic = $_GET['sdg_pic'];
$sdgName = $_GET['sdg_name'];
$sectorName = $_GET['sector_name'];


if (isset($_POST['submit']) && $_POST['submit'] == 'Submit comment') {
    $comment = filter_var($_POST['your_comment'], FILTER_SANITIZE_STRING);
    $query2 = "INSERT INTO comments (comment, id_sector_f, id_user_f) VALUES ('$comment',$idSectors,{$_SESSION['user']['id_user']})";
    $queryResult = mysqli_query($link, $query2);
    if ($queryResult == null) {
        echo "Second query error";
        exit;
    }
}

$query1 = "SELECT * FROM comments JOIN users ON comments.id_user_f = users.id_user WHERE id_sector_f = $idSectors ORDER BY time DESC";


$queryResult = mysqli_query($link, $query1);
if ($queryResult == null) {
    echo "First query error";
    exit;
}

echo '<div class="SDG_name"><img class=\'sdg_image\' src="SDG_images/';
echo $sdgPic;
echo '">';
echo $sdgName;
echo ' </div>';


echo '<div class="subtopic_name">';
echo $sectorName;
echo '</div>';


?>
<form action='' method='post'>
    <div class="your_comment">
        <input type="text" id='your_comment' name='your_comment' autocorrect='off' autocapitalize='off'
               placeholder='Add your comment: '>
    </div>
    <input type="submit" name="submit" class='button1' value="Submit comment">
</form>


<?php

while ($row = mysqli_fetch_assoc($queryResult)) {
    echo '<div class="other_comments">

    <div class="username">@';
    echo $row['username'];
    echo '</div><div class="time">';
    echo " {$row['time']}";
    echo '</div><div class="comment_x">';
    echo $row['comment'];
    echo '</div></div>';

}

//post data:Array ( [your_comment] => hello [submit] => Submit comment )


mysqli_close($link);
?>


</html>