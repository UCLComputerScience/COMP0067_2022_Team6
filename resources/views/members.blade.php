@extends('layouts.mainlayout')
@section('content')
<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8" />

<!DOCTYPE html>
<html>
<head>
	<title>Laravel 5 - Multiple markers in google map using gmaps.js</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="http://maps.google.com/maps/api/js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>


  	<style type="text/css">
    	#mymap {
      		border:1px solid red;
      		width: 800px;
      		height: 500px;
    	}
  	</style>


</head>
<body>


  <h1>Laravel 5 - Multiple markers in google map using gmaps.js</h1>


  <div id="mymap"></div>


  <script type="text/javascript">


    var location = <?php print_r(json_encode($location)) ?>;

    var mymap = new GMaps({
      el: '#mymap',
      lat: 21.170240,
      lng: 72.831061,
      zoom:6
    });

    $.each( location, function( index, value ){
	    mymap.addMarker({
	      lat: value.lat,
	      lng: value.lng,
	      title: value.city,
	      click: function(e) {
	        alert('This is '+value.city+', gujarat from India.');
	      }
	    });
   });


  </script>


</body>
</html>

<div>
    <div class="container">
        <h1>Bootstrap Table</h1>
        
        <p>A table with third party integration  extension Filter control extension Data export</a> pour exporter</p>
        
        <div id="toolbar">
                <select class="form-control">
                        <option value="">Export Basic</option>
                        <option value="all">Export All</option>
                        <option value="selected">Export Selected</option>
                </select>
        </div>
        
        <table id="table" 
                     data-toggle="table"
                     data-search="true"
                     data-filter-control="true" 
                     data-show-export="true"
                     data-click-to-select="true"
                     data-toolbar="#toolbar"
               class="table-responsive">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="prenom" data-filter-control="input" data-sortable="true">First Name</th>
                    <th data-field="date" data-filter-control="select" data-sortable="true">Date</th>
                    <th data-field="examen" data-filter-control="select" data-sortable="true">Examination</th>
                    <th data-field="note" data-sortable="true">Note</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bs-checkbox "><input data-index="0" name="btSelectItem" type="checkbox"></td>
                    <td>Jitender</td>
                    <td>01/09/2015</td>
                    <td>Français</td>
                    <td>12/20</td>
                </tr>
                <tr>
                    <td class="bs-checkbox "><input data-index="1" name="btSelectItem" type="checkbox"></td>
                    <td>Jahid</td>
                    <td>05/09/2015</td>
                    <td>Philosophie</td>
                    <td>8/20</td>
                </tr>
                <tr>
                    <td class="bs-checkbox "><input data-index="2" name="btSelectItem" type="checkbox"></td>
                    <td>Valentin</td>
                    <td>05/09/2015</td>
                    <td>Philosophie</td>
                    <td>4/20</td>
                </tr>
                <tr>
                    <td class="bs-checkbox "><input data-index="3" name="btSelectItem" type="checkbox"></td>
                    <td>Milton</td>
                    <td>05/09/2015</td>
                    <td>Philosophie</td>
                    <td>10/20</td>
                </tr>
                <tr>
                    <td class="bs-checkbox "><input data-index="4" name="btSelectItem" type="checkbox"></td>
                    <td>Gonesh</td>
                    <td>01/09/2015</td>
                    <td>Français</td>
                    <td>14/20</td>
                </tr>
                <tr>
                    <td class="bs-checkbox "><input data-index="5" name="btSelectItem" type="checkbox"></td>
                    <td>Valérie</td>
                    <td>07/09/2015</td>
                    <td>Mathématiques</td>
                    <td>19/20</td>
                </tr>
                <tr>
                    <td class="bs-checkbox "><input data-index="6" name="btSelectItem" type="checkbox"></td>
                    <td>Valentin</td>
                    <td>01/09/2015</td>
                    <td>Français</td>
                    <td>11/20</td>
                </tr>
                <tr>
                    <td class="bs-checkbox "><input data-index="7" name="btSelectItem" type="checkbox"></td>
                    <td>Eric</td>
                    <td>01/10/2015</td>
                    <td>Philosophie</td>
                    <td>8/20</td>
                </tr>
                <tr>
                    <td class="bs-checkbox "><input data-index="8" name="btSelectItem" type="checkbox"></td>
                    <td>Valentin</td>
                    <td>07/09/2015</td>
                    <td>Mathématiques</td>
                    <td>14/20</td>
                </tr>
                <tr>
                    <td class="bs-checkbox "><input data-index="9" name="btSelectItem" type="checkbox"></td>
                    <td>Valérie</td>
                    <td>01/10/2015</td>
                    <td>Philosophie</td>
                    <td>12/20</td>
                </tr>
                <tr>
                    <td class="bs-checkbox "><input data-index="10" name="btSelectItem" type="checkbox"></td>
                    <td>Eric</td>
                    <td>07/09/2015</td>
                    <td>Mathématiques</td>
                    <td>14/20</td>
                </tr>
                <tr>
                <td class="bs-checkbox "><input data-index="11" name="btSelectItem" type="checkbox"></td>
                    <td>Valentin</td>
                    <td>01/10/2015</td>
                    <td>Philosophie</td>
                    <td>10/20</td>
                </tr>
            </tbody>
        </table>
        </div>

</div>

<body onload="init();">

<h1>Our Members</h1>

<section id="sidebar">
<div id="directions_panel"></div>
</section>

<section id="main">
<div id="map_canvas" style="width: 70%; height: 500px;"></div>
</section>

</body>
</html>
