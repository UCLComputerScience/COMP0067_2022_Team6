
@extends('layouts.mainlayout-logged-in')


<?php 

$project_id = 3;
$this_project = DB::Table('projects')->select('project_id','projectTitle','projectDetails','projectEndDate')->where('project_id',$project_id)->get();
$this_project->pluck('projectTitle'));
$project_title = $this_project->pluck('projectTitle'));
$project_details = $this_project->pluck('projectDetails'));
$first_image_path = DB::Table('ImagePaths')->select('imageUUID','extension')->where('project_id', $project_id)->get();










//$project_id = $_GET['project_id'];
$project_id = Request::segment(2);
$this_project = DB::Table('projects')->select('project_id','projectTitle','projectDetails','projectEndDate')->where('project_id',$project_id)->get();
$project_title = $this_project->pluck('projectTitle');
$project_details = $this_project->pluck('projectDetails');
$first_image_path = DB::Table('ImagePaths')->select('imageUUID','extension')->where('project_id', $project_id)->get();

?>

<html lang="en">
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            
            <!-- Page Content-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center mb-5">
                                <h1 class="fw-bolder">Project title here</h1>
                                <h2 class="fw-bolder">Organisation name here</h2>
                                <!-- Note: SDGs may be better served by showing up with shiny pictures but we should review to see what works and what's feasible -->
                                <h2 class="fw-bolder">SDGs: SDGs here</h2>
                                <p class="lead fw-normal text-muted mb-0">This is the project description! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab similique, ducimus ut alias sit accusamus illum, asperiores deserunt dolorum quaerat qui! Ab, quisquam explicabo magni dolores unde beatae quam a.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col-12"><img class="img-fluid rounded-3 mb-5" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center mb-5">
                                <p class="lead fw-normal text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam deserunt architecto enim eos accusantium fugit recusandae illo iste dignissimos possimus facere ducimus odit voluptatibus exercitationem, ex laudantium illum voluptatum corporis.</p>
                                <a class="text-decoration-none" href="#!">
                                    View project
                                    <i class="bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-5">
                        <h2 class="fw-bolder">Project reports</h1>
                        <table id="projects" class="table table-striped nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Report name</th>
                                    <th>Project name</th>
                                    <th>Organisation name</th>
                                    <th>Language</th>
                                    <th>Description</th>
                                    <th>SDGs</th>
                                    <th>Date added</th>
                                    <th>Last updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2018 water research</td>
                                    <td>Mexican water source</td>
                                    <td>WaterAid</td>
                                    <td>Spanish</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </td>
                                    <td>3, 11</td>
                                    <td>2018/11/13</td>
                                    <td>2019/12/12</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Report name</th>
                                    <th>Project name</th>
                                    <th>Organisation name</th>
                                    <th>Language</th>
                                    <th>Description</th>
                                    <th>SDGs</th>
                                    <th>Date added</th>
                                    <th>Last updated</th>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>


<div class="container">

<div class="row"> <!-- Row #1 with auction title + watch button -->
  <div class="col-sm-8"> <!-- Left col -->
    <h2 class="my-3"><?php echo($project_title); ?></h2>
  </div>
  <div class="col-sm-4 align-self-center"> <!-- Right col -->

<!-- Project description -->

<div class="row"> 
  <div class="col-sm-8"> 
    <div class="itemDescription"> 
    <?php echo($project_title); ?>
    </div>
  </div>
</div>

?>


