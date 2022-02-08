<?php
session_start();

require('db_connect.php');
$stmt = $link->prepare("SELECT * FROM projects WHERE id_project = ?");
$stmt -> bind_param("i", $_GET['id_project']);
$stmt -> execute();
$result = $stmt->get_result(); // get the mysqli result
$project_data = $result->fetch_assoc(); // fetch data
$linker = 'Frontend_Project_Card.php?id_project=' . $project_data['id_project'] .'';

$id_project = $_GET['id_project'];
$project_name = filter_var($_POST['project_name'], FILTER_SANITIZE_STRING);
$project_sdg = filter_var($_POST['project_sdg'], FILTER_SANITIZE_STRING);
$project_sector = $_POST['sector_id'] ? $_POST['sector_id'] : $project_data['id_sector_f'];
$project_keywords = filter_var($_POST['project_keywords'], FILTER_SANITIZE_STRING);
$project_summary = filter_var($_POST['project_summary'], FILTER_SANITIZE_STRING);
$project_description = filter_var($_POST['project_description'], FILTER_SANITIZE_STRING);
$project_location = filter_var($_POST['project_location'], FILTER_SANITIZE_STRING);
$project_budget = $_POST['project_budget'] ? $_POST['project_budget'] : $project_data['project_budget'];
$project_beneficiaries = filter_var($_POST['project_beneficiaries'], FILTER_SANITIZE_STRING);
$project_contact_person = filter_var($_POST['project_contact_person'], FILTER_SANITIZE_STRING);
$project_email = filter_var($_POST['project_email'], FILTER_SANITIZE_EMAIL);
$project_phone = filter_var($_POST['project_phone'], FILTER_SANITIZE_STRING);
$project_website = filter_var($_POST['project_website'], FILTER_SANITIZE_URL);
$project_start = filter_var($_POST['project_start'], FILTER_SANITIZE_STRING);
$project_end = filter_var($_POST['project_end'], FILTER_SANITIZE_STRING);
if ($_POST['status'] == 'finished') {
    $project_status = 1;
} else {
    $project_status = 0;
}
$date = date('Y-m-d');

$sql = "UPDATE projects SET project_name=?, project_sdg=?, id_sector_f=?, project_keywords=?, project_summary=?,
        project_description=?, project_location=?, project_budget=?, project_beneficiaries=?, project_contact_person=?,
        project_email=?, project_phone=?, project_website=?, project_start=?, project_end=?, project_status=?, date_added=? WHERE id_project=?";

$stmt1 = $link->prepare($sql);

$stmt1->bind_param('siissssssssssssisi', $project_name, $project_sdg, $project_sector, $project_keywords, $project_summary,
    $project_description, $project_location, $project_budget, $project_beneficiaries, $project_contact_person, $project_email,
    $project_phone, $project_website, $project_start, $project_end, $project_status, $date, $id_project);

$stmt1->execute();
if ($stmt1->error) {
    echo "Could not update information. " . $stmt1->error;
}

else header("Location: $linker");
$stmt1->close();

?>