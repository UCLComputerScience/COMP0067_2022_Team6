@extends('layouts.mainlayout-admin')

@section('content')

<!DOCTYPE html>
<html lang="en">
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            
            <!-- Page Content-->
            <section class="py-5">
                
 


                    <?php 
                        $event_id = Request::segment(2);
                        $this_event = DB::Table('events')->select('event_id','event_title','event_description','event_datetime','event_timezone','event_call_url', 'event_video_url')->where('event_id',$event_id)->get();
                        $event_title = $this_event->pluck('event_title');
                        $event_description = $this_event->pluck('event_description');
                        $event_datetime = $this_event->pluck('event_datetime');
                        $event_timezone = $this_event->pluck('event_timezone');
                        $event_call_url = $this_event->pluck('event_call_url');
                        $event_video_url = $this_event->pluck('event_video_url');

                        $this_event_timezone_unstripped = DB::Table('events')->select('event_timezone')->where('event_id',$event_id)->get();
                        $this_event_timezone = strip_text($this_event_timezone_unstripped);
                        $this_event_timezone = str_replace(array('{event_timezone:', '}'), '', $this_event_timezone);

                        $event_datetime_stripped = strip_text($event_datetime);
                        $event_timezone_stripped = strip_text($event_timezone);

                        $event_datetime_orig = date("c", strtotime($event_datetime_stripped)); 
                        list($Date)=explode('+', $event_datetime_orig); 
                        $event_datetime_orig = $Date;

                        function strip_text($url){
                            $url = str_replace(array('[',']','"'), '', $url);
                            $url = stripslashes($url);
                    
                            return $url;
                        }
                    ?>
                        <!-- TODO: Change these field names and what they're pointing at -->
                        <div class="container">
                      
                      <!-- Create auction form -->
                      <div class="text-center mb-5">
                        <h1 class="fw-bolder">Edit event: <?php echo strip_text($event_title) ?> </h1>
                      <div style="max-width: 800px; margin: 10px auto">
                        <div class="card">
                          <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="/admin-events-edit-result">
                                @csrf <!-- {{ csrf_field() }} -->
                                <input type="hidden" name="event_id" value="<?php echo $event_id ?>">
                                <div class="form-group row">
                                <label for="event_title" class="col-sm-2 col-form-label text-right">Event title</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="event_title" id="event_title" required minlength="5" value="<?php if (isset($event_title[0])){ print_r($event_title[0]);} else { print_r(""); }?>" placeholder="e.g. Well Building - Moldova">
                                  <small id="titleHelp" class="form-text text-muted align-left" style="float:left"><span class="text-danger">* Required.</span> The title of your event (minimum 5 characters).</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="event_description" class="col-sm-2 col-form-label text-right">Description</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control" name="event_description" id="event_description" rows="4"><?php print_r($event_description[0]); ?></textarea>
                                  <small id="detailsHelp" class="form-text text-muted" style="float:left">Full details of your event to give insight to members.</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="event_datetime" class="col-sm-2 col-form-label text-right">Event date</label>
                                <div class="col-sm-10">
                                  <input type="datetime-local" class="form-control" name="event_datetime" id="event_datetime" value='$event_datetime_stripped' required>
                                  <small id="endDateHelp" class="form-text text-muted" style="float:left"><span class="text-danger">* Required.</span> Date and time this event will take place.</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="event_timezone" class="col-sm-2 col-form-label text-right">Event timezone</label>
                                <div class="col-sm-10">
                                  <select class="form-control" name="event_timezone" id="event_timezone" required>
                                        <option value="<?php print_r($event_timezone[0]);?>">Select timezone</option>
                                      <?php 
                                    $result = DB::table('timezones')->get();    ?>
                                    @foreach ($result as $row)
                                      <option value="{{$row->timezone_relative_to_gmt}}">{{$row->timezone_relative_to_gmt}}</option>
                                    @endforeach

                                    <option selected="<?php echo $this_event_timezone;?>"><?php echo $this_event_timezone;?></option>

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
                                  <input type="text" class="form-control" name="event_call_url" id="event_call_url"  value='<?php print_r($event_call_url[0]); ?>'  rows="1"></textarea>
                                  <small id="detailsHelp" class="form-text text-muted" style="float:left">URL for the webcall where your event will take place e.g. Zoom link. Note that if the event is over, you can remove this link.</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="event_video_url" class="col-sm-2 col-form-label text-right">YouTube recording link</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="event_video_url" id="event_video_url" value='<?php print_r($event_video_url[0]); ?>' rows="1"></textarea>
                                  <small id="detailsHelp" class="form-text text-muted" style="float:left">YouTube URL of event recording goes here.</small>
                                </div>
                              </div>
                              <button type="submit" id="submit" name="submit" class="btn btn-primary form-control">Update event</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      
                      </div>

                                
@endsection