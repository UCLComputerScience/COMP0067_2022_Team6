<?php
if (isset($_GET['table']) && strlen($_GET['table'])>0 && isset($_GET['key']) && strlen($_GET['key'])>0){
$table = $_GET['table'];
$key = $_GET['key'];
}
else{$table = $defaultTable; $key = $defaultId;}


require_once 'jq-config.php';
// include the jqGrid Class
require_once ABSPATH."php/jqGrid.php";
// include the driver class
require_once ABSPATH."php/DBdrivers/jqGridPdo.php";
// Connection to the server
$conn = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
// Tell the db that we use utf-8
$conn->query("SET NAMES utf8");


// Create the jqGrid instance
$grid = new jqGridRender($conn);
// Write the SQL Query
$grid->SelectCommand = "SELECT * FROM $table";
// Set the table to where you add the data
$grid->table = $table;
$grid->setPrimaryKeyId($key);
$grid->serialKey = false;
// Set output format to json
$grid->dataType = 'json';
// Let the grid create the model
$grid->setColModel();
// Set the url from where we obtain the data
$grid->setUrl("grid.php?table=$table&key=$key");
// Set some grid options
$grid->setGridOptions(array(
	"rowNum"=>10,
	"rowList"=>array(10,20,30),
	"sortname"=>$key,
    "autowidth"=>true,
    "height"=>'auto'
));
// The primary key should be entered
$grid->setColProperty($key, array("editable"=>false, "width"=>"100px"));
$grid->setColProperty("ngo_status",array("edittype"=>'checkbox', "editoptions"=>array("value"=>'1:0'), "formatter"=>"checkbox", "align"=>"center", "label"=>"Confirmed"));
// Enable navigator
$grid->navigator = true;
// Enable only deleting
$grid->setNavOptions('navigator', array("excel"=>true,"add"=>true,"edit"=>true,"del"=>true,"view"=>false, "search"=>false));
$grid->setNavOptions('add',array("closeAfterAdd"=>true,"reloadAfterSubmit"=>true, "width"=>'auto', "height"=>'auto', "dataheight"=>'auto'));


// Enjoy
$grid->renderGrid("#grid_$table","#pager_$table",true, null, null, true,true);
