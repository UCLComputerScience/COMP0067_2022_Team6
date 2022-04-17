<?php 
@include('admin-projects-manage');

    if (TRUE)
    {
    
    $project_id = Request::segment(2);

    DB::table('projects')->where('project_id', $project_id)->delete();
    

    }
    else {
    echo "Error";

    }

?>
<?php
    $url=url()->previous();
    echo "<meta http-equiv='refresh' content='0.3;url=$url'>";
?>