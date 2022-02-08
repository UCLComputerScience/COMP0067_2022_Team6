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
        margin-top: 3vw;
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
    color: #FCC05E;
    text-decoration: none;
    }

    a:visited {
    color: #FCC05E;
    text-decoration: none;
    }

    a:hover {
    color: #4E515B;
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

//array for order buttons
$order = array(
	array(
		'field' => 'project_ngo_name',
		'caption' => 'NGO A - Z',
		'dir' => false,
		'class' => 'first_search_field'
	),
	array(
		'field' => 'project_name',
		'caption' => 'Project Name',
		'dir' => false,
		'class' => 'search_fields'
	),
	array(
		'field' => 'sdg_name',
		'caption' => 'SDG',
		'dir' => false,
		'class' => 'search_fields'
	),
	array(
		'field' => 'sector_name',
		'caption' => 'Sector',
		'dir' => false,
		'class' => 'search_fields'
	),
	array(
		'field' => 'project_location',
		'caption' => 'Location',
		'dir' => false,
		'class' => 'search_fields'
	)
);

$gsearch = mysqli_real_escape_string($link, $_GET['gsearch']);
$gsearch = filter_var($_GET['gsearch'], FILTER_SANITIZE_STRING);
$curOrder = $order[0]['field'];
$dirOrder = 'asc';

if(isset($_GET['order_by'])){
	$curOrder = $_GET['order_by'];
	$privOrder = $_GET['priv_order'];
	//change sort order on repeat button click
	if($curOrder == $privOrder) {
		if( $_GET['dir_order'] == 'desc' )
			$dirOrder = 'asc';
		elseif( $_GET['dir_order'] == 'asc' )
			$dirOrder = 'desc';
	}	
}

//mark the button where the arrow should be drawn
foreach($order as $k => $v) {
	if($order[$k]['field'] == $curOrder) {
		$order[$k]['dir'] = $dirOrder;
	} else {
		$order[$k]['dir'] = false;
	}
}

$searchsdg = mysqli_real_escape_string($link, $_GET['sdg']);

//main selection from databases
if ($searchsdg == "all"){
    $query1 = "SELECT * FROM projects WHERE project_summary LIKE '%$gsearch%' OR project_keywords LIKE '%$gsearch%' OR project_location LIKE '%$gsearch%' OR project_beneficiaries LIKE '%$gsearch%' ORDER BY $curOrder $dirOrder";
} else {
    $query1 = "SELECT * FROM projects WHERE (project_sdg = $searchsdg AND project_summary LIKE '%$gsearch%') OR (project_sdg = $searchsdg AND project_keywords LIKE '%$gsearch%') OR (project_sdg = $searchsdg AND project_location LIKE '%$gsearch%') OR (project_sdg = $searchsdg AND project_beneficiaries LIKE '%$gsearch%') ORDER BY $curOrder $dirOrder";
}

$queryResult = mysqli_query($link, $query1);
if ($result = mysqli_query($link, $query1)) {
    $rowcount = mysqli_num_rows($result);
}

$queryData = [];

//filling in the results table
$tableBody = "";
while ($row = mysqli_fetch_assoc($queryResult)) {
    $stmt = $link->prepare("SELECT * FROM sdg WHERE id_sdg = ?");
    $stmt -> bind_param("i", $row['project_sdg']);
    $stmt -> execute();
    $result = $stmt -> get_result(); // get the mysqli result
    $project_sdg = $result -> fetch_assoc(); // fetch data
    $stmt -> close();

	$tableBody .= <<<EOT
	<tr>
		<td class="th" scope="row">
            <a href='Frontend_Member_Card.php?id_member={$row['id_user_f']}'>
                {$row['project_ngo_name']}
            </a>
		</td>
		<td class="table_entries">
			<a class="button" href='Frontend_Project_Card.php?id_project={$row['id_project']}'>
				{$row['project_name']}
			</a>
		</td>
        <td class="table_entries">
            <a class="button" href='Frontend_SDGs_sector.php?id_sdg={$row['project_sdg']}&sdg_pic={$project_sdg['sdg_pic']}&sdg_name={$project_sdg['sdg_name']}'>
				{$project_sdg['sdg_name']}
			</a>	
		</td>
		<td class="table_entries">
			{$row['project_summary']}
		</td>
		<td class="table_entries">
			{$row['project_location']}
		</td>
		<td class="table_entries">
			{$row['project_start']} - {$row['project_end']}
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

    <div class="main_info">
        <form action="Frontend_Member_Map_Select.php" method="post">
            <input type="hidden" id="coord" name="coord" value="<?php echo htmlspecialchars($usableData); ?>">
            <input type="submit" class="search_button" value="Map Results">
        </form>
    </div>

    <form action="" method="get">
        <div class="row">
            <input type="hidden" name="priv_order" value="<?php echo $curOrder;?>">
			<input type="hidden" name="dir_order" value="<?php echo $dirOrder;?>">
			<input type="hidden" name="gsearch" value="<?php echo $gsearch;?>">
			<?php
				//displaying sorting buttons
				foreach($order as $k => $v) {
					if($v['dir'] == 'asc'){
						$arrow = '&nbsp;&#9660;';
					} elseif ($v['dir'] == 'desc') {
						$arrow = '&nbsp;&#9650;';
					} else {
						$arrow = '';
					}
					echo "<button type=\"submit\" class=\"{$v['class']}\" name=\"order_by\" value=\"{$v['field']}\">{$v['caption']}$arrow</button>\n";
				}
			?>
        </div>
    </form>
</div>

<table class="table">
    <thead>
		<tr>
			<th scope="col">NGO Name</th>
			<th scope="col">Project Name</th>
			<th scope="col">SDG</th>
			<th scope="col">Project Summary</th>
			<th scope="col">Location</th>
			<th scope="col">Timeline</th>
		</tr>
    </thead>
    <tbody>
		<?php
		//choose display a message that nothing was found or a table
		if($rowcount > 0)
			echo $tableBody;
		else
			echo "<tr><td colspan=\"7\" style=\"text-align: center;\">Nothing found.</td></td>";
		?>
	</tbody>
</table>
</body>
</html>