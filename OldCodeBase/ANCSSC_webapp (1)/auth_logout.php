<?php
session_start();

$_SESSION['is_auth'] = 'false';

header('Location: Frontend_Welcome_Page.php');


?>


