@extends('layouts.mainlayout-logged-in')
@section('content')
<?php

$id = Auth::user()->id;
$subscriberRole = 3;
$getid = Request::segment(2);;

if ($getid == $id){
DB::Table('users')->where('id',$id)->update(['role' => $subscriberRole ]);

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
                                      Your monthly subscription is now active!
                                    </div>
                                    <br \>
                                    <div class="d-grid"><a class="btn btn-primary" href="/home">Go to your homepage</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <br \>
                <br \>
            </section>';








}
else{ 

  echo "error";
}

?>

