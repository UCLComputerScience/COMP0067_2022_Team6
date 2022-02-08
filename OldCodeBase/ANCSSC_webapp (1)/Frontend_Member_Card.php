<?php require 'auth_redirect.php'; ?>

<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANCSSC | Member</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>

<style>

    .topnav {
        padding-bottom: 9vw;
    }

    .main_title {
        font-size:calc(14px + 1.5vw);
        font-family: sans-serif;
        color: #4E515B;
        font-weight: bold;
        padding: 1vw;
        text-align: center;
        margin-bottom: 1.5vw;
    }

    .info_card {
        font-family: fontawesome;
        line-height: 3vw;
        border-style: solid;
        border-width: calc(1px + 0.3vw);
        border-radius: 14px;
        border-color: #FCC05E;
        padding: 1vw;
        padding-right: 4vw;
    }

    * {
        box-sizing: border-box;
    }

    .card_text {
        font-size: calc(7px + 0.9vw);
        font-family: sans-serif;
        border-width: 0.15vw;
        border-radius: 4px;
        margin-bottom: 0.6vw;
    }

    .main_text {
        font-size: calc(7px + 0.9vw);
        font-family: sans-serif;
        margin-bottom: 0.6vw;
        padding: 0.4vw;
        border-style: inset;
        border-radius: 4px;
        resize: vertical;
        border-width: 1.5px ;
        border-color: #f2f2f2;
    }

    a:link {
    color: #000000;
    text-decoration: none;
    }

    a:visited {
    color: #000000;
    text-decoration: none;
    }

    a:hover {
    color: #FFFFFF;
    text-decoration: none;
    }

    .col-1 {
        width: 40%;
        max-width: 70vw;
        float: left;
        margin-left: 1.5vw;
    }

    .col-2 {
        width: 58%;
        float: left;
    }

    .table {
        font-family: sans-serif;
        font-size: calc(8px + 0.8vw);
        margin-left: auto;
        margin-right: auto;
        width: 50vw;
    }

    th {
        color: white;
        background-color: #4E515B;
        border: 1px solid white;
        height: 40px;
        text-align: center;
    }

    td {
        color: black;
        background-color: #FCC05E;
        border: 1px solid white;
        height: 60px;
        text-align: center;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
        .col-1, .col-2 {
            width: 100%;
            margin-top: 2vw;
            margin-bottom: 2vw;
        }

</style>

<div class="topnav">
    <?php
    require 'Frontend_header_universal.php';
    ?>
</div>

<?php
require('db_connect.php');
$stmt = $link->prepare("SELECT * FROM users WHERE id_user = ?");
$stmt -> bind_param("i", $_GET['id_member']);
$stmt -> execute();
$member_result = $stmt->get_result(); // get the query result
$member_info = $member_result->fetch_assoc(); // fetch data

$stmt = $link->prepare("SELECT id_project, project_summary, project_name, project_keywords FROM projects WHERE id_user_f = ?");
$stmt -> bind_param("i", $_GET['id_member']);
$stmt -> execute();
$project_result = $stmt->get_result(); // get the query result

$rowcount = mysqli_num_rows($project_result);

// Fill a table with memeber's projects
$tableBody = "";
while ($row = $project_result->fetch_assoc()) {
    $tableBody .= <<<EOT
	<tr>
        <td class="table_entries">
            <a href='Frontend_Project_Card.php?id_project={$row['id_project']}'>
            {$row['project_name']}
            </a>
        </td>
        <td class="table_entries">
			{$row['project_summary']}
        </td>
        <td class="table_entries">
            {$row['project_keywords']}
        </td>
	</tr>
EOT;
}
?>

<div class="main_title"><?php echo($member_info['ngo_name']);?></div>

<div class="container">

    <div class="col-1">
        <div class="info_card">
            <ul class="fa-ul">
                <li><span class="fa-li"><b class="fas fa-briefcase"></b></span><div class="card_text"><u>Name</u>: <?php echo($member_info['ngo_name']);?></div></li>
                <li><span class="fa-li"><b class="fas fa-laptop"></b></span><div class="card_text"><u>Website</u>: <?php echo($member_info['website']);?></div></li>
                <li><span class="fa-li"><b class="fas fa-location-arrow"></b></span><div class="card_text"><u>Address</u>: <?php echo($member_info['address']);?>, <?php echo($member_info['city']);?>, <?php echo($member_info['country']);?>, <?php echo($member_info['postcode']);?></div></li>
                <li><span class="fa-li"><b class="fas fa-globe"></b></span><div class="card_text"><u>Countries of operation</u>: <?php echo($member_info['countries_of_operation']);?></div></li>
                <li><span class="fa-li"><b class="fas fa-user"></b></span><div class="card_text"><u>Contact name</u>: <?php echo($member_info['contact_person']);?></div></li>
                <li><span class="fa-li"><b class="fas fa-at"></b></span><div class="card_text"><u>E-mail</u>: <?php echo($member_info['email']);?></div></li>
                <li><span class="fa-li"><b class="fas fa-phone"></b></span><div class="card_text"><u>Phone number</u>: <?php echo($member_info['phone']);?></div></li>
                <li><span class="fa-li"><b class="fas fa-group"></b></span><div class="card_text"><u>Number of employees</u>: <?php echo($member_info['number_of_employees']);?></div></li>
                <li><span class="fa-li"><b class="fas fa-group"></b></span><div class="card_text"><u>Number of volunteers</u>: <?php echo($member_info['number_of_volunteers']);?></div></li>
            </ul>
        </div>
    </div>

    <div class="col-2">
        <table class="table">
            <thead>
		        <tr>
			        <th scope="col">Projects</th>
			        <th scope="col">Summary</th>
                    <th scope="col">Keywords</th>
		        </tr>
            </thead>
            <tbody>
                <?php 
                if ($rowcount > 0) {
                    echo $tableBody;
                } else {
                    echo "<tr><td colspan=\"7\" style=\"text-align: center;\">The organisation has not shared any projects yet.</td></td>";
                }
                ?>
	        </tbody>
        </table>
    </div>

</div>

</html>