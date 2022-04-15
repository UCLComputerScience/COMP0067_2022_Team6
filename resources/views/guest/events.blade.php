@extends('layouts.mainlayout')

@section('content')


<div class="container">
<br>

<div class="container">

  <div id="searchSpecs">
  <!-- When this form is submitted, this PHP page is what processes it.
      Search/sort specs are passed to this page through parameters in the URL
      (GET method of passing data to a page). -->

  <form method="get" action="events">
  <div class="row">
      <div class="col-md-4 pr-0">
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
      <div class="col-md-2 pr-0">
        <div class="form-inline">
          <label class="mx-2" for="no_of_records_per_page">Results per page:</label>
          <select class="form-control" id="no_of_records_per_page" name = "no_of_records_per_page">
            <option value="5">5</option>
            <option selected value="1">1</option>
            <option value="25">25</option>
            <option value="100">100</option>
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
// Some useful variables and functions for later if/else search conditions

$current_datetime = str(now());

function strip_text($var){
  $var = str_replace(array('"'), '', $var);
  $var = stripslashes($var);
  return $var;
}

function strip_get($var){
  $var = str_replace(array('->get();'), '', $var);
  return $var;
}

// Pagination - selecting how many results to show per page
if (!isset($_GET['no_of_records_per_page'])) {
  $no_of_records_per_page = 10;
}
else {
  $no_of_records_per_page = $_GET['no_of_records_per_page'];
}

// Retrieve page number from the URL

if (!isset($_GET['page'])) {
  $curr_page = 1;
}
else {
  $curr_page = $_GET['page'];
}

$offset = ($curr_page-1) * $no_of_records_per_page; 

$total_result_count = DB::Table('events')->select('*')->count();
$total_pages = ceil($total_result_count / $no_of_records_per_page);

echo $total_result_count."<br>";
echo $total_pages;

$pagination_query = DB::Table('events')->select('*')->limit($offset, $no_of_records_per_page);





// Processing search values inputted by user
if(isset($_GET['search'])){

  if (!isset($_GET['keyword'])) {
    //if a keyword is not specified then we simply set it to be blank so that in the
    //sql query, it does not filter out any auctions since all descriptions and titles of
    //auctions will have "" in them.
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

  // Truncate long descriptions
  if (strlen($event_description) > 250) {
    $event_desc_shortened = substr($event_description, 0, 250) . '...';
  }
  else {
    $event_desc_shortened = $event_description;
  }
  
  echo('
    <li class="list-group-item d-flex justify-content-between">
    <div class="p-2 mr-5"><img alt="" src="http://127.0.0.1:8000/assets/'. $first_image_path_stripped . '" width="100" height="100"></div>
    <div class="p-2 mr-5"><h5><a href="events-detail/' . $event_id. '">' . $event_title . '</a></h5>' . $event_desc_shortened . '</a></h5> <br><b> SDGs:</b> ' .  $sdgs_second_strip . '</div>
  </li>'
  );

}
  
  
  $counter = 0;
  foreach ($query as $row)
  //while (TRUE)//$search_row = $my_projects->fetch_assoc())
  {
    // $endDateTime = new DateTime($row->event_datetime);
    print_event_with_image($row->event_id,$row->event_title, $row->event_description,$row->event_datetime, $row->event_timezone);
    $counter +=1;
  }
  echo "</ul>";
  if ($counter > 0){
    echo "<br>Events: " . $counter;
    if ($counter = $no_of_records_per_page){
      echo "end";
        }
      }
  else{
    echo "<br>No events were found matching your search criteria";}


  
?>

<ul class="pagination">
    <li><button type="submit" class="btn btn-primary" style="margin-top: 22%;" name="first"  value = "first"><a href="?curr_page=1" style="color: fff;">First</a></button></li>
    <li class="<?php if($curr_page <= 1){ echo 'disabled'; } ?>">
        <a href="<?php if($curr_page <= 1){ echo '#'; } else { echo "?curr_page=".($curr_page - 1); } ?>">Prev</a>
    </li>
    <li class="<?php if($curr_page >= $total_pages){ echo 'disabled'; } ?>">
        <a href="<?php if($curr_page >= $total_pages){ echo '#'; } else { echo "?curr_page=".($curr_page + 1); } ?>">Next</a>
    </li>
    <li><a href="?curr_page=<?php echo $total_pages; ?>">Last</a></li>
</ul>

<nav aria-label="...">
  <ul class="pagination justify-content-center">
    <?php if (($curr_page - 1) > 0){
      echo ('    <li class="page-item disabled">
      <span class="page-link">Previous</span>
    </li>
      <li class="page-item"><a class="page-link" href="#">'.($curr_page - 1). '?></a></li>');
    }
    ?>
    <li class="page-item active">
      <span class="page-link">
        <?php echo $curr_page; ?>
        <span class="sr-only">(current)</span>
      </span>
    </li>
    <li class="page-item"><a class="page-link" href="#"><?php echo ($curr_page + 1); ?></a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>

</div>

@endsection