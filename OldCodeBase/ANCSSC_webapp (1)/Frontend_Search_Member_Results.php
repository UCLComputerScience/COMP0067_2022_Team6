<?php require 'auth_redirect.php'; ?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
<title>ANCSSC | Search</title>
<script src="jquery-3.1.1.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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

    .main_info {
        margin-bottom: 3vw;
        font-size: calc(7px + 0.9vw);
        text-align: center;
    }

    .search_button {
        text-align: center;
        color: white;
        background-color: #FCC05E;
        font-size:calc(10px + 1.3vw);
        width: 19vw;
        min-width: 100px;
        margin-left: 2vw;
        border-radius: 4px;
        padding: 0.6vw 1.5vw 0.6vw 1.5vw;
        font-family: sans-serif;
        text-decoration: none;
    }

    .search_button:hover {
        background-color: #4E515B;
    }

    .input[type=text], select, textarea {
        width: calc(30px + 50vw);
        text-align: left;
        color: black;
        font-size:calc(12px + 1.1vw);
        font-family: sans-serif;
        border: 1px solid #4E515B;
        border-radius: 4px;
        margin-left: 10vw;
    }

    .input_project[type=text] {
        width: 32.5vw;
        text-align: left;
        color: black;
        font-size:calc(12px + 1.1vw);
        font-family: sans-serif;
        border: 1px solid #4E515B;
        border-radius: 4px;
        margin-left: 10vw;
    }

    .sdg_choice {
        width: 18vw;
        text-align: center;
        color: black;
        font-size:calc(12px + 1.1vw);
        font-family: sans-serif;
        border: 1px solid #4E515B;
        border-radius: 4px;
        margin-left: 2vw;
    }

    .container {
        width: 100%;
    }

    form {
        width: 100%;
    }

    .row {
        flex-wrap: nowrap;
    }


    .search_fields {
        width: calc(18px + 12vw);
        font-size: calc(12px + 0.8vw);
        color: white;
        background-color: #4E515B;
        margin-top: 3vw;
        margin-bottom: 3vw;
        margin-left: 1vw;
        float: left;
        padding: 0.5vw;
        border-radius: 4px;
    }

    .search_fields:hover {
        background-color: #FCC05E;
    }

    .first_search_field {
        width: calc(18px + 12vw);
        font-size: calc(12px + 0.8vw);
        color: white;
        background-color: #4E515B;
        margin-top: 3vw;
        margin-bottom: 3vw;
        margin-left: 7vw;
        float: left;
        padding: 0.5vw;
        border-radius: 4px;
    }

    .first_search_field:hover {
        background-color: #FCC05E;;
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

    .table {
        border: 0.1vw solid black;
        font-family: sans-serif;
        font-size: calc(10px + 0.8vw);
        margin-left: 8vw;
        width: 80vw;
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

</style>

</head>
<body>
<div class="topnav">
	<?php require 'Frontend_header_universal.php'; ?>
</div>
<?php
require('db_connect.php');

//check required argument
if (!isset($_GET['gsearch'])) {
	print_r($_GET);
	die("GET parameter 'gsearch' is not set");
}

$gsearch = mysqli_real_escape_string($link, $_GET['gsearch']);
$gsearch = filter_var($_GET['gsearch'], FILTER_SANITIZE_STRING);

//main selection from databases
$query1 = "SELECT id_user, ngo_name, lat, lng FROM users WHERE ngo_name LIKE '%$gsearch%' OR city LIKE '%$gsearch%' OR country LIKE '%$gsearch%' OR countries_of_operation LIKE '%$gsearch%'";
$queryResult = mysqli_query($link, $query1);
if ($result = mysqli_query($link, $query1)) {
    $rowcount = mysqli_num_rows($result);
}

$queryData = [];

//filling in the results table
$tableBody = "";
while ($row = mysqli_fetch_assoc($queryResult)) {
	$tableBody .= <<<EOT
	<tr>
		<td class="th" scope="row">
            <a href='Frontend_Member_Card.php?id_member={$row['id_user']}'>
            {$row['ngo_name']}
            </a>
		</td>
	</tr>
EOT;

    array_push($queryData, $row);
}

$usableData = json_encode($queryData);

mysqli_close($link);
?>

<div class="main_title">SEARCH RESULTS</div>
<div class="container">
    <form action="Frontend_Search_Results.php" method="get" >
        <div class="row">
            <input class="input_project" type="text" placeholder=" Search projects:" id="gsearch" name="gsearch" required>
            <select class="sdg_choice" type="text" name="sdg">
                    <option value="all">In all SDGs</option>
                    <option value="1">SDG 1</option>
                    <option value="2">SDG 2</option>
                    <option value="3">SDG 3</option>
                    <option value="4">SDG 4</option>
                    <option value="5">SDG 5</option>
                    <option value="6">SDG 6</option>
                    <option value="7">SDG 7</option>
                    <option value="8">SDG 8</option>
                    <option value="9">SDG 9</option>
                    <option value="10">SDG 10</option>
                    <option value="11">SDG 11</option>
                    <option value="12">SDG 12</option>
                    <option value="13">SDG 13</option>
                    <option value="14">SDG 14</option>
                    <option value="15">SDG 15</option>
                    <option value="16">SDG 16</option>
                    <option value="17">SDG 17</option>
            </select>
            <input type="submit" class="search_button" value="Search">
        </div>
	</form>
    </br>
    <form action="Frontend_Search_Member_Results.php" method="get">
        <div class="row">
            <input class="input" type="text" placeholder="Search members:" id="gsearch" name="gsearch" required>
            <input type="submit" class="search_button" value="Search">
        </div>
    </form>
    </br>
</div>

<div class="main_info">
    <form action="Frontend_Member_Map_Select.php" method="post">
        <input type="hidden" id="coord" name="coord" value="<?php echo htmlspecialchars($usableData); ?>">
        <input type="submit" class="search_button" value="Map Results">
    </form>
</div>

<table class="table">
    <thead>
		<tr>
			<th scope="col">Members</th>
		</tr>
    </thead>
    <tbody>
		<?php
		//choose display a message that nothing was found or a table
		if($rowcount > 0)
			echo $tableBody;
		else
			echo "<tr><td colspan=\"7\" style=\"text-align: center;\">No members found.</td></td>";
		?>
	</tbody>
</table>
</body>
</html>