@extends('layouts.mainlayout-logged-in')

<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8" />

@section('content')

            <!-- Page Content-->
<section class="py-5">
<div class="text-center mb-5">
<h1 class="fw-bolder">Our Members</h1>
 <p class="lead fw-normal text-muted mb-0">Find and collaborate with a Member of your choice below</p>
</div>
<div class="text-center mb-5">

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
<table id='usersTable' width='100%'>
<thead>
<tr>
<<<<<<< Updated upstream
    <td>#ID</td>
    <td>#Name</td>
    <td>#Email</td>
=======
    <td>No.</td>
    <td>Organisation Name</td>
    <td>Country</td>
    <td>Contact E-mail</td>
    <td>SDG</td>
>>>>>>> Stashed changes
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
            { data: 'id' },
            { data: 'country' },
            { data: 'name' },
            { data: 'email' },
            { data: 'sdg' },
            
        ]
    });

});
</script>
</body>
</html>


<body>

<!-- Map -->

<div id="map" style="width: 100%; height: 500px; margin: auto; margin-bottom: 2%;"></div>

<?php $userlocs = DB::table('location')
    ->select(array('member_name', 'lat', 'lon','sdg'))
    ->get();?>

<?php //echo $userlocs ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcydguZHOGI6lNeztJdpmJTg0dp3P09vg&callback=initMap"
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
            position: new google.maps.LatLng(locations[i]['lon'], locations[i]['lat']),
            map: map,
            title: locations[i]['member_name'],
            
        });
    }

</script>

</body>
@endsection