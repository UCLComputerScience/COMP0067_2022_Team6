<?php
require 'db_connect.php';

if (isset($_POST['submit'])) {
    $NGO = filter_var($_POST['NGO'], FILTER_SANITIZE_STRING);
    $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
    $country =filter_var($_POST['country'], FILTER_SANITIZE_STRING);
    $postcode = filter_var($_POST['postcode'], FILTER_SANITIZE_STRING);
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $contact = filter_var($_POST['contact'], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $employees = filter_var($_POST['employee_number'], FILTER_SANITIZE_NUMBER_INT);
    $volunteers = filter_var($_POST['volunteer_number'], FILTER_SANITIZE_NUMBER_INT);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $website = filter_var($_POST['Website'], FILTER_SANITIZE_URL);
    $region = filter_var($_POST['region'], FILTER_SANITIZE_STRING);
    $password = md5($_POST['password']);
    $date = date('Y-m-d');
    $query = "INSERT INTO `users` (`ngo_name`, `address`, `city`, `country`, `postcode`, `lat`, `lng`, `contact_person`, `phone`, 
                `email`, `number_of_employees`, `number_of_volunteers`, `username`, `password`, `website`, `countries_of_operation`, `date_registered`)
                VALUES ('$NGO', '$address', '$city', '$country', '$postcode', '$lat', '$lng', '$contact', '$phone', 
                '$email', '$employees', '$volunteers', '$username', '$password', '$website', '$region', '$date');";
    $queryResult = mysqli_query($link, $query);
    if ($queryResult == null) {
        echo "Query error - could not upload information";
        exit;
    } else {
        header('Location: Frontend_Welcome_NGO.php');
    }
}

mysqli_close($link); # close db connection
?>