<?php
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
$grid->SelectCommand = 'SELECT * FROM users';
// Set the table to where you add the data
$grid->table = 'users';
$grid->setPrimaryKeyId('id_user');
$grid->serialKey = false;
// Set output format to json
$grid->dataType = 'json';
// Let the grid create the model
$grid->setColModel();
// Set the url from where we obtain the data
$grid->setUrl('grid_users.php');
// Set some grid options
$grid->setGridOptions(array(
	"rowNum"=>10,
	"rowList"=>array(10,20,30),
	"sortname"=>"id_user",
    "autowidth"=>true,
    "height"=>'auto'
));
// The primary key should be entered
$grid->setColProperty('id_user', array("editable"=>false, "width"=>"100px"));
$grid->setColProperty("ngo_status",array("edittype"=>'checkbox', "editoptions"=>array("value"=>'1:0'), "formatter"=>"checkbox", "align"=>"center", "label"=>"Confirmed"));
// Enable navigator
$grid->navigator = true;
// Enable only deleting
$grid->setNavOptions('navigator', array("excel"=>false,"add"=>true,"edit"=>true,"del"=>true,"view"=>false, "search"=>false));
$grid->setNavOptions('add',array("closeAfterAdd"=>true,"reloadAfterSubmit"=>true, "width"=>'auto', "height"=>'auto', "dataheight"=>'auto'));

// Enjoy
$grid->renderGrid('#grid_users','#pager_users',true, null, null, true,true);