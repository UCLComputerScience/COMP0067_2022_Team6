<?php
@session_start();
switch ($_SESSION['role']) {
    case 'admin':
        require 'Frontend_header_admin.php';
        break;
    case 'user':
        require 'Frontend_header_ngo.php';
        break;
}
?>