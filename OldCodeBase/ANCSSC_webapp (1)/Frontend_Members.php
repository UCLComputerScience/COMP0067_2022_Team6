<?php require 'auth_redirect.php'; ?>

<DOCTYPE! html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANCSSC | Members</title>
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
        margin-top: 2vw;
        margin-bottom: 4vw;
    }

    .pag_center {
        text-align: center;
    }

    .pagination {
        display: inline-block;
        padding-bottom: 1vw;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        font-family: sans-serif;
        background-color: #FCC05E;
        color: white;
        border: 1px solid #4E515B;
        margin: 0 2px;
    }

    .pagination a:hover:not(.active) {background-color: #4E515B;}

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

    .table {
        font-family: sans-serif;
        font-size: calc(8px + 0.8vw);
        margin-left: auto;
        margin-right: auto;
        width: 90vw;
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
        height: 40px;
        text-align: center;
    }
</style>

<div class="topnav">
    <?php
    require 'Frontend_header_universal.php';
    ?>
</div>

<div class="main_title">MEMBER NGOs and CSOs</div>

<?php

require 'db_connect.php'; # connect to db

// SET PAGINATION - get the current page number (set to 1 if none selected)
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
 } else {
    $pageno = 1;
 }

$limit = 50; // choose number of members displayed per page
$offset = ($pageno - 1) * $limit; // count from where in the db to start taking data

// Count how many rows will be displayed overall
$queryResult = mysqli_query($link, "SELECT count(*) FROM users WHERE ngo_name NOT IN ('')");
if ($queryResult == null) {
    echo "First query error";
    exit;
}
$memberCountData = mysqli_fetch_row($queryResult);
$memberCount = $memberCountData[0];

$lastpage = ceil($memberCount/$limit); // count the number of pages

# Get user IDs and names from the database
$queryResult2 = mysqli_query($link, "SELECT id_user, ngo_name, countries_of_operation FROM users WHERE ngo_name NOT IN ('') ORDER BY ngo_name ASC LIMIT $offset, $limit");
if ($queryResult2 == null) {
    echo "Second query error";
    exit;
}

# Fill table with member NGOs and CSOs
$tableBody = "";
while ($row = mysqli_fetch_assoc($queryResult2)) {
    $tableBody .= <<<EOT
	<tr>
        <td class="table_entries">
            <a class="button" href='Frontend_Member_Card.php?id_member={$row['id_user']}'>
            {$row['ngo_name']}
            </a>
        </td>
        <td class="table_entries">
			{$row['countries_of_operation']}
        </td>
	</tr>
EOT;
}

mysqli_close($link); # close db connection
?>

<body>

<div class="pag_center" >
    <row class="pagination">
        <?php for($i = 1; $i<= $lastpage; $i++) : ?>
            <a href="Frontend_Members.php?pageno=<?= $i; ?>"><?= $i; ?></a>
        <?php endfor; ?>
    </row>
</div>

<table class="table">
    <thead>
		<tr>
			<th scope="col">Member Name</th>
			<th scope="col">Countries of Operation</th>
		</tr>
    </thead>
    <tbody>
		<?php echo $tableBody;?>
	</tbody>
</table>
</body>
</html>