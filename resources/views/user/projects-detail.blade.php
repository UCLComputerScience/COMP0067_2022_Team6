
@extends('layouts.mainlayout-logged-in')
@section('content')
<!DOCTYPE html>

<?php


$project_id = Request::segment(2);
echo 'hello' ;
$this_project = DB::Table('projects')->select('project_id','id','projectTitle','projectDetails','projectEndDate','sdg')->where('project_id',$project_id)->get();
$project_title = $this_project->pluck('projectTitle');
$project_details = $this_project->pluck('projectDetails');
$sdgs = DB::Table('projects')->select('sdg1','sdg2','sdg3','sdg4','sdg5','sdg6','sdg7','sdg8','sdg9','sdg10','sdg11','sdg12','sdg13','sdg14','sdg15','sdg16','sdg17')->where('project_id',$project_id)->get();
echo $sdgs;

$project_user_id = $this_project->pluck('id');
$project_details = str_replace(array( '["', '"]' ), '', $project_details);
$user_id = Auth::id();
$this_user = DB::Table('users')->select('id')->where('id',$user_id)->get();
$id = $this_user->pluck('id');
$role = DB::Table('users')->select('role')->where('id',$user_id)->get();


$array = array('"sdg1"','"sdg2"','"sdg3"','"sdg4"','"sdg5"','"sdg6"','"sdg7','"sdg8"','"sdg9"','"sdg10"','"sdg11"','"sdg12"','"sdg13"','"sdg14"','"sdg15"','"sdg16"','"sdg17"','null','0','"',':','{','[','}',']',',,',',,,',',,,,',',,,,,',',,,,,,',',,,,,,,',',,,,,,,,',',,,,,,,,,',',,,,,,,,,,',',,,,,,,,,,,',',,,,,,,,,,,,',',,,,,,,,,,,,,',',,,,,,,,,,,,,,',',,,,,,,,,,,,,,',',,,,,,,,,,,,,,,',',,,,,,,,,,,,,,,,',',,,,,,,,,,,,,,,,,');
$sdgs_first_strip = str_replace($array,"",$sdgs);
$sdgs_second_strip = rtrim($sdgs_first_strip, ",");


$first_image_path = DB::Table('projects')->where('project_id',$project_id)->pluck('image_name');
$first_image_path_stripped = str_replace(array( '["', '"]' ), '', $first_image_path);
$first_image_path_stripped_second = str_replace(array( ' '), '', $first_image_path_stripped);

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
                                
                                <h2 class="fw-bolder">SDGs: <?php echo $sdgs_second_strip; ?></h2>
                                <p class="lead fw-normal text-muted mb-0"><?php echo $project_details?></p>
                              
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col-12"><img class="rounded mx-auto d-block" src="http://51.142.117.217/assets/<?php echo $first_image_path_stripped?>" alt="..." width="800" height="500"/></div>
                    </div>
                    <div class="text-center mb-5">
                        <h2 class="fw-bolder">Project reports</h1>
                    </div>

                    <div class="card-header">Project report list</div>

                    <div class="card-body">

                        <table class="table">
                            <tr>
                                <th>Title</th>
                                <th>Download report</th>
                            </tr>
                            @foreach ($files as $file)

                                @if($file->project_id == $project_id)
                                <tr>
                                    <td>{{ $file->title }}</td>
                                    <td><a href="{{ route('projects-detail.download', $file->uuid) }}">{{ $file->cover }}</a></td>
                                </tr>
                                @endif

                            @endforeach
                        </table>

                    </div>

                    @if($id == $project_user_id)
                    <div class="card">
                        <div class="card-header">Add new report</div>

                        <div class="card-body">

                            <form action="{{ route('projects-detail.store', $project_id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="project_id" value="{{ $project_id }}" />

                                Title:
                                <br>
                                <input type="text" name="title" class="form-control">

                                <br>

                                <br>
                                <input type="file" name="cover">

                                <br><br>

                                <input type="submit" value=" Upload file " class="btn btn-primary">

                            </form>

                        </div>
                    </div>
                    @endif

                </div>
            </section>
        </main>
    </body>
</html>



@endsection

