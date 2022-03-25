<?php 
@include('projects-my')

    if (isset($_POST["submit"]))
    {
    echo "yet";
    $project_id = Request::segment(2);

    DB::table('projects')->where('project_id', $project_id)->delete();
    
    return view('/projects-my');

    }
    else {
    echo "Error";

    }

?>