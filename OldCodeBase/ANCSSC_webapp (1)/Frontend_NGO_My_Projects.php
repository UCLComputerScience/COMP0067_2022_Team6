<?php require 'auth_redirect.php'; ?>

<!DOCTYPE html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<title>ANCSSC | My Projects</title>

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
    }

    .sub_title {
        font-size:1.9vw;
        font-family: sans-serif;
        color: #2ba7bd;
        font-weight: bold;
        padding: 1vw;
        text-align: center;
        margin-top: 1vw;
    }

    .table {
        border: 1px solid black;
        font-family: sans-serif;
        font-size: calc(7px + 0.9vw);
        margin-left: 6vw;
        margin-top: 2vw;
        width: 85vw;
    }

    th, td {
        border: 1px solid #4E515B;
    }

    th {
        color: white;
        background-color: #4E515B;
        border: 1px solid white;

    }

    .th {
        color: black;
        background-color: #b0acac;
        border: 1px solid white;
    }

    a.approve_button {
        background-color: #4CAF50;
        background-image: linear-gradient(#016311, #02a61f);
        color: white;
        border-color: black;
        padding: 1vw 2vw 1vw 2vw;
        font-family: sans-serif;
        border-radius: 4px;
        font-size: calc(7px + 1.2vw);
        margin-left: 60vw;
        text-decoration: none;
    }

    a.approve_button:hover {
        color: black;
    }

    .table_entries {
        font-family: sans-serif;
        color: black;
        font-size: calc(7px + 0.9vw);
        text-decoration: none;
    }

    .row {
        margin-top: 4vw;
    }
</style>


<div class="topnav">
    <?php
    require 'Frontend_header_universal.php';
    ?>
</div>

<?php
require('db_connect.php');

$id_user = $_SESSION['user']['id_user'];
$query1 = "SELECT * FROM projects WHERE id_user_f = $id_user";
$queryResult = mysqli_query($link, $query1);
if ($result=mysqli_query($link, $query1)) {
    $rowcount=mysqli_num_rows($result);
}

if ($rowcount == 0) {
    echo '<div class="main_title">';
    echo $_SESSION['user']['username'];
    echo ' Projects</div>';
    echo '<div class="sub_title">You have no saved projects.<br>Please add a project and try again.</div>';
    echo '<div class="row"><a class="approve_button" href="Frontend_NGO_New_project.php"><b>Add New<br>Project ></b></a></div>';
    exit;
}

?>

<div class="main_title"><?php echo $_SESSION['user']['username'];?> Projects</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">NGO Name</th>
            <th scope="col">Project Name</th>
            <th scope="col">SDG</th>
            <th scope="col">Sector</th>
            <th scope="col">Project summary</th>
            <th scope="col">Location</th>
            <th scope="col">Timeline</th>
        </tr>
    </thead>
    <tbody>
    <?php while ($row = mysqli_fetch_assoc($queryResult)) {
            echo '<tr><th class="th" scope="row">';
            echo $_SESSION['user']['ngo_name'];
            echo '</th><td class="table_entries">';
            echo '<a class="button" href=\'Frontend_Project_Card.php?id_project='.$row['id_project'].'\'>';
            echo $row['project_name'];
            echo '</a>';
            echo '</td>';
            echo '<td class="table_entries">';
            $stmt1 = $link->prepare("SELECT * FROM sdg WHERE id_sdg = ?");
            $stmt1-> bind_param("i", $row['project_sdg']);
            $stmt1 -> execute();
            $result1 = $stmt1->get_result(); // get the mysqli result
            $project_sdg = $result1->fetch_assoc(); // fetch data
            echo '<a class="button" href=\'Frontend_SDGs_sector.php?id_sdg=' . $project_sdg['id_sdg'] .
                '&sdg_pic=' . $project_sdg['sdg_pic'] . '&sdg_name=' . $project_sdg['sdg_name'] . '\'</a></div>';
            echo $project_sdg['sdg_name'];
            echo '</td>';
            echo '<td class="table_entries">';
            $stmt2 = $link->prepare("SELECT * FROM sectors WHERE id_sectors = ?");
            $stmt2 -> bind_param("i", $row['id_sector_f']);
            $stmt2 -> execute();
            $result2 = $stmt2->get_result(); // get the mysqli result
            $project_sector = $result2->fetch_assoc(); // fetch data
            echo '<a class="button" href=\'Frontend_sector_view_projects.php?id_sectors=' . $project_sector['id_sectors'] . '&id_sdg=' . $project_sdg['id_sdg'] .
                 '&sdg_name=' . $project_sdg['sdg_name'] . '&sdg_pic=' . $project_sdg['sdg_pic'] . '&sector_name=' . $project_sector['sector_name'] .
                '\'</a></div>';
            echo $project_sector['sector_name'];
            echo '</td>';
            echo '<td class="table_entries">';
            echo $row['project_summary'];
            echo '</td>';
            echo '<td class="table_entries">';
            echo $row['project_location'];
            echo '</td>';
            echo '<td class="table_entries">';
            echo $row['project_start'];
            echo ' to ';
            echo $row['project_end'];
            echo '</td>';
            echo '</tr>';
            }
        ?>
    </tbody>
</table>

<div class="row">

<div class="row">
    <a class="approve_button" href="Frontend_NGO_New_project.php"><b>Add New<br>Project</b></a>
</div>