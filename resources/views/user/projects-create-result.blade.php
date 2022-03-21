@extends('layouts.mainlayout-logged-in')

@section('content')


<div class="container my-5">

<?php

//require_once(app_path().'../vendor/j7mbo/twitter-api-php/TwitterAPIExchange.php');

//require_once('resources/views/user/projects-create.blade.php');

@include('projects-create');
    
    if (isset($_POST['submit']))
    {

    // Extracting the variables from the POST 
    
    $projectTitle = $_POST['projectTitle'];
    $projectDetails = $_POST['projectDetails'];
    $projectEndDate = $_POST['projectEndDate'];
    $sdg = $_POST['sdg']; 
    $projectValue = $_POST['projectValue'];
    $fundingRequired = $_POST['fundingRequired'];
    $userid = Auth::id();

    // Putting them into an array

    $newProjectArray = array(
        'projectTitle' => $projectTitle,
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

       $project_id =  DB::table('projects')->insert($newProjectArray);        
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
                //create_new_image_reference($projectID, $imageUUID, $imageFileType);
                DB::table('ImagePaths')->insert(array(
                    'project_id'     =>   $project_id, 
                    'imageUUID'   =>   $imageUUID,
                    'extension'   =>   $imageFileType)); }
        }

        echo '<div class="text-center">Project successfully created! <a href="projects-my">View your new project.</a></div>';
    }

    }

?>
 @endsection