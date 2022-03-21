
@extends('layouts.mainlayout-logged-in')


<?php 

$id = Auth::id();

print_r($id);

$userid = Auth::id();

//$my_projects = DB::Table('projects')->select('project_name','project_description','project_sdg')->where('id',$userid)->get();

//$my_projects;


$my_projects = DB::Table('projects')->select('project_id','projectTitle','projectDetails','projectEndDate')->where('id',$userid)->get();

//print_r($my_projects);

$project_id = $_GET['project_id'];
print_r($project_id) 


?>


