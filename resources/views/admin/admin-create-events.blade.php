@extends('layouts.mainlayout-admin')

@section('content')

<!DOCTYPE html>
<html lang="en">
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            
            <!-- Page Content-->
            <section class="py-5">
                <div class="text-center mb-5">
                        <h1 class="fw-bolder">Create Event</h1>
                        <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
 

                        <?php 
                      $username = Session::get('key');
                      ?>
                      
                  
                    
                      <div class="container">
                      
                      <!-- Create auction form -->
                      <div style="max-width: 800px; margin: 10px auto">
                        <h2 class="my-3">Create new event </h2>
                        <div class="card">
                          <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="admin-events-create-result">
                                @csrf <!-- {{ csrf_field() }} -->
                                <div class="form-group row">
                                <label for="event_title" class="col-sm-2 col-form-label text-right">Event title</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="event_title" id="event_title" required minlength="5" placeholder="e.g. Well Building - Moldova">
                                  <small id="titleHelp" class="form-text text-muted align-left" style="float:left"><span class="text-danger">* Required.</span> The title of your event (minimum 5 characters).</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="event_description" class="col-sm-2 col-form-label text-right">Description</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control" name="event_description" id="event_description" rows="4"></textarea>
                                  <small id="detailsHelp" class="form-text text-muted" style="float:left">Full details of your event to give insight to members.</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="event_datetime" class="col-sm-2 col-form-label text-right">Event date</label>
                                <div class="col-sm-10">
                                  <input type="datetime-local" class="form-control" name="event_datetime" id="event_datetime" required>
                                  <small id="endDateHelp" class="form-text text-muted" style="float:left"><span class="text-danger">* Required.</span> Date and time this event will take place.</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="event_timezone" class="col-sm-2 col-form-label text-right">Event timezone</label>
                                <div class="col-sm-10">
                                  <select class="form-control" name="event_timezone" id="event_timezone" required>
                                    <option value="">Choose a timezone</option>
                                      <?php 
                                    $result = DB::table('timezones')->get();    ?>
                                    @foreach ($result as $row)
                                        <option value="{{$row->timezone_relative_to_gmt}}">{{$row->timezone_relative_to_gmt}}</option>
                                    @endforeach 
                                      </select>
                                      <small id="categoryHelp" class="form-text text-muted" style="float:left"><span class="text-danger">* Required.</span> Select the timezone this event will take place in.</small>
                                </div>
                              </div>
                              <div class="form-group row">
                              <label for="filesToUpload" class="col-sm-2 col-form-label text-right">Image upload</label>
                              <div class="col-sm-10">
                                <input type="file" name="filesToUpload[]" id="filesToUpload">
                                <small id="filesToUploadHelp" class="form-text text-muted" style="float:left"><span class="text-danger">* Required.</span>Please upload one image for your event.</small>
                              </div>
                              </div>
                              <div class="form-group row">
                                <label for="event_call_url" class="col-sm-2 col-form-label text-right">Webcall URL for event</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control" name="event_call_url" id="event_call_url" rows="1"></textarea>
                                  <small id="detailsHelp" class="form-text text-muted" style="float:left">URL for the webcall where your event will take place e.g. Zoom link.</small>
                                </div>
                              </div>
                              <button type="submit" id="submit" name="submit" class="btn btn-primary form-control">Create event</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      
                      </div>
                       
@endsection