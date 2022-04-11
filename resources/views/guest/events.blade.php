<!-- TODO: Move events into a single grid - currently they are separate sets which is not good -->

@extends('layouts.mainlayout')

@section('content')


<div class="container">

<h2 class="my-3">Events</h2>

<div class="container">

<h3 class="my-3">Browse events</h3>
  <div id="searchSpecs">
  <!-- When this form is submitted, this PHP page is what processes it.
      Search/sort specs are passed to this page through parameters in the URL
      (GET method of passing data to a page). -->

  <form method="get" action="browse.php">
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
      <div class="col-md-3 pr-0">
        
      </div>
      <div class="col-md-3 pr-0">
        <div class="form-inline">
          <label class="mx-2" for="order_by">Sort by:</label>
          <select class="form-control" id="order_by" name = "order_by">
            <option selected value="all">All</option>
            <option value="upcoming">Upcoming events only</option>
            <option value="past">Past events only</option>
          </select>
        </div>
      </div>
      <div class="col-md-6 pr-0">
      <div class="form-group row">
        <label for="sdg" class="col-sm-2 col-form-label text-right" for="sdg1">SDGs:</label>
           <div class="col-md-10">
              <label class="form-check-label" for="sdg1">{{ __('1') }}</label>
              <input class="form-check-input" type="hidden" value="" id="sdg1" name="sdg1">
              <input class="form-check-input" type="checkbox" value="1" id="sdg1" name="sdg1">
              <label class="form-check-label" for="sdg2">{{ __('2') }}</label>
              <input class="form-check-input" type="hidden" value="" id="sdg2" name="sdg2">
              <input class="form-check-input" type="checkbox" value="2" id="sdg2" name="sdg2">
              <label class="form-check-label" for="sdg3">{{ __('3') }}</label>
              <input class="form-check-input" type="hidden" value="" id="sdg3" name="sdg3">
              <input class="form-check-input" type="checkbox" value="3" id="sdg3" name="sdg3">
              <label class="form-check-label" for="sdg4">{{ __('4') }}</label>
              <input class="form-check-input" type="hidden" value="" id="sdg4" name="sdg4">
              <input class="form-check-input" type="checkbox" value="4" id="sdg4" name="sdg4">
              <label class="form-check-label" for="sdg5">{{ __('5') }}</label>
              <input class="form-check-input" type="hidden" value="" id="sdg5" name="sdg5">
              <input class="form-check-input" type="checkbox" value="5" id="sdg5" name="sdg5">
              <label class="form-check-label" for="sdg6">{{ __('6') }}</label>
              <input class="form-check-input" type="hidden" value="" id="sdg6" name="sdg6">
              <input class="form-check-input" type="checkbox" value="6" id="sdg6" name="sdg6">
              <label class="form-check-label" for="sdg7">{{ __('7') }}</label>
              <input class="form-check-input" type="hidden" value="" id="sdg7" name="sdg7">
              <input class="form-check-input" type="checkbox" value="7" id="sdg7" name="sdg7">
              <label class="form-check-label" for="sdg8">{{ __('8') }}</label>
              <input class="form-check-input" type="hidden" value="" id="sdg8" name="sdg8">
              <input class="form-check-input" type="checkbox" value="8" id="sdg8" name="sdg8">
              <label class="form-check-label" for="sdg9">{{ __('9') }}</label>
              <input class="form-check-input" type="hidden" value="" id="sdg9" name="sdg9">
              <input class="form-check-input" type="checkbox" value="9" id="sdg9" name="sdg9">
              <label class="form-check-label" for="sdg10">{{ __('10') }}</label>
              <input class="form-check-input" type="hidden" value="" id="sdg10" name="sdg10">
              <input class="form-check-input" type="checkbox" value="10" id="sdg10" name="sdg10">
              <label class="form-check-label" for="sdg11">{{ __('11') }}</label>
              <input class="form-check-input" type="hidden" value="" id="sdg11" name="sdg11">
              <input class="form-check-input" type="checkbox" value="11" id="sdg11" name="sdg11">
              <label class="form-check-label" for="sdg12">{{ __('12') }}</label>
              <input class="form-check-input" type="hidden" value="" id="sdg12" name="sdg12">
              <input class="form-check-input" type="checkbox" value="12" id="sdg12" name="sdg12">
              <label class="form-check-label" for="sdg13">{{ __('13') }}</label>
              <input class="form-check-input" type="hidden" value="" id="sdg13" name="sdg13">
              <input class="form-check-input" type="checkbox" value="13" id="sdg13" name="sdg13">
              <label class="form-check-label" for="sdg14">{{ __('14') }}</label>
              <input class="form-check-input" type="hidden" value="" id="sdg14" name="sdg14">
              <input class="form-check-input" type="checkbox" value="14" id="sdg14" name="sdg14">
              <label class="form-check-label" for="sdg15">{{ __('15') }}</label>
              <input class="form-check-input" type="hidden" value="" id="sdg15" name="sdg15">
              <input class="form-check-input" type="checkbox" value="15" id="sdg15" name="sdg15">
              <label class="form-check-label" for="sdg16">{{ __('16') }}</label>
              <input class="form-check-input" type="hidden" value="" id="sdg16" name="sdg16">
              <input class="form-check-input" type="checkbox" value="16" id="sdg16" name="sdg16">
              <label class="form-check-label" for="sdg17">{{ __('17') }}</label>
              <input class="form-check-input" type="hidden" value="" id="sdg17" name="sdg17">
              <input class="form-check-input" type="checkbox" value="17" id="sdg17" name="sdg17">
          </div>
