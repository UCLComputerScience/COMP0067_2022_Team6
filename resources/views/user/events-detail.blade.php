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
    $first_image_path = DB::Table('events')->where('event_id',$event_id)->pluck('image_name');
    $first_image_path_stripped = str_replace(array( '["', '"]' ), '', $first_image_path);
    $first_image_path_stripped_second = str_replace(array( ' '), '', $first_image_path_stripped);



    function strip_text($url){
        $url = str_replace(array('[',']','"'), '', $url);
        $url = stripslashes($url);

        return $url;
    }

    $event_video_url = strip_text($event_video_url);
    $event_video_url = substr($event_video_url, strpos($event_video_url, "=") + 1);
    $event_call_url = strip_text($event_call_url);
    $event_description = strip_text($event_description);
    $event_title = strip_text($event_title);
    $event_datetime = strip_text($event_datetime);
    $event_datetime = substr($event_datetime, 0, -3);
    $event_timezone = strip_text($event_timezone);

    $checking_array = array("null", "", NULL);

    if (!in_array($event_video_url, $checking_array)){
        $event_video_url = '
            <iframe width="560" height="315" class="mx-auto d-block" src="https://www.youtube.com/embed/' .$event_video_url .'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            ';
        }

        
    if (!in_array($event_call_url, $checking_array)){
            if (str_starts_with($event_call_url, 'https://') == FALSE){
                $event_call_url = 'https://' . $event_call_url;
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
                                <h3><?php echo $event_datetime, "<br>", $event_timezone, "<br>" ?></h3>
                                <?php 
                                    echo $event_call_url;
                                  
                                ?>
                                <br>
                                <?php echo $event_description ?> 
                                <p class="lead fw-normal text-muted mb-0"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col-12"><img margin-bottom: 250px class="mx-auto d-block" src="http://127.0.0.1:8000/assets/<?php echo $first_image_path_stripped_second?>" alt="..." width="800" height="500" /></div>
                    </div>
                        <br>
                    
                        <br>
                        <?php 
                    
                             echo $event_video_url;
                        ?> 
                    </div>
   
                </div>
            </section>
        </main>
    </body>
</html>


@endsection