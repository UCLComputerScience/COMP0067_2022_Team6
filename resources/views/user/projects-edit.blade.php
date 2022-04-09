<!-- TODO: 
1. Get filtering to work for projects table
2. After filtering is working, copy-paste projects table section and change columns + contents for reports -->
@extends('layouts.mainlayout-logged-in')

@section('content')




<!DOCTYPE html>
<html lang="en">
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            
            <!-- Page Content-->
            <section class="py-5">
                <div class="text-center mb-5">
 
                        <?php 
                      $project_id = Request::segment(2);
                      $this_project = DB::Table('projects')->select('project_id','projectTitle','projectLocation', 'projectCity', 'projectCountry', 'projectDetails','projectEndDate','sdg','projectOrganisation', 'projectValue', 'fundingRequired')->where('project_id',$project_id)->get();
                      $project_title = $this_project->pluck('projectTitle');
                      $project_location = $this_project->pluck('projectLocation');
                      $project_city = $this_project->pluck('projectCity');
                      $project_country = $this_project->pluck('projectCountry');
                      $project_details = $this_project->pluck('projectDetails');
                      $project_end_date = $this_project->pluck('projectEndDate');
                      $project_value = $this_project->pluck('projectValue');
                      $project_funding_required = $this_project->pluck('fundingRequired');
                      $project_organisation = $this_project->pluck('projectOrganisation');
                      $project_description = $this_project->pluck('projectDetails');
                     
                      function strip_text($url){
                        $url = str_replace(array('[',']','"'), '', $url);
                        $url = stripslashes($url);
                
                        return $url;
                    }



                      ?>
                      
                  
                    
                      <div class="container">
                      <br />
                      <br />
                      <!-- Create auction form -->
                      <div style="max-width: 800px; margin: 10px auto">
                      <h1 class="fw-bolder">Edit Your Project: <?php echo strip_text($project_title); ?> </h1>
                        <div class="card">
                          <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="/projects-edit-result">
                                @csrf <!-- {{ csrf_field() }} -->
                                <input type="hidden" name="project_id" value="<?php echo $project_id ?>">
                                <div class="form-group row">
                                <label for="auctionTitle" class="col-sm-2 col-form-label text-right">Project Title</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php if (isset($project_title[0])){ print_r($project_title[0]);} else { print_r(""); }?>" name="projectTitle" id="projectTitle" required minlength="10" placeholder="e.g. Well Building - Moldova">
                                  <small id="titleHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> The title of your project (minimum 10 characters).</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="auctionTitle" class="col-sm-2 col-form-label text-right">Organisation</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php if (isset($project_organisation[0])){ print_r($project_organisation[0]);} else { print_r(""); } ?>" name="projectOrganisation" id="projectOrganisation" required minlength="10" placeholder="e.g. WaterAid">
                                  <small id="titleHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> The organisation of your project (minimum 10 characters).</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="auctionTitle" class="col-sm-2 col-form-label text-right">Address Line 1</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="projectLocation" id="projectLocation" value="<?php if (isset($project_location[0])){ print_r($project_location[0]);} else { print_r(""); } ?>" required minlength="5" placeholder="">
                                  <small id="titleHelp" class="form-text text-muted"><span class="text-danger">* Required.</span>(maximum 5 characters)</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="auctionTitle" class="col-sm-2 col-form-label text-right">City</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="projectCity" id="projectCity" value="<?php if (isset($project_city[0])){ print_r($project_city[0]);} else { print_r(""); } ?>" placeholder="" required>
                                  <small id="titleHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="auctionTitle" class="col-sm-2 col-form-label text-right">Country</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="projectCountry" id="projectCountry" value="<?php if (isset($project_country[0])){ print_r($project_country[0]);} else { print_r(""); } ?>" placeholder="" required>
                                  <small id="titleHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="auctionDetails" class="col-sm-2 col-form-label text-right">Description</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control" name="projectDetails" value="<?php if (isset($project_description[0])){ print_r($project_description[0]);} else { print_r(""); } ?>" id="projectDetails" rows="4"><?php if (isset($project_description[0])){ print_r($project_description[0]);} else { print_r(""); } ?></textarea>
                                  <small id="detailsHelp" class="form-text text-muted">Detailed description of your project to give insight to members.</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="sdg" class="col-sm-2 col-form-label text-right">SDG</label>
                                <div class="col-sm-10">
                                  <select class="form-control" name="sdg" id="sdg" required> <!-- The code under this should auto-update, now working!! -->
                                    <option value="">Choose an option</option>
                                      <?php 
                                    $result = DB::table('categories')->get();    ?>
                                    @foreach ($result as $row)
                                        <option value="{{$row->categoryID}}">{{$row->categoryName}}</option>
                                    @endforeach 
                                      </select>
                                      <small id="categoryHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> Select SDGs for this project.</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="projectValue" class="col-sm-2 col-form-label text-right">Project Value</label>
                                <div class="col-sm-10">
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">£</span>
                                    </div>
                                    <input type="number" class="form-control" name="projectValue" id="projectValue" value="<?php if (isset($project_value[0])){ print_r($project_value[0]);} else { print_r(""); } ?>" required>
                                  </div>
                                  <small id="startBidHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> How much you expect your project to cost in total.</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="fundingRequired" class="col-sm-2 col-form-label text-right">Funding Required</label>
                                <div class="col-sm-10">
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">£</span>
                                    </div>
                                    <input type="number" class="form-control" name="fundingRequired" id="fundingRequired" value="<?php if (isset($project_funding_required[0])){ print_r($project_funding_required[0]);} else { print_r(""); } ?>" required>
                                  </div>
                                  <small id="reservePriceHelp" class="form-text text-muted">Optional. Indicate any funding required</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="projectEndDate" class="col-sm-2 col-form-label text-right">End date</label>
                                <div class="col-sm-10">
                                  <input type="datetime-local" class="form-control" name="projectEndDate" id="projectEndDate" required>
                                  <small id="endDateHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> Expected end date of the project.</small>
                                </div>
                              </div>
                              <div class="form-group row">
                              <label for="filesToUpload" class="col-sm-2 col-form-label text-right">Image upload</label>
                              <div class="col-sm-10">
                                <input type="file" name="filesToUpload[]" id="filesToUpload" style="float:left" multiple required>
                               <br>
                                <small id="filesToUploadHelp" class="form-text text-muted" style="float:left"><span class="text-danger">* Required. </span>Please upload one to three images for your project.</small>
                              </div>
                              </div>

                              <input type="hidden" name="project_id" value= "<?php $project_id?>" >
                              <button type="submit" id="submit" name="submit" class="btn btn-primary form-control">Edit Project</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      
                      </div>
                       
@endsection