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
                        <h1 class="fw-bolder">Create Project</h1>
                        <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
 

                        <?php 
                      $username = Session::get('key');
                      $username
                      ?>
                      
                  
                    
                      <div class="container">
                      
                      <!-- Create auction form -->
                      <div style="max-width: 800px; margin: 10px auto">
                        <h2 class="my-3">Create new project </h2>
                        <div class="card">
                          <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="projects-create-result">
                                @csrf <!-- {{ csrf_field() }} -->
                                <div class="form-group row">
                                <label for="auctionTitle" class="col-sm-2 col-form-label text-right">Project Title</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="projectTitle" id="projectTitle" required minlength="20" placeholder="e.g. Well Building - Moldova">
                                  <small id="titleHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> The title of your project (minimum 20 characters).</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="auctionDetails" class="col-sm-2 col-form-label text-right">Details</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control" name="projectDetails" id="projectDetails" rows="4"></textarea>
                                  <small id="detailsHelp" class="form-text text-muted">Full details of your project to give insight to members.</small>
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
                                      <small id="categoryHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> Select a category for this item.</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="projectValue" class="col-sm-2 col-form-label text-right">Project Value</label>
                                <div class="col-sm-10">
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">£</span>
                                    </div>
                                    <input type="number" class="form-control" name="projectValue" id="projectValue" required>
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
                                    <input type="number" class="form-control" name="fundingRequired" id="fundingRequired" required>
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
                                <input type="file" name="filesToUpload[]" id="filesToUpload" multiple required>
                                <small id="filesToUploadHelp" class="form-text text-muted"><span class="text-danger">* Required.</span>Please upload one to three images for your project.</small>
                              </div>
                              </div>
                              <button type="submit" id="submit" name="submit" class="btn btn-primary form-control">Create Project</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      
                      </div>
                       
@endsection