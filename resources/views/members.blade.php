@extends('layouts.mainlayout')

<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8" />

@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Users Table</title>

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">

    <!-- Datatables CSS CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Datatables JS CDN -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

</head>
<body>
<h2 style="text-align: center;">Users Table</h2>
<table id='usersTable' width='100%'>
    <thead>
    <tr>
        <td>#ID</td>
        <td>#Name</td>
        <td>#Email</td>
    </tr>
    </thead>
</table>

<!-- Script -->
<script type="text/javascript">
    $(document).ready(function(){

        // DataTable
        $('#usersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('users.getUsers')}}",
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'email' },
            ]
        });

    });
</script>
</body>
</html>


<title>Google Maps Example</title>
<style type="text/css">
body { font: normal 14px Verdana; }
h1 { font-size: 24px; }
h2 { font-size: 18px; }
#sidebar { float: right; width: 30%; }
#main { padding-right: 15px; }
.infoWindow { width: 220px; }
</style>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
//<![CDATA[

var map;

// Ban Jelačić Square - Center of Zagreb, Croatia
var center = new google.maps.LatLng(45.812897, 15.97706);

function init() {

var mapOptions = {
zoom: 13,
center: center,
mapTypeId: google.maps.MapTypeId.ROADMAP
}

map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

var marker = new google.maps.Marker({
map: map,
position: center,
});
}
//]]>
</script>
</head>
<body onload="init();">

<h1>Where our members are located</h1>

<section id="sidebar">
<div id="directions_panel"></div>
</section>

<section id="main">
<div id="map_canvas" style="width: 70%; height: 500px;"></div>
</section>

</body>
</html>
@endsection