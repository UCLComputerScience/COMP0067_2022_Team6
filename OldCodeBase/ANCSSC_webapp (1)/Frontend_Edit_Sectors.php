<?php require 'auth_redirect.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANCSSC | Sectors</title>
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
        margin-top: 4vw;
        margin-bottom: 2vw;
    }

    .input[type=text], select, textarea {
        width: 70%;
        padding: 0.8vw;
        border: 0.1vw solid #4E515B;
        border-radius: 4px;
        resize: vertical;
        font-size: calc(7px + 0.9vw);
        margin-left: 24vw;
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
        margin-left: 40vw;
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
        text-decoration: none;
    }

    a.cancel_button:hover {
        color: black;
    }

    .input {
        font-family: sans-serif;
    }

    .container {
        border-radius: 5px;
        float: left;
        width: 100%;
    }
</style>

<div class="topnav">
    <?php
    require 'Frontend_header_universal.php';
    ?>
</div>

<body>

<div class="main_title">ADD NEW SECTOR</div>

<?php

require('db_connect.php');

if (isset($_POST['submit'])) {
    $sector = filter_var($_POST['sector'], FILTER_SANITIZE_STRING);
    $query2 = "INSERT INTO sectors (sector_name, id_sdg_f) VALUES ('$sector',{$_GET['id_sdg']})";
    $queryResult = mysqli_query($link, $query2);
    if ($queryResult == null) {
        echo "Adding sector error";
        exit;
    } else {
        echo '<script>window.location.replace("';
        echo $_SESSION['prev_page_add_sector'];
        echo '")</script>';
    }
} else {
    $_SESSION['prev_page_add_sector'] = $_SERVER['HTTP_REFERER'];

}

?>

<div class="container">
    <form action='' method="post">
        <div class="row">
            <input class="input" type="text" id="sector" name="sector" placeholder="Add new sector:">
        </div>
        <div class="row">
            <input class="input" type="submit" name="submit" value="Save New Sector">
            <a class="cancel_button" href='<?php echo @$_SERVER['HTTP_REFERER']; ?>'>Cancel</a>
        </div>
    </form>
</div>

</body>
</html>