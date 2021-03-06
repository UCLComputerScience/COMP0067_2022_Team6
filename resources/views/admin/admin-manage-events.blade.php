

@extends('layouts.mainlayout-admin')

@section('content')

<div class="container">
<br>
<h1 class="text-center mb-5 fw-bold">Manage events</h1>

<div class="container">
  <p class="lead fw-normal text-muted mb-0 text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>

<div class="float-right">
<a class="btn btn-primary btn-lg px-4 float-right" href="/admin-create-events" target="_blank">Create Event</a>
</div>
<br>
  <div id="searchSpecs">


  <form method="get" action="/admin-manage-events">
  <div class="row">
      <div class="col-md-5 pr-0">
        <div class="form-group">
          <label for="keyword" class="sr-only">Search keyword:</label>
        <div class="input-group">
            <div class="input-group-prepend">
            </div>
            <input type="text" class="form-control border-left-0" id="keyword" placeholder="Search for anything" name = "keyword">
          </div>
        </div>
      </div>
      <div class="col-md-4 pr-0">
        <div class="form-group">
          <label for="cat" class="sr-only">Select SDG:</label>
          <select class="form-control" id="cat" name="cat">
            <option value="">Choose an option</option>
                <?php 
                  $result = DB::table('categories')->get();    ?>
                    @foreach ($result as $row)
                        <option value="{{$row->categoryID}}">{{$row->categoryName}}</option>
                    @endforeach 
                      </select>
                  @error('SDGs')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </select>
        </div>
      </div>
      <div class="col-md-2 pr-0">
        <div class="form-inline">
          <label class="mx-2" for="order_by">Sort by:</label>
          <select class="form-control" id="order_by" name = "order_by">
            <option selected value="all">All</option>
            <option value="upcoming">Upcoming events only</option>
            <option value="past">Past events only</option>
          </select>
        </div>
      </div>
      <div class="col-md-1 px-0">
        <button type="submit" class="btn btn-primary" style="margin-top: 22%;" name="search"  value = "Search">Search</button>
      </div>
    </div>
  </form>
  </div> 
</div>
<br \>

<!-- Search results -->
<ul class="list-group">

<?php


$current_datetime = str(now());

function strip_text($var){
  $var = str_replace(array('"', '[', ']'), '', $var);
  $var = stripslashes($var);
  return $var;
}

function strip_get($var){
  $var = str_replace(array('->get();'), '', $var);
  return $var;
}


  // Retrieve these from the URL

  if (!isset($_GET['page'])) {
    $curr_page = 1;
  }
  else {
    $curr_page = $_GET['page'];
  }


// Processing search values inputted by user
if(isset($_GET['search'])){

  if (!isset($_GET['keyword'])) {
   
    $keyword = "";
  }else {
    $keyword = $_GET['keyword'];
  }
}
else{
  $keyword = "";
}

// Checking which SDG has been chosen
if (!isset($_GET['cat'])) {
  $sdg = "";
}
else{
  $sdg = $_GET['cat'];
}

// Start of search query and conditions
$query1 = DB::Table('events')->select('event_id', 'event_title', 'event_description', 'event_datetime', 'event_timezone', 'event_call_url', 'event_video_url',
'sdg1', 'sdg2', 'sdg3', 'sdg4', 'sdg5', 'sdg6', 'sdg7', 'sdg8', 'sdg9', 'sdg10', 'sdg11', 'sdg12', 'sdg13', 'sdg14', 'sdg15', 'sdg16', 'sdg17')
->whereRaw("(event_title like '%$keyword%' or event_description like '%$keyword%')")
->orderBy('event_datetime', 'desc');

$query = $query1->get();


if ($sdg == "1"){
$query = $query1->where('sdg1',"1")->get();
}

elseif ($sdg == "2"){
  $query = $query1->where('sdg2',"2")->get();
}

elseif ($sdg == "3"){
  $query = $query1->where('sdg3',"3")->get();
}

elseif ($sdg == "4"){
  $query = $query1->where('sdg4',"4")->get();
}

elseif ($sdg == "5"){
  $query = $query1->where('sdg5',"5")->get();
}

elseif ($sdg == "6"){
  $query = $query1->where('sdg6',"6")->get();
}

elseif ($sdg == "7"){
  $query = $query1->where('sdg7',"7")->get();
}

elseif ($sdg == "8"){
  $query = $query1->where('sdg8',"8")->get();
}

elseif ($sdg == "9"){
  $query = $query1->where('sdg9',"9")->get();
}

elseif ($sdg == "10"){
  $query = $query1->where('sdg10',"10")->get();
}

elseif ($sdg == "11"){
  $query = $query1->where('sdg11',"11")->get();
}

elseif ($sdg == "12"){
  $query = $query1->where('sdg12',"12")->get();
}

