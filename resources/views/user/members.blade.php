@extends('layouts.mainlayout-logged-in')
@section('content')
<!DOCTYPE html>

<html lang="en">
<head>
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
<meta charset="utf-8" />


<br><br><br>
            <!-- Page Content-->
<section class="py-1">
<div class="text-center mb-5">
<h1 class="fw-bolder">Our Members</h1>
 <p class="lead fw-normal text-muted mb-0">Find and collaborate with a Member of your choice below</p>
</div>
<div class="text-center mb-5">



<table id='usersTable' width='100%'>
<thead>
<tr>
    <td>Organisation Name</td>
    <td>Contact E-mail</td>
    <td>SDG</td>
    <td>Country</td>
</tr>
</thead>
</table>

<!-- Table -->
<script type="text/javascript">
$(document).ready(function(){

    // DataTable
    $('#usersTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('users.getUsers')}}",
        columns: [
            { data: 'name' },
            { data: 'email' },
            { data: 'sdg' },
            { data: 'country' },
            
        ]
    });

});
</script>
<br>
<!-- Map -->

<div id="map" style="width: 100%; height: 500px; margin: auto; margin-bottom: 2%;"></div>

<?php $userlocs = DB::table('users')
    ->select(array('org', 'latitude', 'longitude','country','sdg1','sdg2','sdg3','sdg4','sdg5','sdg6','sdg7','sdg8','sdg9','sdg10','sdg11','sdg12','sdg13','sdg14','sdg15','sdg16','sdg17'))
    ->get();
        
    $sdg_arr = array(DB::table('users')->select(['sdg1','sdg2','sdg3','sdg4','sdg5','sdg6','sdg7','sdg8','sdg9','sdg10','sdg11','sdg12','sdg13','sdg14','sdg15','sdg16','sdg17'])->get());
    //echo implode("'.'", $sdg_arr);
    // echo "jello"; ?>

<?php //echo $userlocs ?>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"
        type="text/javascript"></script>
<script type="text/javascript">
    var locations = <?php echo $userlocs ?>;
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 3,
        center: new google.maps.LatLng(14.3291267,-18.4540299),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i]['latitude'], locations[i]['longitude']),
            map: map,
            title: locations[i]['org'],
            
        });
    }

</script>
</section>
</body>
</html>
@endsection