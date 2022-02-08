<?php require 'auth_redirect.php'; ?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANCSSC | Details</title>
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
        padding: 1vw;
        text-align: center;
        margin-bottom: 1vw;
    }


    .table {
        border: 1.2px solid black;
        font-family: sans-serif;
        font-size: calc(7px + 0.9vw);
        width:80%;
        margin-left: 10%;
        margin-bottom: 4vw;
    }

    .th1 {
        font-weight: bold;
    }

    th, td {
        border-bottom: 1px solid #4E515B;
        border-top: 1px solid black;
        padding: 1.3vw;
    }


    a.edit_button {
        background-color: #FCC05E;
        color: white;
        padding: 1.2vw 2.3vw 1.2vw 2.3vw;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: calc(7px + 1.2vw);
        text-decoration: none;
        margin-left: 50.7vw;
        margin-bottom: 10vw;
    }

    a.edit_button:hover {
        color: black;
    }

    a.cancel_button {
        background-color: #4E515B;
        color: white;
        padding: 1.2vw 2.3vw 1.2vw 2.3vw;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: calc(7px + 1.2vw);
        text-decoration: none;
        margin-left: 2vw;
    }

    a.cancel_button:hover {
        color: black;
    }

    .button_container {
        margin-bottom: 3vw;
    }

</style>

<div class="topnav">
    <?php
    require 'Frontend_header_ngo.php';
    ?>
</div>
<div class="main_title"><b><?php echo $_SESSION['user']['username']; ?></b> account details</div>

<table class="table">
    <tbody>
    <tr>
        <th class="th1" scope="row">Organisation Name:</th>
        <td><?php echo $_SESSION['user']['ngo_name']; ?></td>
    </tr>
    <tr>
        <th scope="row">Username:</th>
        <td><?php echo $_SESSION['user']['username']; ?></td>
    </tr>
    <tr>
        <th scope="row">E-mail:</th>
        <td><?php echo $_SESSION['user']['email']; ?></td>
    </tr>
    <tr>
        <th scope="row">Address:</th>
        <td><?php echo $_SESSION['user']['address']; ?></td>
    </tr>
    <tr>
        <th scope="row">Password:</th>
        <td><?php for ($x  = 1; $x <= strlen($_SESSION['user']['password']); $x+=1) {
            echo "*";
            }; ?></td>
    </tr>
    <tr>
        <th scope="row">Region of Operation:</th>
        <td><?php echo $_SESSION['user']['countries_of_operation']; ?></td>
    </tr>
    <tr>
        <th scope="row">Contact Person:</th>
        <td><?php echo $_SESSION['user']['contact_person']; ?></td>
    </tr>
    <tr>
        <th scope="row">Organisation website:</th>
        <td><?php echo $_SESSION['user']['website']; ?></td>
    </tr>
    <tr>
        <th scope="row">Number of employees:</th>
        <td><?php echo $_SESSION['user']['number_of_employees']; ?></td>
    </tr>
    <tr>
        <th scope="row">Number of active volunteers:</th>
        <td><?php echo $_SESSION['user']['number_of_volunteers']; ?></td>
    </tr>
    <tr>
        <th scope="row">Phone Number:</th>
        <td><?php echo $_SESSION['user']['phone']; ?></td>
    </tr>
    </tbody>
</table>

<div class="button_container">
    <a class="edit_button" href="Frontend_Edit_NGO_Details.php">Edit Details</a>
    <a class="cancel_button" href="Frontend_Welcome_NGO.php">Cancel</a>
</div>

</body>
</html>