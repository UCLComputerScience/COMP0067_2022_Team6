@extends('layouts.mainlayout-logged-in')
@section('content')
<!DOCTYPE html>

<?php  

$event_id = Request::segment(2);
$this_event = DB::Table('events')->select('event_id','event_title','event_description','event_datetime','event_timezone', 'event_call_url', 'event_video_url')->where('event_id',$event_id)->get();
$event_title = $this_event->pluck('event_title');
$event_description = $this_event->pluck('event_description');
$event_datetime = $this_event->pluck('event_datetime');
$event_timezone = $this_event->pluck('event_timezone');
$event_call_url = $this_event->pluck('event_call_url');
$event_call_url_test = $this_event->pluck('event_call_url');
$event_video_url= $this_event->pluck('event_video_url');
$first_image_path = DB::Table('ImagePaths')->select('imageUUID','extension')->where('event_id', $event_id)->get();


function strip_text($url){
    $url = str_replace(array('[',']','"'), '', $url);
    $url = stripslashes($url);

    return $url;
}

$event_video_url = strip_text($event_video_url);
$event_call_url = strip_text($event_call_url);
$event_description = strip_text($event_description);
$event_title = strip_text($event_title);
$event_datetime = strip_text($event_datetime);
$event_datetime = substr($event_datetime, 0, -3);
$event_timezone = strip_text($event_timezone);

if ($event_video_url != 'null'){
    $event_video_url = '<div class="row gx-5 justify-content-center" style="margin-left: 25%;">
     <div class="embed-responsive embed-responsive-16by9">
        <iframe width="560" height="315" src="' .$event_video_url .'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>';
    }


if ($event_call_url != 'null'){
        if (str_starts_with($event_call_url, 'https://') == FALSE){
            $event_call_url = 'https://' .$event_call_url;
        }
    $event_call_url = '<br /><div class="d-grid"><a class="btn btn-primary" href="' .$event_call_url .'" target="_blank">Join event</a></div>';
}



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
                                <h1 class="fw-bolder"> <?php echo $event_title ?> </h1>
                                <h3><?php echo $event_datetime, "<br>", $event_timezone ?></h3>
                                <?php if ($event_call_url != 'null'){
                                    echo $event_call_url;
                                }
                                ?>
                                <br>
                                <?php echo $event_description ?> 
                                <p class="lead fw-normal text-muted mb-0"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col-12"><img class="img-fluid rounded-3 mb-5" src="https://dummyimage.com/1300x700/343a40/6c757d" alt="..." /></div>
                        <?php 
                            //echo str_replace(array ('["','"]'),'' , $event_call_url_test);
                            $stripped_url = str_replace(array ('["','"]'),'' , $event_call_url_test);
                            $second_stripped_url = substr($stripped_url, 35);
                            //echo  $second_stripped_url;
                            echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $second_stripped_url .'?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                        ?> 
                    
                    </div>
                    <?php if ($event_video_url != 'null') {
                        echo $event_video_url;
                        }
                    ?>    
                </div>
            </section>
        </main>
    </body>
</html>


@endsection