@extends('layouts.mainlayout-admin')
@section('styles')


@section('content')


<div class="container">
 <!-- Welcome Message -->
     <section class="py-5">
         <div class="container px-5 my-5">
        <div class="text-center mb-5">
      <h1 class="fw-bolder">Welcome, administrator <?php echo Auth::user()->name ?>!</h1>
      <p class="lead fw-normal text-muted mb-0"></p>
     </div>
    <div class="ro
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
         
                <div class="card-body">
                    
                    

                
                <h1 class="fw-bolder"> Dashboard</h1>
                <br>
                <body class="fw-bolder"> Total number of ANCSSC Members: <?php  $users = DB::table('users')->count('*'); echo $users ?></body>
                <br>
                <br>
                <body class="fw-bolder"> Total number of Projects: <?php  $projects = DB::table('projects')->count('*'); echo $projects ?></body>
                <br>
                <br>
                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="https://dashboard.stripe.com/" target="_blank">Stripe Reports</a>
                <br>
                <br>
                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="https://datastudio.google.com/" target="_blank">Google Analytics Editor</a>
                <br>
                <br>
                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="https://console.cloud.google.com/" target="_blank">Google Cloud</a>
                <br>
                <br>
                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="https://portal.azure.com/#home" target="_blank">Azure Portal</a>
                <br>
                <br>
                <a class="twitter-timeline" data-width="800" data-height="500" href="https://twitter.com/ANCSSC1?ref_src=twsrc%5Etfw">Tweets by ANCSSC1</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>        </div>

            </div>
</div>
</div>
</div>
</div>
</div>
@endsection