</div>
</div>
      <div class="col-md-1 px-0">
        <button type="submit" class="btn btn-primary text-right" name="search"  value = "Search">Search</button>
      </div>
    </div>
  </form>
  </div> 
</div>
<br \>

<!-- Search results -->
<?php
  // Retrieve these from the URL

  if (!isset($_GET['page'])) {
    $curr_page = 1;
  }
  else {
    $curr_page = $_GET['page'];
  }



  if(isset($_GET['search'])){

    if (!isset($_GET['keyword'])) {
      //if a keyword is not specified then we simply set it to be blank so that in the
      //sql query, it does not filter out any auctions since all descriptions and titles of
      //auctions will have "" in them.
      $keyword = "";
    }else {
      $keyword = $_GET['keyword'];
    }


    if (!isset($_GET['order_by'])) {
      $ordering = "all";
    }else {
      $ordering = $_GET['order_by'];
    }


    $query = "SELECT * FROM `events`
    WHERE (`event_description` LIKE '%$keyword%'
    OR `event_title` LIKE '%$keyword%'
    OR `event_call_url` LIKE '%$keyword%'
    OR `event_video_url`  LIKE '%$keyword%')
    ";


    if (isset($_GET['sdg1'])) {
      $ordering = $_GET['sdg1'];
      $query .= " AND 'sdg1' = 1";
}
  

  if ($ordering === "all"){
    $query .= " ORDER BY event_datetime DESC ";
}else if ($ordering === "upcoming"){
  $query .= " AND event_datetime >= GETDATE() 
  ORDER BY event_datetime DESC";
}else if($ordering === "past"){
  $query .= " AND event_datetime < GETDATE() 
  ORDER BY event_datetime DESC";
}

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

    //sql query to get the relevant information about the auction
   /* $query = "SELECT tblauction.auctionID AS 'item_id',
                         tblauction.itemName AS 'title',
                         tblauction.itemDescription AS 'description',
                         tblauction.endTime AS 'end_date',
                         tblauction.startPrice AS 'start_price',
                         tblbidding.bidPrice
                         FROM tblAuction
                         LEFT JOIN tblbidding
                         ON tblauction.auctionID = tblbidding.auctionID
                         WHERE ((tblAuction.itemDescription LIKE '%$keyword%')
                         OR (tblAuction.itemName LIKE '%$keyword%')) ";*/
    //if category is not set to be all then we want to filter our search further
    //i.e. we want to add an AND statement after the above WHERE clause
    /*if($category != "all"){
      //the following query retrieves the itemCategoryID based on the category that was selected
      $sql = "SELECT itemCategoryID FROM tblitemcategory WHERE itemCategory = '$category'";
      $sql_result = mysqli_query($connection, $sql);
      $sql_array = mysqli_fetch_assoc($sql_result);
      $itemcategoryID = $sql_array['itemCategoryID'];
      //filtering the search further
      $query .= " AND tblauction.itemCategoryID = '$itemcategoryID'
                  GROUP BY tblauction.auctionID ";
    }else{
      $query .= " GROUP BY tblauction.auctionID ";
    }
*/

    //sql query for ordering the results based on datetime




  
  ?>

<ul class="list-group">

<?php

// $my_projects = DB::Table('projects')->select('project_id','projectTitle','projectDetails','projectEndDate')->where('id',$userid)->get();


$events = DB::Table('events')->select('event_id','event_title','event_description','event_datetime', 'event_timezone')->get();



function print_event_with_image($event_id, $event_title, $event_description)
{

$first_image_path = DB::Table('events')->where('event_id',$event_id)->pluck('image_name');
$first_image_path_stripped = str_replace(array( '["', '"]' ), '', $first_image_path);
$first_image_path_stripped_second = str_replace(array( ' '), '', $first_image_path_stripped);
$array = array('"sdg1"','"sdg2"','"sdg3"','"sdg4"','"sdg5"','"sdg6"','"sdg7','"sdg8"','"sdg9"','"sdg10"','"sdg11"','"sdg12"','"sdg13"','"sdg14"','"sdg15"','"sdg16"','"sdg17"','null','0','"',':','{','[','}',']',',,',',,,',',,,,',',,,,,',',,,,,,',',,,,,,,',',,,,,,,,',',,,,,,,,,',',,,,,,,,,,',',,,,,,,,,,,',',,,,,,,,,,,,',',,,,,,,,,,,,,',',,,,,,,,,,,,,,',',,,,,,,,,,,,,,',',,,,,,,,,,,,,,,',',,,,,,,,,,,,,,,,',',,,,,,,,,,,,,,,,,');
  // $first_image_path_stripped_second = str_replace(array( ' '), '', $first_image_path_stripped);
$sdgs = DB::Table('events')->select('sdg1','sdg2','sdg3','sdg4','sdg5','sdg6','sdg7','sdg8','sdg9','sdg10','sdg11','sdg12','sdg13','sdg14','sdg15','sdg16','sdg17')->where('event_id',$event_id)->get();
$sdgs_first_strip = str_replace($array,"",$sdgs);
    // TODO: Bring this back later
// $first_image_path = DB::Table('ImagePaths')->select('imageUUID','extension')->where('event_id',$event_id)->get();

  // Truncate long descriptions
  if (strlen($event_description) > 250) {
    $event_desc_shortened = substr($event_description, 0, 250) . '...';
  }
  else {
    $event_desc_shortened = $event_description;
  }
  
  // Print HTML
//   Need to add this line in to the line break within the echo - this is to do with image display!
//   <div class="p-2 mr-5"><img alt="" src="'. $first_image_path . '" width="100" height="100"></div>
  echo('
    <li class="list-group-item d-flex justify-content-between">
    <div class="p-2 mr-5"><img alt="" src="http://127.0.0.1:8000/assets/'. $first_image_path_stripped_second . '" width="100" height="100"></div>
    <div class="p-2 mr-5"><h5><a href="events-detail/' . $event_id. '">' . $event_title . '</a></h5>' . $event_desc_shortened . '</a></h5> <br><b> SDGs:</b> ' .  $sdgs_first_strip . '</div>
  </li>'
  );

}
  
  
  $counter = 0;
  foreach ($events as $row)
  //while (TRUE)//$search_row = $my_projects->fetch_assoc())
  {
    $endDateTime = new DateTime($row->event_datetime);
    print_event_with_image($row->event_id,$row->event_title, $row->event_description,$row->event_datetime, $row->event_timezone);
    $counter +=1;
  }
  echo "</ul>";
  if ($counter > 0){
    echo "Events: " . $counter;}
  else{
    echo "No events were found matching your search criteria";}
  
?>
</div>

@endsection