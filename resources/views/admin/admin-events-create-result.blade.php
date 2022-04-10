@extends('layouts.mainlayout-admin')

@section('content')


<div class="container my-5">

<?php

//require_once(app_path().'../vendor/j7mbo/twitter-api-php/TwitterAPIExchange.php');

//require_once('resources/views/user/projects-create.blade.php');

@include('admin-create-events');
    
    if (isset($_POST['submit']))
    {

    // Extracting the variables from the POST 
    
    $event_title = $_POST['event_title'];
    $event_description = $_POST['event_description'];
    $event_datetime = $_POST['event_datetime'];
    $event_timezone = $_POST['event_timezone']; 
    $event_call_url = $_POST['event_call_url'];
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

    // Putting them into an array

    $newEventArray = array(
        'event_title' => $event_title,
        'event_description' => $event_description,
        'event_datetime' => $event_datetime,
        'event_timezone' => $event_timezone, 
        'event_call_url' => $event_call_url,
        'id' => $userid,
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
    );
 
    // The flow below checks for general errors in the form, then does 
    // a loop for each image. 
    
    if (empty($event_title)){
        echo 'Please enter an event title.';
    } 
    elseif (empty($event_description)){
        echo 'Please enter an event description.';
    } 
    elseif (empty($event_datetime)){
        echo 'Please select a date and time for your event.';
    }
    elseif (empty($event_timezone) and $event_datetime != 0){
        echo 'Please enter a timezone for your event.';
    }
    elseif (empty($event_call_url)){
        echo 'Please enter an event URL for people to join the event with.';
    }
    else {

       $event_id =  DB::table('events')->insert($newEventArray);        
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
                //create_new_image_reference($eventID, $imageUUID, $imageFileType);
                DB::table('ImagePaths')->insert(array(
                    'event_id'     =>   $event_id, 
                    'imageUUID'   =>   $imageUUID,
                    'extension'   =>   $imageFileType)); }
        }

        echo '<section class="bg-light-py-5">
            <div class="row gx-5 justify-content-center" style="margin: auto; height:50%;">
                <div class="col-lg-6 col-xl-4">
                                <div class="card mb-5 mb-xl-0">
                                    <div class="card-body p-5">
                                        <div class="mb-3 d-flex justify-content-center align-items-center">
                                            <span class="display-4">Success</span>
                                        </div>
                                        <div class="small text-camelcase d-flex justify-content-center align-items-center">
                                            Event successfully created!
                                        </div>
                                        <br \>
                                        <div class="d-grid"><a class="btn btn-primary" href="admin-manage-events">Manage events</a></div>
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