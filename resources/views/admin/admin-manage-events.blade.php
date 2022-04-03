@extends('layouts.mainlayout-admin')
@section('content')

<div class="container">

<h2 class="my-3">Admin view - events</h2>


<ul class="list-group">

<?php
  // This page is for showing a user the auction listings they've made.
  // It will be pretty similar to browse.php, except there is no search bar.
  // This can be started after browse.php is working with a database.
  // Feel free to extract out useful functions from browse.php and put them in
  // the shared "utilities.php" where they can be shared by multiple files.
  
$userid = Auth::id();


$list_of_events = DB::Table('events')->select('event_id','event_title','event_description','event_datetime', 'event_timezone', 'event_call_url')->where('id',$userid)->get();
//echo ($my_projects);

$first_image_path = DB::Table('ImagePaths')->select('imageUUID','extension')->where('event_id',1)->get();
echo str_replace(array ('[{"','"}]'),'' ,$first_image_path);

function print_listing_with_image($event_id, $event_title, $event_description)
{

$first_image_path = DB::Table('ImagePaths')->select('imageUUID','extension')->where('event_id',$event_id)->get();

  // Truncate long descriptions
  if (strlen($event_description) > 250) {
    $desc_shortened = substr($event_description, 0, 250) . '...';
  }
  else {
    $desc_shortened = $event_description;
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
    <div class="p-2 mr-5"><img alt="" src="'. $first_image_path . '" width="100" height="100"></div>
    <div class="p-2 mr-5"><h5><a href="events-detail/' . $event_id. '">' . $event_title . '</a></h5>' . $desc_shortened . '</div>
    <td>  <a class="btn btn-primary" href="admin-events-edit/'. $event_id.'" > Edit </a> </td>
    <form method="post" enctype="multipart/form-data" action="projects-delete/'. $event_id.'">
    <input type="hidden" name="_token" value="' . Session::token() . '?>">
    <div class="form-group row">
    <td> <button type="submit" id="submit" name="submit" class="btn btn-primary form-control" '. $event_id.'" > Delete </button> </td>
    <div>
    </form>
    </li>'
  );

}

  
  
//   $counter = 0;
//   foreach ($list_of_events as $row)
//   //while (TRUE)//$search_row = $my_projects->fetch_assoc())
//   {
//     $endDateTime = new DateTime($row->projectEndDate);
//     print_listing_with_image($row->project_id,$row->projectTitle, $row->projectDetails,$row->projectEndDate);
//     $counter +=1;
//   }
//   echo "</ul>";
//   echo "Events: " . $counter;
  
?>

@endsection