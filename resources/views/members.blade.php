@extends('layouts.mainlayout')

<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8" />

@section('content')
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