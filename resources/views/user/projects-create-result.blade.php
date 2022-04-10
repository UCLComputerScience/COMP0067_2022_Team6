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
    $projectOrganisation = $_POST['projectOrganisation'];
    $projectLocation = $_POST['projectLocation'];
    $projectCity = $_POST['projectCity'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $projectCountry = $_POST['projectCountry'];
    $projectDetails = $_POST['projectDetails'];
    $projectEndDate = $_POST['projectEndDate'];
    $sdg = $_POST['sdg']; 
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

    // Putting them into an array

    $newProjectArray = array(
        'projectTitle' => $projectTitle,
        'projectOrganisation' => $projectOrganisation,
        'projectLocation' => $projectLocation,
        'projectCity' => $projectCity,
        'address' => $address,
        'country' => $country,
        'latitude' => $latitude,
        'longitude' => $longitude,
        'projectCountry' => $projectCountry,
        'projectDetails' => $projectDetails,
        'projectEndDate' => $projectEndDate,
        'sdg' => $sdg, 
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
        'image_name' => $filename
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

       $project_id =  DB::table('projects')->insert($newProjectArray); 
       
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = public_path("assets/".$filename);
        // "public/assets/images/".$filename;
          
        // $insert_image = DB::table('projects')->insert('image_name',$filename);
  
        // Get all the submitted data from the form
  
               // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
  }


    
        // loop for each uploaded file begins

        // foreach ($_FILES['filesToUpload']['name'] as $key => $value) {

        //     // Creating the image path name
        //     $target_dir = resource_path('views/user/images/');
            
        //     // Getting the filetype for the extension
        //     $target_file = $target_dir . basename($_FILES["filesToUpload"]["name"][$key]);
        //     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
        //     // Creating a new name for the file based on a randomly generated unique ID
        //     $imageUUID = uniqid('',false);
        //     $targetFileDestination = $target_dir . $imageUUID . "." . $imageFileType;
    
        //     // Checking file size and type
        //     if ($_FILES["filesToUpload"]["size"][$key] > 5000000) {
        //         echo "Sorry, your file is too large.";
        //     }
        //     elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        //         echo "Sorry, only JPG, JPEG and PNG files are allowed.";
        //     }
        //     // if tests are successful, then the file is uploaded
        //     else {
        //         move_uploaded_file($_FILES["filesToUpload"]["tmp_name"][$key], $targetFileDestination);
        //         //create_new_image_reference($projectID, $imageUUID, $imageFileType);
        //         $imageUUID = hexdec($imageUUID);
        //         DB::table('ImagePaths')->insert(array(
        //             'project_id'     =>   $project_id, 
        //             'imageUUID'   =>   $imageUUID,
        //             'extension'   =>   $imageFileType)); }
        // }

        echo '<section class="bg-light-py-5">
        <br>
        <br>
        <div class="row gx-5 justify-content-center" style="margin: auto; height:50%;">
            <div class="col-lg-6 col-xl-4">
                            <div class="card mb-5 mb-xl-0">
                                <div class="card-body p-5">
                                    <div class="mb-3 d-flex justify-content-center align-items-center">
                                        <span class="display-4">Success</span>
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