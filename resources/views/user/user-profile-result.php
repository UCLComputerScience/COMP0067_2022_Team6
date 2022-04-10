@extends('layouts.app')
@section('styles')
@extends('layouts.partials.nav-logged-in')

@section('content')


<div class="container my-5">

<?php

//require_once(app_path().'../vendor/j7mbo/twitter-api-php/TwitterAPIExchange.php');

//require_once('resources/views/user/projects-create.blade.php');
@include('user-profile');

    if (isset($_POST['submit']))
    {


    // Extracting the variables from the POST 
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $org = $_POST['org'];
    $phone = $_POST['phone'];
    $employees = $_POST['number_of_employees'];
    $volunteers = $_POST['number_of_volunteers'];
    $website = $_POST['website'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $postcode = $_POST['postcode'];
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

 
    // The flow below checks for general errors in the form, then does 
    // a loop for each image. 
    
    if (empty($name)){
        echo 'Please enter your name.';
    } 
    elseif (empty($email)){
        echo 'Please enter your email.';
    } 
    elseif (empty($org)){
        echo 'Please enter your organisation.';
    } 
    elseif (empty($phone)){
        echo 'Please enter a contact number.';
    } 
    else {

        $project_udpate = DB::table('users')->
                            where('id', $userid)->
                            limit(1)->
                            update(array('name' => $name                            
                        ));



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
                                        Profile successfully updated!
                                    </div>
                                    <br \>
                                    <div class="d-grid"><a class="btn btn-primary" href="home">Home</a></div>
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