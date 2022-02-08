<?php
session_start();

if ($_SESSION['is_auth'] != 'true') {
    header('Location: Frontend_Login.php');
}


?>


