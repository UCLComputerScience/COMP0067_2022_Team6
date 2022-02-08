<?php
session_start();


require 'db_connect.php';

if (isset($_POST['submit'])) {

    $login = mysqli_real_escape_string($link, $_POST['username']);
    $login = filter_var($login, FILTER_SANITIZE_STRING);

    $password = md5($_POST['password']);

    $query1 = "SELECT * FROM users WHERE username LIKE '$login' AND password LIKE '$password'";


    $queryResult = mysqli_query($link, $query1);
    if ($queryResult == null) {
        echo "First query error";
        exit;
    }

    $numRows = mysqli_num_rows($queryResult);

    $row = mysqli_fetch_assoc($queryResult);
    $_SESSION['user'] = $row; //$_SESSION['user']['NGO_name']

    if ($numRows > 0) {


        if (strcasecmp($_SESSION['user']['username'], 'Admin') == 0) {
            $_SESSION['role'] = 'admin';
            $_SESSION['last_login'] = 'successful';
            $_SESSION['is_auth'] = 'true';
            header('Location: Frontend_Admin_Welcome.php');
        } else {
            if ($row['ngo_status'] == 0) {
                $_SESSION['role'] = 'user';
                $_SESSION['last_login'] = 'not_confirmed';
                $_SESSION['is_auth'] = 'false';
            } else {
                $_SESSION['role'] = 'user';
                $_SESSION['last_login'] = 'successful';
                $_SESSION['is_auth'] = 'true';
                header('Location: Frontend_Welcome_NGO.php');
            }
        }


    } else {
        $_SESSION['last_login'] = 'unsuccessful';
    }


}


mysqli_close($link);


?>