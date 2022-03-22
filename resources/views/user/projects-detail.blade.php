@extends('layouts.mainlayout-logged-in')
@section('content')
<!DOCTYPE html>
<<<<<<< Updated upstream
=======

<?php  

//$project_id = $_GET['project_id'];
$project_id = Request::segment(2);
$this_project = DB::Table('projects')->select('project_id','projectTitle','projectDetails','projectEndDate','sdg')->where('project_id',$project_id)->get();
$project_title = $this_project->pluck('projectTitle');
$project_details = $this_project->pluck('projectDetails');
$sdg = $this_project->pluck('sdg');
$first_image_path = DB::Table('ImagePaths')->select('imageUUID','extension')->where('project_id', $project_id)->get();

?>

>>>>>>> Stashed changes
<html lang="en">
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            
            <!-- Page Content-->
            <section class="py-5">
                <div class="container px-5 my-5">
<<<<<<< Updated upstream
=======
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
>>>>>>> Stashed changes
                    <div class="row gx-5">
                        <div class="col-lg-3">
                            <div class="d-flex align-items-center mt-lg-5 mb-4">
                                <img class="img-fluid rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." />
                                <div class="ms-3">
                                    <div class="fw-bold">Valerie Luna</div>
                                    <div class="text-muted">News, Business</div>
                                </div>
                            </div>
                        </div>
<<<<<<< Updated upstream
                        <div class="col-lg-9">
                            <!-- Post content-->
                            <article>
                                <!-- Post header-->
                                <header class="mb-4">
                                    <!-- Post title-->
                                    <h1 class="fw-bolder mb-1">Welcome to Blog Post!</h1>
                                    <!-- Post meta content-->
                                    <div class="text-muted fst-italic mb-2">January 1, 2021</div>
                                    <!-- Post categories-->
                                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
                                </header>
                                <!-- Preview image figure-->
                                <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>
                                <!-- Post content-->
                                <section class="mb-5">
                                    <p class="fs-5 mb-4">Science is an enterprise that should be cherished as an activity of the free human mind. Because it transforms who we are, how we live, and it gives us an understanding of our place in the universe.</p>
                                    <p class="fs-5 mb-4">The universe is large and old, and the ingredients for life as we know it are everywhere, so there's no reason to think that Earth would be unique in that regard. Whether of not the life became intelligent is a different question, and we'll see if we find that.</p>
                                    <p class="fs-5 mb-4">If you get asteroids about a kilometer in size, those are large enough and carry enough energy into our system to disrupt transportation, communication, the food chains, and that can be a really bad day on Earth.</p>
                                    <h2 class="fw-bolder mb-4 mt-5">I have odd cosmic thoughts every day</h2>
                                    <p class="fs-5 mb-4">For me, the most fascinating interface is Twitter. I have odd cosmic thoughts every day and I realized I could hold them to myself or share them with people who might be interested.</p>
                                    <p class="fs-5 mb-4">Venus has a runaway greenhouse effect. I kind of want to know what happened there because we're twirling knobs here on Earth without knowing the consequences of it. Mars once had running water. It's bone dry today. Something bad happened there as well.</p>
                                </section>
                            </article>
                            <!-- Comments section-->
                            <section>
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <!-- Comment form-->
                                        <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                                        <!-- Comment with nested comments-->
                                        <div class="d-flex mb-4">
                                            <!-- Parent comment-->
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                                <!-- Child comment 1-->
                                                <div class="d-flex mt-4">
                                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                                    <div class="ms-3">
                                                        <div class="fw-bold">Commenter Name</div>
                                                        And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                                    </div>
                                                </div>
                                                <!-- Child comment 2-->
                                                <div class="d-flex mt-4">
                                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                                    <div class="ms-3">
                                                        <div class="fw-bold">Commenter Name</div>
                                                        When you put money directly to a problem, it makes a good headline.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single comment-->
                                        <div class="d-flex">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
=======
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
>>>>>>> Stashed changes
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>


<section>
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
</section>
@endsection

