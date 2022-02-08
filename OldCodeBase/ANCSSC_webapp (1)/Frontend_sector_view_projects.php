<?php require 'auth_redirect.php'; ?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ANCSSC | Projects</title>
	<script src="jquery-3.1.1.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<style>
		.SDG_name {
			font-family: sans-serif;
			color: #4E515B;
			font-weight: bold;
            font-size: calc(2vw + 10px);
			padding-left: 14vw;
			padding-bottom: 1vw;

		}

		.sdg_image {
			width: 10vw;
			height: auto;
			padding-right: 2vw;
			top: 2vw;
			vertical-align: middle;
			margin-bottom: 2vw;
		}

		.topnav {
			padding-bottom: 9vw;
		}

		.main_title {
            font-size:calc(10px + 1.5vw);
			font-family: sans-serif;
			color: #4E515B;
			font-weight: bold;
			text-align: center;
		}

		.sub_title {
            font-size: calc(1.4vw + 8px);
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

		a.new_project_button {
			background-color: #4CAF50;
			background-image: linear-gradient(#016311, #02a61f);
			color: white;
			border-color: black;
            padding: 1vw 2vw 1vw 2vw;
			font-family: sans-serif;
			border-radius: 4px;
            font-size: calc(7px + 1.2vw);
			margin-left: 78vw;
			text-decoration: none;
		}

		a.new_project_button:hover {
			color: black;
		}

		.table_entries {
			font-family: sans-serif;
			color: black;
            font-size: calc(7px + 0.9vw);
			text-decoration: none;
		}

		.search_fields {
			width: calc(9vw + 50px);
			color: white;
			background-color: #4E515B;
			margin-bottom: 3vw;
			margin-left: 1vw;
			float: left;
			padding: 0.5vw;
			border-radius: 4px;
            font-size: calc(7px + 0.9vw);
		}

		.search_fields:hover {
			background-color: #FCC05E;
		}

		.first_search_field {
            width: calc(9vw + 50px);
			color: white;
			background-color: #4E515B;
			margin-bottom: 3vw;
			margin-left: 25vw;
			float: left;
			padding: 0.5vw;
			border-radius: 4px;
            font-size: calc(7px + 0.9vw);
		}

		.first_search_field:hover {
			background-color: #FCC05E;;
		}

		.row {
			margin-top: 4vw;
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
if (!isset($_GET['id_sectors'])) {
	print_r($_GET);
	die("GET parameter 'id_sectors' is not set");
}

$id_sector = $_GET['id_sectors'];
$idSdg = $_GET['id_sdg'];
$nameSdg = $_GET['sdg_name'];
$picSdg = $_GET['sdg_pic'];
$sector_name = $_GET['sector_name'];

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
		'field' => 'project_location',
		'caption' => 'Location',
		'dir' => false,
		'class' => 'search_fields'
	)
);

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

//main selection from databases
$query1 = "SELECT * FROM projects WHERE id_sector_f = $id_sector ORDER BY $curOrder $dirOrder";
$queryResult = mysqli_query($link, $query1);
if ($result = mysqli_query($link, $query1)) {
    $rowcount = mysqli_num_rows($result);
}
?>

<div class="SDG_name">
	<img class="sdg_image" src="SDG_images/<?php echo $picSdg;?>">
	<?php echo $nameSdg;?>
</div>
<div class="main_title">'<?php echo $sector_name;?>' projects</div>

<?php
if ($rowcount == 0) {
    echo '<div class="sub_title">No saved projects for this sector.<br>Please add a project and try again.</div>';
    echo '<div class="row"><a class="new_project_button" href="Frontend_NGO_New_project.php"><b>Add New<br>Project</b></a></div>';
    exit;
}
?>

<div class="row">
    <form action="" method="get">
		<input type="hidden" name="id_sectors" value="<?php echo $id_sector;?>">
		<input type="hidden" name="id_sdg" value="<?php echo $idSdg;?>">
		<input type="hidden" name="sdg_name" value="<?php echo $nameSdg;?>">
		<input type="hidden" name="sdg_pic" value="<?php echo $picSdg;?>">
		<input type="hidden" name="sector_name" value="<?php echo $sector_name;?>">
		<input type="hidden" name="priv_order" value="<?php echo $curOrder;?>">
		<input type="hidden" name="dir_order" value="<?php echo $dirOrder;?>">
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
    </form>
</div>

<table class="table" id="project_table">
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
    <?php 
	//filling in and show the results table
	while ($row = mysqli_fetch_assoc($queryResult)) {
		//find project sdg information
		$stmt1 = $link->prepare("SELECT * FROM sdg WHERE id_sdg = ?");
        $stmt1 -> bind_param("i", $row['project_sdg']);
        $stmt1 -> execute();
        $result1 = $stmt1->get_result(); // get the mysqli result
		$project_sdg = $result1->fetch_assoc(); // fetch data
		
		//find project sector information
		$stmt2 = $link->prepare("SELECT sector_name FROM sectors WHERE id_sectors = ?");
		$stmt2 -> bind_param("i", $row['id_sector_f']);
		$stmt2 -> execute();
		$result2 = $stmt2->get_result(); // get the mysqli result
		$project_sector = $result2->fetch_assoc(); // fetch data

		//fill the table
		echo <<<EOT
		<tr>
			<td class="th" scope="row">
				{$row['project_ngo_name']}
			</td>
			<td class="table_entries">
				<a class="button" href='Frontend_Project_Card.php?id_project={$row['id_project']}'>
					{$row['project_name']}
				</a>
			</td>
			<td class="table_entries">
				<a class="button" href='Frontend_SDGs_sector.php?id_sdg={$project_sdg['id_sdg']}&sdg_pic={$project_sdg['sdg_pic']}&sdg_name={$project_sdg['sdg_name']}'>
					{$project_sdg['sdg_name']}
				</a>
			</td>
			<td class="table_entries">
				{$project_sector['sector_name']}
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
    }
    ?>
    </tbody>
</table>
</body>
</html>