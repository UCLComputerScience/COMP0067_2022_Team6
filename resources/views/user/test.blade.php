
@extends('layouts.mainlayout-logged-in')


<?php 

$project_id = 3;
$this_project = DB::Table('projects')->select('project_id','projectTitle','projectDetails','projectEndDate')->where('project_id',$project_id)->get();
$this_project->pluck('projectTitle'));
$project_title = $this_project->pluck('projectTitle'));
$project_details = $this_project->pluck('projectDetails'));
$first_image_path = DB::Table('ImagePaths')->select('imageUUID','extension')->where('project_id', $project_id)->get();


?>


