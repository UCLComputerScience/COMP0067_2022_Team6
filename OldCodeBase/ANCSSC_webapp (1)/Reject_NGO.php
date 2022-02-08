<?php
require 'auth_redirect.php';
require "db_connect.php";
$delete_id = $_GET['id_user'];
$delete_query = "DELETE FROM users WHERE id_user = $delete_id";
mysqli_query($link, $delete_query);
header("Location: Frontend_Approve_NGO.php?res=delete_ok");
?>