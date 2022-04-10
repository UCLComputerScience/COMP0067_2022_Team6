@extends('layouts.mainlayout-logged-in')
@section('content')
<!DOCTYPE html>

<?php

//$project_id = $_GET['project_id'];
$project_id = Request::segment(2);
$this_project = DB::Table('projects')->select('project_id','projectTitle','projectDetails','projectEndDate','sdg')->where('project_id',$project_id)->get();
$project_title = $this_project->pluck('projectTitle');
$project_details = $this_project->pluck('projectDetails');
$sdg = $this_project->pluck('sdg');
$first_image_path = DB::Table('ImagePaths')->select('imageUUID','extension')->where('project_id', $project_id)->get();

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
                                <h1 class="fw-bolder"> <?php echo str_replace(array ('["','"]'),'' , $project_title) ?> </h1>
                                <!-- Note: SDGs may be better served by showing up with shiny pictures but we should review to see what works and what's feasible -->
                                <h2 class="fw-bolder">SDGs: <?php echo str_replace(array ('["','"]'),'' , $sdg) ?></h2>
                                <p class="lead fw-normal text-muted mb-0"><?php echo $project_details ?> This is the project description! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab similique, ducimus ut alias sit accusamus illum, asperiores deserunt dolorum quaerat qui! Ab, quisquam explicabo magni dolores unde beatae quam a.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col-12"><img class="img-fluid rounded-3 mb-5" src="https://dummyimage.com/1300x700/343a40/6c757d" alt="..." /></div>
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
                                    <td>teuawgfhf</td>
                                    <td><?php echo str_replace(array ('["','"]'),'' , $project_title) ?></td>
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

                    <div class="card-header">Files list</div>

                    <div class="card-body">

                        <table class="table">
                            <tr>
                                <th>Title</th>
                                <th>Download file</th>
                            </tr>
                            @forelse ($files as $file)
                                <tr>
                                    <td>{{ $file->title }}</td>
                                    <td><a href="{{ route('files.download', $file->uuid) }}">{{ $file->cover }}</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">No files found.</td>
                                </tr>
                            @endforelse
                        </table>

                    </div>
                    <div class="card">
                        <div class="card-header">Add new file</div>

                        <div class="card-body">

                            <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                Title:
                                <br>
                                <input type="text" name="title" class="form-control">

                                <br>

                                Cover File:
                                <br>
                                <input type="file" name="cover">

                                <br><br>

                                <input type="submit" value=" Upload file " class="btn btn-primary">

                            </form>

                        </div>
                    </div>

                </div>
            </section>
        </main>
    </body>
</html>



@endsection

