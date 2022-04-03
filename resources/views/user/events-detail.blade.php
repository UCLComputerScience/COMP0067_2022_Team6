@extends('layouts.mainlayout-logged-in')
@section('content')
<!DOCTYPE html>

<?php  

//$event_id = $_GET['event_id'];
$event_id = Request::segment(2);
$this_event = DB::Table('events')->select('event_id','event_title','event_description','event_datetime',
'event_timezone', 'event_call_url')->where('event_id',$event_id)->get();
$event_title = $this_event->pluck('event_title');
$event_details = $this_event->pluck('event_description');
$event_timezone = $this_event->pluck('event_timezone');
$event_call_url = $this_event->pluck('event_call_url');
$first_image_path = DB::Table('ImagePaths')->select('imageUUID','extension')->where('event_id', $event_id)->get();

?>

<html lang="en">
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            
            <!-- Page Content-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center mb-5">
                                <h1 class="fw-bolder"> <?php echo str_replace(array ('["','"]'),'' , $event_title) ?> </h1>
                                <!-- Note: SDGs may be better served by showing up with shiny pictures but we should review to see what works and what's feasible -->
                                
                                <div class="d-grid"><a class="btn btn-primary" href=$event_call_url><i class="fa fa-phone"></i>Join event</a></div>
                                <p class="lead fw-normal text-muted mb-0"><?php echo $event_description ?> This is the event description! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab similique, ducimus ut alias sit accusamus illum, asperiores deserunt dolorum quaerat qui! Ab, quisquam explicabo magni dolores unde beatae quam a.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col-12"><img class="img-fluid rounded-3 mb-5" src="https://dummyimage.com/1300x700/343a40/6c757d" alt="..." /></div>
                    </div>    
                </div>
            </section>
        </main>
    </body>
</html>



@endsection