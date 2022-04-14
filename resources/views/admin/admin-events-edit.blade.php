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
                        $this_event = DB::Table('events')->select('event_id','event_title','event_description','event_datetime','event_timezone','event_call_url', 'event_video_url',
                        'sdg1', 'sdg2', 'sdg3', 'sdg4', 'sdg5', 'sdg6', 'sdg7', 'sdg8', 'sdg9', 'sdg10', 'sdg11', 'sdg12', 'sdg13', 'sdg14', 'sdg15', 'sdg16', 'sdg17')
                        ->where('event_id',$event_id)->get();
                        $event_title = $this_event->pluck('event_title');
                        $event_description = $this_event->pluck('event_description');
                        $event_datetime = $this_event->pluck('event_datetime');
                        $event_timezone = $this_event->pluck('event_timezone');
                        $event_call_url = $this_event->pluck('event_call_url');
                        $event_video_url = $this_event->pluck('event_video_url');
                        $sdg1 = $this_event->pluck('sdg1');
                        $sdg2 = $this_event->pluck('sdg2');
                        $sdg3 = $this_event->pluck('sdg3');
                        $sdg4 = $this_event->pluck('sdg4');
                        $sdg5 = $this_event->pluck('sdg5');
                        $sdg6 = $this_event->pluck('sdg6');
                        $sdg7 = $this_event->pluck('sdg7');
                        $sdg8 = $this_event->pluck('sdg8');
                        $sdg9 = $this_event->pluck('sdg9');
                        $sdg10 = $this_event->pluck('sdg10');
                        $sdg11 = $this_event->pluck('sdg11');
                        $sdg12 = $this_event->pluck('sdg12');
                        $sdg13 = $this_event->pluck('sdg13');
                        $sdg14 = $this_event->pluck('sdg14');
                        $sdg15 = $this_event->pluck('sdg15');
                        $sdg16 = $this_event->pluck('sdg16');
                        $sdg17 = $this_event->pluck('sdg17');

                        $this_event_timezone_unstripped = DB::Table('events')->select('event_timezone')->where('event_id',$event_id)->get();
                        $this_event_timezone = strip_text($this_event_timezone_unstripped);
                        $this_event_timezone = str_replace(array('{event_timezone:', '}'), '', $this_event_timezone);

                        $event_datetime_stripped = strip_text($event_datetime);
                        $event_timezone_stripped = strip_text($event_timezone);

                        // Changing datetime to correct format for HTML to parse in datetime-local
                        $event_datetime_final = str_replace(array(' '), 'T', $event_datetime_stripped);


                        function strip_text($url){
                            $url = str_replace(array('[',']','"'), '', $url);
                            $url = stripslashes($url);
                    
                            return $url;
                        }
                    ?>
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
                                <label for="sdg" class="col-sm-2 col-form-label text-right"><a href="https://sdgs.un.org/goals" target="_blank">SDGs</a></label>
                        
                                <div class="col-md-10">
                                    <label class="form-check-label" for="sdg1">{{ __('1') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg1" name="sdg1">
                                    <input class="form-check-input" type="checkbox" value="1" <?php if($sdg1[0] == "1"){echo "checked";}else echo ""; ?> id="sdg1" name="sdg1">
                                    <label class="form-check-label" for="sdg2">{{ __('2') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg2" name="sdg2">
                                    <input class="form-check-input" type="checkbox" value="2" <?php if($sdg2[0] == "2"){echo "checked";}else echo ""; ?> id="sdg2" name="sdg2">
                                    <label class="form-check-label" for="sdg3">{{ __('3') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg3" name="sdg3">
                                    <input class="form-check-input" type="checkbox" value="3" <?php if($sdg3[0] == "3"){echo "checked";}else echo ""; ?> id="sdg3" name="sdg3">
                                    <label class="form-check-label" for="sdg4">{{ __('4') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg4" name="sdg4">
                                    <input class="form-check-input" type="checkbox" value="4" <?php if($sdg4[0] == "4"){echo "checked";}else echo ""; ?> id="sdg4" name="sdg4">
                                    <label class="form-check-label" for="sdg5">{{ __('5') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg5" name="sdg5">
                                    <input class="form-check-input" type="checkbox" value="5" <?php if($sdg5[0] == "5"){echo "checked";}else echo ""; ?> id="sdg5" name="sdg5">
                                    <label class="form-check-label" for="sdg6">{{ __('6') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg6" name="sdg6">
                                    <input class="form-check-input" type="checkbox" value="6" <?php if($sdg6[0] == "6"){echo "checked";}else echo ""; ?> id="sdg6" name="sdg6">
                                    <label class="form-check-label" for="sdg7">{{ __('7') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg7" name="sdg7">
                                    <input class="form-check-input" type="checkbox" value="7" <?php if($sdg7[0] == "7"){echo "checked";}else echo ""; ?> id="sdg7" name="sdg7">
                                    <label class="form-check-label" for="sdg8">{{ __('8') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg8" name="sdg8">
                                    <input class="form-check-input" type="checkbox" value="8" <?php if($sdg8[0] == "8"){echo "checked";}else echo ""; ?>  id="sdg8" name="sdg8">
                                    <label class="form-check-label" for="sdg9">{{ __('9') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg9" name="sdg9">
                                    <input class="form-check-input" type="checkbox" value="9" <?php if($sdg9[0] == "9"){echo "checked";}else echo ""; ?> id="sdg9" name="sdg9">
                                    <label class="form-check-label" for="sdg10">{{ __('10') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg10" name="sdg10">
                                    <input class="form-check-input" type="checkbox" value="10" <?php if($sdg10[0] == "10"){echo "checked";}else echo ""; ?> id="sdg10" name="sdg10">
                                    <label class="form-check-label" for="sdg11">{{ __('11') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg11" name="sdg11">
                                    <input class="form-check-input" type="checkbox" value="11" <?php if($sdg11[0] == "11"){echo "checked";}else echo ""; ?> id="sdg11" name="sdg11">
                                    <label class="form-check-label" for="sdg12">{{ __('12') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg12" name="sdg12">
                                    <input class="form-check-input" type="checkbox" value="12" <?php if($sdg12[0] == "12"){echo "checked";}else echo ""; ?> id="sdg12" name="sdg12">
                                    <label class="form-check-label" for="sdg13">{{ __('13') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg13" name="sdg13">
                                    <input class="form-check-input" type="checkbox" value="13" <?php if($sdg13[0] == "13"){echo "checked";}else echo ""; ?> id="sdg13" name="sdg13">
                                    <label class="form-check-label" for="sdg14">{{ __('14') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg14" name="sdg14">
                                    <input class="form-check-input" type="checkbox" value="14" <?php if($sdg14[0] == "14"){echo "checked";}else echo ""; ?> id="sdg14" name="sdg14">
                                    <label class="form-check-label" for="sdg15">{{ __('15') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg15" name="sdg15">
                                    <input class="form-check-input" type="checkbox" value="15" <?php if($sdg15[0] == "15"){echo "checked";}else echo ""; ?> id="sdg15" name="sdg15">
                                    <label class="form-check-label" for="sdg16">{{ __('16') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg16" name="sdg16">
                                    <input class="form-check-input" type="checkbox" value="16" <?php if($sdg16[0] == "16"){echo "checked";}else echo ""; ?> id="sdg16" name="sdg16">
                                    <label class="form-check-label" for="sdg17">{{ __('17') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg17" name="sdg17">
                                    <input class="form-check-input" type="checkbox" value="17" <?php if($sdg17[0] == "17"){echo "checked";}else echo ""; ?> id="sdg17" name="sdg17">
                                </div>
                            </div>
                              <div class="form-group row">
                                <label for="event_datetime" class="col-sm-2 col-form-label text-right">Event date</label>
                                <div class="col-sm-10">
                                  <input type="datetime-local" class="form-control" name="event_datetime" id="event_datetime" value='<?= $event_datetime_final; ?>' required>
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
                                <input type="file" name="fileupload" id="fileupload" value="">
                                <small id="fileupload" class="form-text text-muted" style="float:left"><span class="text-danger">* Required.</span>Please upload one image for your event.</small>
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
                      </div>
</section>
</main>
</body>
</html>

                                
@endsection