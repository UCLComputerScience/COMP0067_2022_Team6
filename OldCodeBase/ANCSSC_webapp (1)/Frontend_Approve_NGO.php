<?php require 'auth_redirect.php'; 

if ($_SESSION['role'] != 'admin') {
    header("Location: Frontend_Welcome_NGO.php");
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANCSSC | Approve Registration</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<script src="jquery-3.1.1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
			margin-bottom: 2vw;
		}

		.inspect_button {
			background-color: lightgrey;
			background-image: linear-gradient(darkgrey, #ededed);
			color: black;
			padding: 0.8vw;
			border-radius: 4px;
            font-size: calc(7px + 1.2vw);
        }

		.inspect_button:hover {
			color: white;
		}

		.accept_button {
			background-color: #4CAF50;
			background-image: linear-gradient(#016311, #02a61f);
			color: white;
			padding: 0.8vw;
			border-radius: 4px;
            font-size: calc(7px + 1.2vw);
        }

		.accept_button:hover {
			color: black;
		}

		.reject_button {
			background-color: #de0404;
			background-image: linear-gradient(#bf0000, #ff2626);
			color: white;
			border-radius: 4px;
			padding: 0.8vw;
            font-size: calc(7px + 1.2vw);
        }

		.reject_button:hover {
			color: black;
		}

		.table {
			border: 0.1vw solid black;
			color: black;
			font-family: sans-serif;
			font-size: 1.4vw;
			font-weight: bold;
			margin-top: 1vw;
			margin-left: 9vw;
			width: 80%
		}

		th, td {
			border-bottom: 1px solid #b0acac;
		}

		tr:nth-child(odd) {
			background-color: #b0acac;
		}
		.result {
			text-align: center;
			color: green;
			font-size: 1.5vw;
			font-weight: bold;
		}
		.b-popup{
			width:100%;
			min-height:100%;
			background-color: rgba(0,0,0,0.5);
			overflow:hidden;
			position:fixed;
			top:0px;
			z-index: 2;
		}
		.b-popup .b-popup-content{
			margin:40px auto 0px auto;
			width:500px;
			padding:10px;
			background-color: #ffffff;
			border-radius:5px;
			box-shadow: 0px 0px 10px #000;
		}
	</style>
	<script>
		//for "Inspect" function
		$(document).ready(function(){
			PopUpHide();
		});
		function PopUpShow(user){
			var headerHtml = "<h3>Information about user:</h3>\n";
			var userHtml = print_r(user);
			$("#user_info").html(headerHtml+userHtml);
			$("#popup1").show();
		}
		function PopUpHide(){
			$("#popup1").hide();
		}
		function print_r(arr, level) {
			var print_red_text = "";
			if(!level) level = 0;
			var level_padding = "";
			for(var j=0; j<level+1; j++) level_padding += "    ";
			if(typeof(arr) == 'object') {
				for(var item in arr) {
					var value = arr[item];
					if(typeof(value) == 'object') {
						print_red_text += level_padding + item + " :\n<br>";
						print_red_text += print_r(value,level+1);
				} 
					else 
						print_red_text += level_padding + item + ": <b>" + value + "</b>\n<br>";
				}
			} 

			else  print_red_text = "===>"+arr+"<===("+typeof(arr)+")";
			return print_red_text;
		}
	</script>
</head>
<body>
<div class="topnav">
    <?php require 'Frontend_header_admin.php'; ?>
</div>
<div class="b-popup" id="popup1">
    <div class="b-popup-content">
        <div id="user_info">
			User info
		</div>
		<br>
		<input type="button" onclick="PopUpHide()" value="Close">
    </div>
</div>
<div class="main_title">APPROVE NGO REGISTRATION</div>
<?php
//displays a message about deleting or confirming a user
if(isset($_GET['res'])){
	echo '<div class="result">';
	switch( $_GET['res'] ) {
		case 'approve_ok':
			echo 'The user was successfully confirmed.';
			break;
		case 'delete_ok':
			echo 'The user has been successfully deleted.';
			break;
	}
	echo '</div>';
}

//search for unconfirmed users and display them
require "db_connect.php";
$NGO_approve_query="SELECT * FROM users WHERE ngo_status = 0";
if($result = mysqli_query($link, $NGO_approve_query))
{
	echo"<table class='table'><tbody>";
	while($row = mysqli_fetch_assoc($result)) {
		$userid = $row['id_user'];
		$userStr = json_encode($row);
		echo <<<EOT
		<tr>
			<td scope="row">
				NGO  Number $userid
			</td>	
			<td>
				<button class="inspect_button" onclick='var user = $userStr; PopUpShow(user);'>
					Inspect
				</button>
			</td>
			<td>
				<form action="Approve_NGO.php" method="get" id="form_approve">
					<input type="hidden" name="id_user" value="$userid">
					<button type="submit" class="accept_button" form="form_approve">
						Approve
					</button>
				</form>
			</td>
			<td>
				<form action="Reject_NGO.php" method="get">
					<input type="hidden" name="id_user" value="$userid">
					<button type="submit" class="reject_button">
						Reject
					</button>
				</form>
			</td>
		</tr>
EOT;		
	}
    echo "</tbody>";
    echo "</table>";
}
?>
</body>
</html>