elseif ($sdg == "13"){
  $query = $query1->where('sdg13',"13")->get();
}

elseif ($sdg == "14"){
  $query = $query1->where('sdg14',"14")->get();
}

elseif ($sdg == "15"){
  $query = $query1->where('sdg15',"15")->get();
}

elseif ($sdg == "16"){
  $query = $query1->where('sdg16',"16")->get();
}

elseif ($sdg == "17"){
  $query = $query1->where('sdg17',"17")->get();
}


if (!isset($_GET['order_by'])) {
  $order_by = "all";
}else {
  $order_by = $_GET['order_by'];
}

  if ($order_by === "all"){

    $query->sortByDesc('event_datetime');
  ;
}elseif ($order_by === "upcoming"){
  
  $query = $query->where('event_datetime', '>=', $current_datetime);
  
}elseif($order_by === "past"){
  
  $query = $query->where('event_datetime', '<', $current_datetime);
  
}


function print_event_with_image($event_id, $event_title, $event_description)
{


$first_image_path = DB::Table('events')->where('event_id',$event_id)->pluck('image_name');
$first_image_path_stripped = str_replace(array( '["', '"]' ), '', $first_image_path);
$first_image_path_stripped_second = str_replace(array( ' '), '', $first_image_path_stripped);
$array = array('"sdg1"','"sdg2"','"sdg3"','"sdg4"','"sdg5"','"sdg6"','"sdg7','"sdg8"','"sdg9"','"sdg10"','"sdg11"','"sdg12"','"sdg13"','"sdg14"','"sdg15"','"sdg16"','"sdg17"','null','0','"',':','{','[','}',']',',,',',,,',',,,,',',,,,,',',,,,,,',',,,,,,,',',,,,,,,,',',,,,,,,,,',',,,,,,,,,,',',,,,,,,,,,,',',,,,,,,,,,,,',',,,,,,,,,,,,,',',,,,,,,,,,,,,,',',,,,,,,,,,,,,,',',,,,,,,,,,,,,,,',',,,,,,,,,,,,,,,,',',,,,,,,,,,,,,,,,,');



$sdgs = DB::Table('events')->select('sdg1','sdg2','sdg3','sdg4','sdg5','sdg6','sdg7','sdg8','sdg9','sdg10','sdg11','sdg12','sdg13','sdg14','sdg15','sdg16','sdg17')->where('event_id',$event_id)->get();
$sdgs_first_strip = str_replace($array,"",$sdgs);
$sdgs_second_strip = trim($sdgs_first_strip, ",");
$eventDate = DB::Table('events')->select('event_datetime')->where('event_id',$event_id)->get();
$array1 = array('[',']','{','}','"','"','event_datetime');
$date = str_replace($array1,"",$eventDate);
$sdgs_second_strip1 = explode(',', $sdgs_first_strip);
$timezone = DB::Table('events')->select('event_timezone')->where('event_id',$event_id)->get();
$array2 = array('[',']','{','}','"','"','event_timezone');
$tz = str_replace($array2,"",$timezone);

// Truncate long descriptions
  if (strlen($event_description) > 250) {
    $event_desc_shortened = substr($event_description, 0, 250) . '...';
  }
  else {
    $event_desc_shortened = $event_description;
  }
  
  
  echo('
    <li class="list-group-item d-flex justify-content-between">
      <div class="p-2 mr-5"><img alt="" src="http://51.142.117.217/assets/'. $first_image_path_stripped . '" width="250" height="250"></div>
    <div class="col-4"><h5><a href="admin-events-detail/' . $event_id. '">' . $event_title . '</a></h5>' . $event_desc_shortened . '<br><b> SDGs:</b> ' .  $sdgs_second_strip . '<br>Event Date '.$date.'<br>Time Zone '.$tz.'</div>
    
    <div class="row align-items-center">
    <div class="col"><a class="btn btn-primary" href="admin-events-edit/'. $event_id.'" role="button"> Edit </a></div>
    
    <div class="col"><td> <a href="admin-events-delete/'. $event_id.'" type="submit" id="submit" name="submit" class="btn btn-primary form-control" '.$event_id.'" > Delete </a> </td></div>

    <input type="hidden" name="_token" value="' . Session::token() . '?>">
    <div>
    </form>
  </li>'
  );

}
  
  
  $counter = 0;
  foreach ($query as $row)
  
  {
    $endDateTime = new DateTime($row->event_datetime);
    print_event_with_image($row->event_id,$row->event_title, $row->event_description,$row->event_datetime, $row->event_timezone);
    $counter +=1;
  }
  echo "</ul>";
  if ($counter > 0){
    echo "<br>Events: " . $counter;}
  else{
    echo "No events were found matching your search criteria";}
  
?>
</div>

@endsection