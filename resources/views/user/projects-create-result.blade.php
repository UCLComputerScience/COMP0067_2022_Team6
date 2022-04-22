@extends('layouts.mainlayout-logged-in')

@section('content')

<div class="container my-5">

<?php

@include('projects-create');
    
    if (isset($_POST['submit']))
    {
    $projectTitle = $_POST['projectTitle'];
    $projectOrganisation = $_POST['projectOrganisation'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $projectDetails = $_POST['projectDetails'];
    $projectEndDate = $_POST['projectEndDate'];
    $sdg1 = $_POST['sdg1'];
    $sdg2 = $_POST['sdg2']; 
    $sdg3 = $_POST['sdg3']; 
    $sdg4 = $_POST['sdg4']; 
    $sdg5 = $_POST['sdg5']; 
    $sdg6 = $_POST['sdg6']; 
    $sdg7 = $_POST['sdg7']; 
    $sdg8 = $_POST['sdg8']; 
    $sdg9 = $_POST['sdg9']; 
    $sdg10 = $_POST['sdg10']; 
    $sdg11 = $_POST['sdg11']; 
    $sdg12 = $_POST['sdg12'];  
    $sdg13 = $_POST['sdg13']; 
    $sdg14 = $_POST['sdg14']; 
    $sdg15 = $_POST['sdg15']; 
    $sdg16 = $_POST['sdg16']; 
    $sdg17 = $_POST['sdg17']; 
    $projectValue = $_POST['projectValue'];
    $fundingRequired = $_POST['fundingRequired'];
    $userid = Auth::id();
    $filename = $_FILES["uploadfile"]["name"];
    $uuid = uniqid();
    $uuidfilename = $uuid.$filename;
    
    // Putting them into an array

    $newProjectArray = array(
        'projectTitle' => $projectTitle,
        'projectOrganisation' => $projectOrganisation,
        'address' => $address,
        'country' => $country,
        'latitude' => $latitude,
        'longitude' => $longitude,
        'projectDetails' => $projectDetails,
        'projectEndDate' => $projectEndDate,
        'sdg1' => $sdg1,
        'sdg2' => $sdg2, 
        'sdg3' => $sdg3, 
        'sdg4' => $sdg4, 
        'sdg5' => $sdg5, 
        'sdg6' => $sdg6, 
        'sdg7' => $sdg7, 
        'sdg8' => $sdg8, 
        'sdg9' => $sdg9, 
        'sdg10' => $sdg10, 
        'sdg11' => $sdg11, 
        'sdg12' => $sdg12, 
        'sdg13' => $sdg13, 
        'sdg14' => $sdg14, 
        'sdg15' => $sdg15, 
        'sdg16' => $sdg16, 
        'sdg17' => $sdg17, 
        'projectValue' => $projectValue,
        'fundingRequired' => $fundingRequired,
        'id' => $userid,
        'image_name' => $uuidfilename
    );
 
    // The flow below checks for errors.
    
    if (empty($projectTitle)){
        echo 'Please enter a project title.';
    } 
    elseif (empty($projectOrganisation)){
        echo 'Please enter the organisation of this project.';
    } 
    elseif (empty($projectDetails)){
        echo 'Please enter a project description.';
    } 
    elseif (empty($projectValue) and $projectValue != 0){
        echo 'Please enter a project value.';
    }
    elseif (empty($fundingRequired) and $fundingRequired != 0){
        echo 'Please enter the level of funding required.';
    }
    elseif (empty($projectEndDate)){
        echo 'Please enter a project end date.';
    }
    else {

       $project_id =  DB::table('projects')->insert($newProjectArray); 
       $tempname = $_FILES["uploadfile"]["tmp_name"];    
       $folder = public_path("assets/".$uuidfilename);
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
  }


    
        

        echo '<section class="bg-light-py-5">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="row gx-5 justify-content-center" style="margin: auto; height:50%;">
            <div class="col-lg-6 col-xl-4">
                            <div class="card mb-5 mb-xl-0">
                                <div class="card-body p-5">
                                    <div class="mb-3 d-flex justify-content-center align-items-center">
                                        <span class="display-5 fw-bold">Success</span>
                                    </div>
                                    <div class="small text-camelcase d-flex justify-content-center align-items-center">
                                        Project successfully created!
                                    </div>
                                    <br \>
                                    <div class="d-grid"><a class="btn btn-primary" href="projects-my">View your new project</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <br \>
                <br \>
            </section>';
    

    }

?>
</div>
 @endsection