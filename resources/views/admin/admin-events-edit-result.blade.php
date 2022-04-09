@extends('layouts.mainlayout-admin')

@section('content')


<div class="container my-5">

<?php

//require_once(app_path().'../vendor/j7mbo/twitter-api-php/TwitterAPIExchange.php');

//require_once('resources/views/user/projects-create.blade.php');

@include('admin-events-edit');
    
    if (isset($_POST['submit']))
    {

    // Extracting the variables from the POST 
    
    $event_id = $_POST['event_id'];
    $event_title = $_POST['event_title'];
    $event_description = $_POST['event_description'];
    $event_datetime = $_POST['event_datetime'];
    $event_timezone = $_POST['event_timezone']; 
    $event_call_url = $_POST['event_call_url'];
    $event_video_url = $_POST['event_video_url'];
    $userid = Auth::id();

    // Putting them into an array

    $updateEventArray = array(
        'event_title' => $event_title,
        'event_description' => $event_description,
        'event_datetime' => $event_datetime,
        'event_timezone' => $event_timezone, 
        'event_call_url' => $event_call_url,
        'event_video_url' => $event_video_url,
        'id' => $userid,
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
    else {

       $event_update =  DB::table('events')->
                        where('event_id', $event_id)->
                        limit(1)->
                        update(array('event_title' => $event_title,
                                    'event_description' => $event_description,
                                    'event_timezone' => $event_timezone,
                                    'event_datetime' => $event_datetime,
                                    'event_call_url' => $event_call_url,
                                    'event_video_url' => $event_video_url
                    
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
                // create_new_image_reference($eventID, $imageUUID, $imageFileType);

                // Maybe bring this back later
                // DB::table('ImagePaths')->insert(array(
                //     'event_id'     =>   $event_id, 
                //     'imageUUID'   =>   $imageUUID,
                //     'extension'   =>   $imageFileType)); 
            }
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
                                            Event successfully updated!
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
        echo $event_id;
    }

    }

?>
 @endsection