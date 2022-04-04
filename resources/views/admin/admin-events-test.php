@extends('layouts.mainlayout-admin')

@section('content')

<!DOCTYPE html>
<html lang="en">
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
<div class="container my-5">


<br><div class="col-lg-6 col-xl-4">
        <div class="card mb-5 mb-xl-0">
            <div class="card-body p-5">
                <div class="text-center">
                    <div class="text-uppercase fw-bold">
                        Success
                    </div>
                    <div class="small text-camelcase fw-bold">
                        Your event has been successfully created.
                        <a href="events">View your new event.</a>
                        <a href="events">Manage events.</a>
                    </div>
                </div>
                <br />
            </div>
        </div>
    </div>
        
        
        <div class="text-center">Event successfully created! <a href="events">View your new event.</a></div>

        </head>
<body onload="init();">


</html>
@endsection