@extends('layouts.mainlayout-logged-in')

@section('content')


<div class="container my-5">

<?php

$project_id = $_POST['project_id'];
@include('projects-edit/{$project_id}');

    if (isset($_POST['submit']))
    {

    
    
    $projectTitle = $_POST['projectTitle'];
    $projectOrganisation = $_POST['projectOrganisation'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $projectDetails = $_POST['projectDetails'];
    $projectEndDate = $_POST['projectEndDate'];
    $projectValue = $_POST['projectValue'];
    $fundingRequired = $_POST['fundingRequired'];
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
    $userid = Auth::id();
    $project_id = $_POST['project_id'];
    $filename = $_FILES["uploadfile"]["name"];
    $uuid = uniqid();
    $uuidfilename = $uuid.$filename;
    

 
  
    
    if (empty($projectTitle)){
        echo 'Please enter an project title.';
    } 
    elseif (empty($projectOrganisation)){
        echo 'Please enter the organisation of this project.';
    } 
    elseif (empty($address)){
        echo 'Please enter the primary address of this project.';
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

        $project_update = DB::table('projects')->
                            where('project_id', $project_id)->
                            limit(1)->
                            update(array('projectTitle' => $projectTitle,
                            'projectOrganisation' => $projectOrganisation,
                            'projectDetails' => $projectDetails,
                            'projectEndDate' => $projectEndDate,
                            'projectValue' => $projectValue,
                            'fundingRequired' => $fundingRequired,
                            'address' => $address,
                            'country' => $country,
                            'latitude' => $latitude,
                            'longitude' => $longitude,
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
                            'image_name' => $uuidfilename
                        ));


       

       $tempname = $_FILES["uploadfile"]["tmp_name"];    
       $folder = public_path("assets/".$uuidfilename);
       
       if (move_uploaded_file($tempname, $folder))  {
           $msg = "Image uploaded successfully";
       }else{
           $msg = "Failed to upload image";
     }

        }

        echo '<br>
        <br>
        <section class="bg-light-py-5">
        <div class="row gx-5 justify-content-center" style="margin: auto; height:50%;">
            <div class="col-lg-6 col-xl-4">
                            <div class="card mb-5 mb-xl-0">
                                <div class="card-body p-5">
                                    <div class="mb-3 d-flex justify-content-center align-items-center">
                                        <span class="display-4">Success</span>
                                    </div>
                                    <div class="small text-camelcase d-flex justify-content-center align-items-center">
                                        Project successfully updated!
                                    </div>
                                    <br \>
                                    <div class="d-grid"><a class="btn btn-primary" href="projects-my">Manage projects</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <br \>
                <br \>
            </section>';
    

    }

?>
 @endsection