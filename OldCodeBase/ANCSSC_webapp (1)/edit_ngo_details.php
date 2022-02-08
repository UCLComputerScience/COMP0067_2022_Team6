<?php
session_start();

require('db_connect.php');

$id_user = $_SESSION['user']['id_user'];
$ngo_name = filter_var($_POST['ngo_name'], FILTER_SANITIZE_STRING);
$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
$contact_person = filter_var($_POST['contact_person'], FILTER_SANITIZE_STRING);
$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$number_of_employees = filter_var($_POST['number_of_employees'], FILTER_SANITIZE_NUMBER_INT);
$number_of_volunteers = filter_var($_POST['number_of_volunteers'], FILTER_SANITIZE_NUMBER_INT);
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = $_POST['password'] ? $_POST['password'] : $_SESSION['user']['password'];
$website = filter_var($_POST['website'], FILTER_SANITIZE_URL);
$countries_of_operation = filter_var($_POST['countries_of_operation'], FILTER_SANITIZE_STRING);

$query = "UPDATE users SET ngo_name=?, address=?, contact_person=?, phone=?, email=?, number_of_employees=?, number_of_volunteers=?,
                 username=?, password=?, website=?, countries_of_operation=? WHERE id_user=?";

$stmt1 = $link->prepare($query);

$stmt1->bind_param('sssssssssssi', $ngo_name, $address, $contact_person, $phone, $email,
    $number_of_employees, $number_of_volunteers, $username, $password, $website, $countries_of_operation, $id_user);

$stmt1->execute();
$result = $link->query($query);

if ($stmt1->error) {
    echo "FAILURE!!! " . $stmt1->error;
    header("Location: Frontend_Edit_NGO_Details.php");
}

else $query1 = "SELECT * FROM users WHERE id_user = '$id_user'";
$queryResult =mysqli_query($link, $query1);
$row = mysqli_fetch_assoc($queryResult);
$_SESSION['user'] = $row; //$_SESSION['user']['NGO_name']

$stmt1->close();

$query2 = "update projects set project_ngo_name='$ngo_name' where id_user_f='$id_user'";

echo $query;
$result = $link->query($query);
$result2 = $link->query($query2);

if ($result2 === TRUE) {
    $query3 = "SELECT * FROM projects WHERE id_user_f = '$id_user'";
    $queryResult2 = mysqli_query($link,$query3);
    if ($queryResult2 == null) {
        echo "Error reconnecting to database";
        exit;
    }
}
header("Location: Frontend_Edit_NGO_Details.php");

?>