<?php 
@include('admin-manage-events');

    if (TRUE)
    {
    
    $event_id = Request::segment(2);

    DB::table('events')->where('event_id', $event_id)->delete();
    

    }
    else {
    echo "Error";

    }

?>
<?php
    $url=url()->previous();
    echo "<meta http-equiv='refresh' content='0.3;url=$url'>";
?>