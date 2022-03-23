<!-- TODO: Move events into a single grid - currently they are separate sets which is not good -->

@extends('layouts.mainlayout')

@section('content')

<div class="container">

<h2 class="my-3">Events</h2>


<ul class="list-group">

<?php
  // This page is for showing a user the auction listings they've made.
  // It will be pretty similar to browse.php, except there is no search bar.
  // This can be started after browse.php is working with a database.
  // Feel free to extract out useful functions from browse.php and put them in
  // the shared "utilities.php" where they can be shared by multiple files.


// $my_projects = DB::Table('projects')->select('project_id','projectTitle','projectDetails','projectEndDate')->where('id',$userid)->get();


$events = DB::Table('events')->select('event_id','event_title','event_description','event_datetime', 'event_timezone')->get();


function print_event_with_image($event_id, $event_title, $event_description)
{

    // TODO: Bring this back later
// $first_image_path = DB::Table('ImagePaths')->select('imageUUID','extension')->where('event_id',$event_id)->get();

  // Truncate long descriptions
  if (strlen($event_description) > 250) {
    $event_desc_shortened = substr($event_description, 0, 250) . '...';
  }
  else {
    $event_desc_shortened = $event_description;
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
//   Need to add this line in to the line break within the echo - this is to do with image display!
//   <div class="p-2 mr-5"><img alt="" src="'. $first_image_path . '" width="100" height="100"></div>
  echo('
    <li class="list-group-item d-flex justify-content-between">
    
    <div class="p-2 mr-5"><h5><a href="events-detail/' . $event_id. '">' . $event_title . '</a></h5>' . $event_desc_shortened . '</div>
  </li>'
  );

}
  // This page is for showing a user the auction listings they've made.
  // It will be pretty similar to browse.php, except there is no search bar.
  // This can be started after browse.php is working with a database.
  // Feel free to extract out useful functions from browse.php and put them in
  // the shared "utilities.php" where they can be shared by multiple files.
  
  //$search_results = get_seller_listings($_SESSION["userID"]);
  
  
  $counter = 0;
  foreach ($events as $row)
  //while (TRUE)//$search_row = $my_projects->fetch_assoc())
  {
    $endDateTime = new DateTime($row->event_datetime);
    print_event_with_image($row->event_id,$row->event_title, $row->event_description,$row->event_datetime, $row->event_timezone);
    $counter +=1;
  }
  echo "</ul>";
  echo "Events: " . $counter;
  
?>
</div>

@endsection