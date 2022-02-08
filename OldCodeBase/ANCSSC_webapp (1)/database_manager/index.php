<!DOCTYPE html>
<html>

<head>
	<title>ANCSSC | Database Manager</title>
	<link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/trirand/ui.jqgrid.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/ui.multiselect.css" />
	<style>

        
        .list{
        font-family: sans-serif;
        color: #FCC05E;
        font-weight: bold;
        font-size: calc(12px + 1vw);
        margin-right: 1.9vw;
        border: 1px;
        text-transform: uppercase;
        text-decoration: none;
        }
        
        .list:hover{
            color: #4E515B;
            
        }

        .unt_list{
            display: inline;
        }
        
        .tablelist{
            text-align: center;
        }
        
        .grid{
            margin-top: 1vw;
        }
        
        .title{
            font-family: sans-serif;
            font-size:calc(14px + 1.5vw);
            text-align: center;
            margin-bottom: 4vw;
            margin-top: 12vw;
            font-weight: bold;
            color:#4E515B;
        }
	</style>
     
	<script src="js/jquery.min.js" type="text/javascript"></script>   
	<script src="js/trirand/i18n/grid.locale-en.js" type="text/javascript"></script>
    <script src="js/trirand/jquery.jqGrid.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $.jgrid.no_legacy_api = true;
        $.jgrid.useJSON = true;
	</script>

	<script src="js/jquery-ui.min.js" type="text/javascript"></script>
</head>
<body>
<?php session_start();

    switch ($_SESSION['role']){
    case 'admin':
        echo '<div class="header" style="margin-bottom: 2vw;">';
        require 'Frontend_header_admin_copy.php';
        echo '</div>';
        break;
    default:
        header('Location: ../Frontend_Login.php');
        break;
}

?>
        
<?php
function get_primary_key($result)
{
	while($struct = mysqli_fetch_array($result)) {
		if($struct['Key'] == 'PRI')
			return $struct['Field'];
	}
}

require('../db_connect.php');
$result = mysqli_query($link, "SHOW TABLES FROM `website_database`");
$check = mysqli_num_rows($result);
if ($check == 0){
    die('No tables to be displayed');
}
$tables = array();
$firstEle = false;
$defaultTable = '';
$defaultId = '';
while ($table = mysqli_fetch_array($result)){
    
	$tables[$table[0]] = 'unknown';
}
foreach($tables as $k => $v) {
	$result = mysqli_query($link, "SHOW COLUMNS FROM $k");
	$id = get_primary_key($result);
	$tables[$k] = $id;
    if (!$firstEle){$defaultTable=$k; $defaultId=$id; $firstEle=true;}
}
//-----------------------------------------------------------
echo "<div class=\"title\">Please select what data you want to manage:</div>";
echo "<div class=\"tablelist\"><ul class=\"unt_list\">\n";
foreach($tables as $table => $key) {
	echo "\t<li style=\"display: inline\"><a class=\"list\"  href=\"?table=$table&key=$key\">$table</a></li>\n";
}
echo "</ul></div><br>\n";
//-----------------------------------------------------------
?>

    
    
<div class="grid">
	<?php 
    require ("grid.php");
    ?>
</div>


</body>
</html>