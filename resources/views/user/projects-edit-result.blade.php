@extends('layouts.mainlayout-logged-in')

@section('content')


<div class="container my-5">

<?php

//require_once(app_path().'../vendor/j7mbo/twitter-api-php/TwitterAPIExchange.php');

//require_once('resources/views/user/projects-create.blade.php');
$project_id = $_POST['project_id'];
@include('projects-edit/{$project_id}');

    if (isset($_POST['submit']))
    {

    // Extracting the variables from the POST 
    
    $projectTitle = $_POST['projectTitle'];
    $projectOrganisation = $_POST['projectOrganisation'];
    $projectLocation = $_POST['projectLocation'];
    $projectCity = $_POST['projectCity'];
    $projectCountry = $_POST['projectCountry'];
    $projectDetails = $_POST['projectDetails'];
    $projectEndDate = $_POST['projectEndDate'];
    $sdg = $_POST['sdg']; 
    $projectValue = $_POST['projectValue'];
    $fundingRequired = $_POST['fundingRequired'];
    $userid = Auth::id();
    $project_id = $_POST['project_id'];

    // Putting them into an array

    $newProjectArray = array(
        'projectTitle' => $projectTitle,
        'projectOrganisation' => $projectOrganisation,
        'projectLocation' => $projectLocation,
        'projectCity' => $projectCity,
        'projectCountry' => $projectCountry,
        'projectDetails' => $projectDetails,
        'projectEndDate' => $projectEndDate,
        'sdg' => $sdg, 
        'projectValue' => $projectValue,
        'fundingRequired' => $fundingRequired,
        'id' => $userid,
    );
 
    // The flow below checks for general errors in the form, then does 
    // a loop for each image. 
    
    if (empty($projectTitle)){
        echo 'Please enter an project title.';
    } 
    elseif (empty($projectOrganisation)){
        echo 'Please enter the organisation of this project.';
    } 
    elseif (empty($projectLocation)){
        echo 'Please enter the address of this project.';
    } 
    elseif (empty($projectCity)){
        echo 'Please enter the city of this project.';
    } 
    elseif (empty($projectCountry)){
        echo 'Please enter the country of this project.';
    } 
    elseif (empty($projectDetails)){
        echo 'Please enter a project description.';
    } 
    elseif (empty($sdg)){
        echo 'Please enter an SDG.';
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
                            'projectLocation' => $projectLocation,
                            'projectCity' => $projectCity,
                            'projectCountry' => $projectCountry,
                            'projectDetails' => $projectDetails,
                            'projectEndDate' => $projectEndDate,
                            'projectValue' => $projectValue,
                            'fundingRequired' => $fundingRequired
                            
                        ));


        // loop for each uploaded file begins

        foreach ($_FILES['filesToUpload']['name'] as $key => $value) {

            // Creating the image path name
            $target_dir = resource_path('views/user/images/');
            
            // Getting the filetype for the extension
            $target_file = $target_dir . basename($_FILES["filesToUpload"]["name"][$key]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            // Creating a new name for the file based on a randomly generated unique ID
            $imageUUID = uniqid('',false);
            $targetFileDestination = $target_dir . $imageUUID . "." . $imageFileType;
    
            // Checking file size and type
            if ($_FILES["filesToUpload"]["size"][$key] > 5000000) {
                echo "Sorry, your file is too large.";
            }
            elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                echo "Sorry, only JPG, JPEG and PNG files are allowed.";
            }
            // if tests are successful, then the file is uploaded
            else {
                move_uploaded_file($_FILES["filesToUpload"]["tmp_name"][$key], $targetFileDestination);
                // create_new_image_reference($projectID, $imageUUID, $imageFileType);
                $imageUUID = hexdec($imageUUID);
                DB::table('ImagePaths')->insert(array(
                    'project_id'     =>   $project_id, 
                    'imageUUID'   =>   $imageUUID,
                    'extension'   =>   $imageFileType)); }
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

    }

?>
 @endsection