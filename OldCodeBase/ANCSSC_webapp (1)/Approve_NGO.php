<?php
require 'auth_redirect.php';
require "db_connect.php";
$approve_id = $_GET['id_user'];
$approve_query= "UPDATE users SET ngo_status = 1 WHERE id_user = $approve_id";
mysqli_query($link, $approve_query);
header("Location: Frontend_Approve_NGO.php?res=approve_ok");
?>