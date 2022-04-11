<!-- TODO: 
1. Get filtering to work for projects table
2. After filtering is working, copy-paste projects table section and change columns + contents for reports -->
@extends('layouts.mainlayout-logged-in')

@section('content')

<!DOCTYPE html>
<html lang="en">
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <br>
            <br>
            <br>
            <!-- Page Content-->
            <section class="py-5">
                <div class="text-center mb-5">
                        <h1 class="fw-bolder">Projects</h1>
                        <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                </div>
                <div class="text-center mb-5">
                        <h2 class="fw-bolder">Project locations</h1>
                        <p class="lead fw-normal text-muted mb-0"></p>
                </div>

<body>
    <div id="map" style="width: 80%; height: 250px; margin: auto; margin-bottom: 2%;"></div>
        <div class="text-center mb-5">
            <?php $userprojs = DB::table('projects')
                ->select(array('projectOrganisation','projectTitle', 'latitude', 'longitude','sdg'))
                ->get();?>
            
            <?php //echo $userlocs ?>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcydguZHOGI6lNeztJdpmJTg0dp3P09vg&callback=initMap"
            type="text/javascript"></script>
    <script type="text/javascript">
        var locations = <?php echo $userprojs ?>;
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
                title: locations[i]['projectTitle'],

                
            });       
        }
        google.maps.event.addListener(marker, 'mouseover', function () {
        var point = fromLatLngToPoint(marker.getPosition(), map);
        $('#marker-tooltip').html(marker.tooltipContent + '<br>Pixel coordinates: ' + point.x + ', ' + point.y).css({
            'left': point.x,
                'top': point.y
        }).show();
    });
    </script>
        </div>
    </div>
                <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                            <h2 class="fw-bolder">Project information</h1>
                            <p class="lead fw-normal text-muted mb-0">(explanatory text for the table below goes here)</p>
                    </div>

</html>
                    <!-- Project table -->

<?php
$userid = Auth::id();


$my_projects = DB::Table('projects')->select('project_id','projectTitle','projectDetails','projectEndDate')->get();
//echo ($my_projects);

$first_image_path = DB::Table('ImagePaths')->select('imageUUID','extension')->where('project_id',1)->get();
//echo str_replace(array ('[{"','"}]'),'' ,$first_image_path);

function print_listing_with_image($project_id, $title, $desc)
{

$first_image_path = DB::Table('projects')->where('project_id',$project_id)->pluck('image_name');
$first_image_path_stripped = str_replace(array( '["', '"]' ), '', $first_image_path);
$first_image_path_stripped_second = str_replace(array( ' '), '', $first_image_path_stripped);
$array = array('"sdg1"','"sdg2"','"sdg3"','"sdg4"','"sdg5"','"sdg6"','"sdg7','"sdg8"','"sdg9"','"sdg10"','"sdg11"','"sdg12"','"sdg13"','"sdg14"','"sdg15"','"sdg16"','"sdg17"','null','0','"',':','{','[','}',']',',,',',,,',',,,,',',,,,,',',,,,,,',',,,,,,,',',,,,,,,,',',,,,,,,,,',',,,,,,,,,,',',,,,,,,,,,,',',,,,,,,,,,,,',',,,,,,,,,,,,,',',,,,,,,,,,,,,,',',,,,,,,,,,,,,,',',,,,,,,,,,,,,,,',',,,,,,,,,,,,,,,,',',,,,,,,,,,,,,,,,,');
// $first_image_path_stripped_second = str_replace(array( ' '), '', $first_image_path_stripped);
$sdgs = DB::Table('projects')->select('sdg1','sdg2','sdg3','sdg4','sdg5','sdg6','sdg7','sdg8','sdg9','sdg10','sdg11','sdg12','sdg13','sdg14','sdg15','sdg16','sdg17')->where('project_id',$project_id)->get();
$sdgs_first_strip = str_replace($array,"",$sdgs);
  // Truncate long descriptions
  if (strlen($desc) > 250) {
    $desc_shortened = substr($desc, 0, 250) . '...';
  }
  else {
    $desc_shortened = $desc;
  }
  
  // Calculate time to auction end
 // $now = new DateTime();
  //if ($now > $end_time) {
   // $time_remaining = 'This auction has ended';
  //}
  //else {
    // Get interval:
    //$time_to_end = date_diff($now, $end_time);
   // $time_remaining = display_time_remaining($time_to_end) . ' remaining';
  //}
  
  // Print HTML
  echo('
    
    <li class="list-group-item d-flex justify-content-between">
    <div class="p-2 mr-5"><img alt="" src="http://127.0.0.1:8000/assets/'. $first_image_path_stripped_second . '" width="100" height="100"></div>
    <div class="p-2 mr-5"><h5><a href="projects-detail/' . $project_id. '">' . $title . '</a></h5>' . $desc_shortened . '</a></h5> <br><b> SDGs:</b> ' .  $sdgs_first_strip . '</div>
    <input type="hidden" name="_token" value="' . Session::token() . '?>">
    <div class="form-group row">
    <div>
    </form>
    </li>'
  );

}

  
  
  $counter = 0;
  foreach ($my_projects as $row)
  //while (TRUE)//$search_row = $my_projects->fetch_assoc())
  {
    $endDateTime = new DateTime($row->projectEndDate);
    print_listing_with_image($row->project_id,$row->projectTitle, $row->projectDetails,$row->projectEndDate);
    $counter +=1;
  }
  echo "</ul>";
  echo "Projects: " . $counter;
  ?>



        <!-- Report table -->
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                        <h2 class="fw-bolder">Project reports</h1>
                        <p class="lead fw-normal text-muted mb-0">(explanatory text for the table below goes here)</p>
                </div>
                <table id="projects" class="table table-striped nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Report name</th>
                            <th>Project name</th>
                            <th>Organisation name</th>
                            <th>Language</th>
                            <th>Description</th>
                            <th>SDGs</th>
                            <th>Date added</th>
                            <th>Last updated</th>
                        </tr>
                    </thead>
                <tbody>
                    <tr>
                        <td>2018 water research</td>
                        <td>Mexican water source</td>
                        <td>WaterAid</td>
                        <td>Spanish</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </td>
                        <td>3, 11</td>
                        <td>2018/11/13</td>
                        <td>2019/12/12</td>
                    </tr>
                    <tr>
                        <td>Super important report</td>
                        <td>Very important project</td>
                        <td>Oxfam</td>
                        <td>English</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </td>
                        <td>12</td>
                        <td>2019/1/3</td>
                        <td>2021/5/12</td>
                    </tr>
                    <tr>
                        <td>1st house</td>
                        <td>1000 houses</td>
                        <td>GlobalGiving</td>
                        <td>English</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </td>
                        <td>1, 4, 5, 6</td>
                        <td>2021/1/3</td>
                        <td>2021/1/3</td>
                    </tr>
                </tbody>
            <tfoot>
                <tr>
                    <th>Report name</th>
                    <th>Project name</th>
                    <th>Organisation name</th>
                    <th>Language</th>
                    <th>Description</th>
                    <th>SDGs</th>
                    <th>Date added</th>
                    <th>Last updated</th>

                </tr>
            </tfoot>
        </table>
    </div>

            </section>
        </main>
    </body>
</html>
@endsection