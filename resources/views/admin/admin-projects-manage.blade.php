@extends('layouts.mainlayout-admin')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')


<div class="container">
<br><br><br><br>
<h1 class="text-center mb-5 fw-bold">Manage Projects</h1>

                <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                          
                            <br>

                          <form method="get" action="projects-my">
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
            <option value="upcoming">Projects with future end date only</option>
            <option value="past">Completed projects only</option>
          </select>
        </div>
      </div>
      <div class="col-md-1 px-0">
        <button type="submit" class="btn btn-primary" style="margin-top: 22%;" name="search"  value = "Search">Search</button>
      </div>
    </div>
  </form>    
                    </div>


<ul class="list-group">

<?php

  
$userid = Auth::id();

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


  

  if (!isset($_GET['page'])) {
    $curr_page = 1;
  }
  else {
    $curr_page = $_GET['page'];
  }



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


if (!isset($_GET['cat'])) {
  $sdg = "";
}
else{
  $sdg = $_GET['cat'];
}


$query1 = DB::Table('projects')->select('id', 'project_id', 'projectTitle', 'projectOrganisation', 'projectDetails', 'projectEndDate', 'image_name',
'sdg1', 'sdg2', 'sdg3', 'sdg4', 'sdg5', 'sdg6', 'sdg7', 'sdg8', 'sdg9', 'sdg10', 'sdg11', 'sdg12', 'sdg13', 'sdg14', 'sdg15', 'sdg16', 'sdg17')

->whereRaw("(projectTitle like '%$keyword%' or projectOrganisation like '%$keyword%' or projectDetails like '%$keyword%' or image_name like '%$keyword%')")
->orderBy('projectEndDate', 'desc');

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
    
    $query->sortByDesc('projectEndDate');
}elseif ($order_by === "upcoming"){
  
  $query = $query->where('projectEndDate', '>=', $current_datetime);
  
}elseif($order_by === "past"){
  
  $query = $query->where('projectEndDate', '<', $current_datetime);
 
}



$first_image_path = DB::Table('ImagePaths')->select('imageUUID','extension')->where('project_id',1)->get();


function print_listing_with_image($project_id, $title, $desc)
{

$first_image_path = DB::Table('projects')->where('project_id',$project_id)->pluck('image_name');
$first_image_path_stripped = str_replace(array( '["', '"]' ), '', $first_image_path);
$array = array('"sdg1"','"sdg2"','"sdg3"','"sdg4"','"sdg5"','"sdg6"','"sdg7','"sdg8"','"sdg9"','"sdg10"','"sdg11"','"sdg12"','"sdg13"','"sdg14"','"sdg15"','"sdg16"','"sdg17"','null','0','"',':','{','[','}',']',',,',',,,',',,,,',',,,,,',',,,,,,',',,,,,,,',',,,,,,,,',',,,,,,,,,',',,,,,,,,,,',',,,,,,,,,,,',',,,,,,,,,,,,',',,,,,,,,,,,,,',',,,,,,,,,,,,,,',',,,,,,,,,,,,,,',',,,,,,,,,,,,,,,',',,,,,,,,,,,,,,,,',',,,,,,,,,,,,,,,,,');
$first_image_path_stripped_second = str_replace(array( ' '), '', $first_image_path_stripped);
$sdgs = DB::Table('projects')->select('sdg1','sdg2','sdg3','sdg4','sdg5','sdg6','sdg7','sdg8','sdg9','sdg10','sdg11','sdg12','sdg13','sdg14','sdg15','sdg16','sdg17')->where('project_id',$project_id)->get();
$sdgs_first_strip = str_replace($array,"",$sdgs);

$projectDate = DB::Table('projects')->select('projectEndDate')->where('project_id',$project_id)->get();
$array1 = array('[',']','{','}','"','"','projectEndDate');
$date = str_replace($array1,"",$projectDate);
$sdgs_second_strip = trim($sdgs_first_strip, ",");
$desc = str_replace(array( '["', '"]' ), '', $desc);
$project_Date=$projectDate->pluck('projectEndDate');
$project_Date = strip_text($project_Date);
$project_Date = substr($project_Date,0,-8);

  if (strlen($desc) > 250) {
    $desc_shortened = substr($desc, 0, 250) . '...';
  }
  else {
    $desc_shortened = $desc;
  }
  
  // Print HTML

  echo('
    <li class="list-group-item d-flex justify-content-between">
    <div class="p-2 mr-5"> <img alt="" src="http://51.142.117.217/assets/'. $first_image_path_stripped . '" width="250" height="250"> </div>
    <div class="col-5"><h5><a href="admin-projects-detail/' . $project_id. '">' . $title . '</a></h5>' . $desc_shortened . '</a></h5> <br><b> SDGs:</b> ' .  $sdgs_first_strip . '<br></div>
    <div class="row align-items-center">
    
    <input type="hidden" name="_token" value="' . Session::token() . '?>">
    
    <div class="col"><td> <a href="admin-projects-delete/'. $project_id.'" type="submit" id="submit" name="submit" class="btn btn-primary form-control" '. $project_id.'" > Delete </a> </td></div>
    <input type="hidden" name="_token" value="' . Session::token() . '?>">
    <div>
    
    </li>'
  );

}

  
  
  $counter = 0;
  foreach ($query as $row)
  
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