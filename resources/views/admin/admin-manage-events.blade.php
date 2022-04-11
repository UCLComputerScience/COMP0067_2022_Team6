<!-- TODO: Move events into a single grid - currently they are separate sets which is not good -->

@extends('layouts.mainlayout-admin')

@section('content')

<div class="container">

<h2 class="my-3">Manage events</h2>

<div class="container">

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
      <div class="col-md-1 px-0">
        <button type="submit" class="btn btn-primary" name="search"  value = "Search">Search</button>
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

    if (!isset($_GET['cat'])) {
      $category = "all";
    }else {
      $category = $_GET['cat'];
    }

    if (!isset($_GET['order_by'])) {
      $ordering = "all";
    }else {
      $ordering = $_GET['order_by'];
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
  if($ordering === "all"){
      $query .= " ORDER BY ecent_datetime DESC ";
  }else if ($ordering === "upcoming"){
    $query .= " AND event_datetime >= GETDATE() ";
  }else if($ordering === "past"){
    $query .= " AND event_datetime < GETDATE() ";
  }



  }
  ?>

<ul class="list-group">

<?php

// $my_projects = DB::Table('projects')->select('project_id','projectTitle','projectDetails','projectEndDate')->where('id',$userid)->get();


$events = DB::Table('events')->select('event_id','event_title','event_description','event_datetime', 'event_timezone')->get();


function print_event_with_image($event_id, $event_title, $event_description)
{

    // TODO: Bring this back later
$first_image_path = DB::Table('events')->where('event_id',$event_id)->pluck('image_name');
$first_image_path_stripped = str_replace(array( '["', '"]' ), '', $first_image_path);
$first_image_path_stripped_second = str_replace(array( ' '), '', $first_image_path_stripped);
$array = array('"sdg1"','"sdg2"','"sdg3"','"sdg4"','"sdg5"','"sdg6"','"sdg7','"sdg8"','"sdg9"','"sdg10"','"sdg11"','"sdg12"','"sdg13"','"sdg14"','"sdg15"','"sdg16"','"sdg17"','null','0','"',':','{','[','}',']',',,',',,,',',,,,',',,,,,',',,,,,,',',,,,,,,',',,,,,,,,',',,,,,,,,,',',,,,,,,,,,',',,,,,,,,,,,',',,,,,,,,,,,,',',,,,,,,,,,,,,',',,,,,,,,,,,,,,',',,,,,,,,,,,,,,',',,,,,,,,,,,,,,,',',,,,,,,,,,,,,,,,',',,,,,,,,,,,,,,,,,');



$sdgs = DB::Table('events')->select('sdg1','sdg2','sdg3','sdg4','sdg5','sdg6','sdg7','sdg8','sdg9','sdg10','sdg11','sdg12','sdg13','sdg14','sdg15','sdg16','sdg17')->where('event_id',$event_id)->get();
$sdgs_first_strip = str_replace($array,"",$sdgs);
$eventDate = DB::Table('events')->select('event_datetime')->where('event_id',$event_id)->get();
$array1 = array('[',']','{','}','"','"','event_datetime');
$date = str_replace($array1,"",$eventDate);
$sdgs_second_strip = explode(',', $sdgs_first_strip);
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
  
  // Print HTML
//   Need to add this line in to the line break within the echo - this is to do with image display!
//   <div class="p-2 mr-5"><img alt="" src="'. $first_image_path . '" width="100" height="100"></div>
  echo('
    <li class="list-group-item d-flex justify-content-between">
    <div class="p-2 mr-5"><img alt="" src="http://127.0.0.1:8000/assets/'. $first_image_path_stripped_second . '" width="100" height="100"></div>

    <div class="col-4"><h5><a href="events-detail/' . $event_id. '">' . $event_title . '</a></h5>' . $event_desc_shortened . '<br><b> SDGs:</b> ' .  $sdgs_first_strip . '<br>Event Date '.$date.'<br>Time Zone '.$tz.'</div>
    
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