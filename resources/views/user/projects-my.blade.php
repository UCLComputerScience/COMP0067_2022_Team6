@extends('layouts.mainlayout-logged-in')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')


<div class="container">
<br><br><br><br>
<h2 class="my-3">My Projects</h2>


<ul class="list-group">

<?php
  // This page is for showing a user the auction listings they've made.
  // It will be pretty similar to browse.php, except there is no search bar.
  // This can be started after browse.php is working with a database.
  // Feel free to extract out useful functions from browse.php and put them in
  // the shared "utilities.php" where they can be shared by multiple files.
  
$userid = Auth::id();


$my_projects = DB::Table('projects')->select('project_id','projectTitle','projectDetails','projectEndDate')->where('id',$userid)->get();
//echo ($my_projects);

$first_image_path = DB::Table('ImagePaths')->select('imageUUID','extension')->where('project_id',1)->get();
//echo str_replace(array ('[{"','"}]'),'' ,$first_image_path);

function print_listing_with_image($project_id, $title, $desc)
{

$first_image_path = DB::Table('projects')->where('project_id',$project_id)->pluck('image_name');
$first_image_path_stripped = str_replace(array( '["', '"]' ), '', $first_image_path);
$first_image_path_stripped_second = str_replace(array( ' '), '', $first_image_path_stripped);
echo $first_image_path_stripped_second;
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
    <div class="p-2 mr-5"><h5><a href="projects-detail/' . $project_id. '">' . $title . '</a></h5>' . $desc_shortened . '</div>
    <td>  <a class="btn btn-primary btn-lg" href="projects-edit/'. $project_id.'" > Edit </a> </td>
    
    <input type="hidden" name="_token" value="' . Session::token() . '?>">
    <div class="form-group row">
    <td> <a href="projects-delete/'. $project_id.'" type="submit" id="submit" name="submit" class="btn btn-primary form-control" '. $project_id.'" > Delete </a> </td>
    <input type="hidden" name="_token" value="' . Session::token() . '?>">
    <div>
    
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
</div>
@endsection