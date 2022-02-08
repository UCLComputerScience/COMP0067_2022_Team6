<?php 

$link = mysqli_connect("localhost", "root", "root", "website_database");

if ($link == null) {
    echo "Error: Could not establish SQL connection." . PHP_EOL;
    echo "Error num: " . mysqli_connect_errno() . PHP_EOL;
    echo "Error text: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

?>