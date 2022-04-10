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
                                <label for="sdg" class="col-sm-2 col-form-label text-right">SDGs</label>
                        
                                <div class="col-md-10">
                                    <label class="form-check-label" for="sdg1">{{ __('1') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg1" name="sdg1">
                                    <input class="form-check-input" type="checkbox" value="1" id="sdg1" name="sdg1">
                                    <label class="form-check-label" for="sdg2">{{ __('2') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg2" name="sdg2">
                                    <input class="form-check-input" type="checkbox" value="2" id="sdg2" name="sdg2">
                                    <label class="form-check-label" for="sdg3">{{ __('3') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg3" name="sdg3">
                                    <input class="form-check-input" type="checkbox" value="3" id="sdg3" name="sdg3">
                                    <label class="form-check-label" for="sdg4">{{ __('4') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg4" name="sdg4">
                                    <input class="form-check-input" type="checkbox" value="4" id="sdg4" name="sdg4">
                                    <label class="form-check-label" for="sdg5">{{ __('5') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg5" name="sdg5">
                                    <input class="form-check-input" type="checkbox" value="5" id="sdg5" name="sdg5">
                                    <label class="form-check-label" for="sdg6">{{ __('6') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg6" name="sdg6">
                                    <input class="form-check-input" type="checkbox" value="6" id="sdg6" name="sdg6">
                                    <label class="form-check-label" for="sdg7">{{ __('7') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg7" name="sdg7">
                                    <input class="form-check-input" type="checkbox" value="7" id="sdg7" name="sdg7">
                                    <label class="form-check-label" for="sdg8">{{ __('8') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg8" name="sdg8">
                                    <input class="form-check-input" type="checkbox" value="8" id="sdg8" name="sdg8">
                                    <label class="form-check-label" for="sdg9">{{ __('9') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg9" name="sdg9">
                                    <input class="form-check-input" type="checkbox" value="9" id="sdg9" name="sdg9">
                                    <label class="form-check-label" for="sdg10">{{ __('10') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg10" name="sdg10">
                                    <input class="form-check-input" type="checkbox" value="10" id="sdg10" name="sdg10">
                                    <label class="form-check-label" for="sdg11">{{ __('11') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg11" name="sdg11">
                                    <input class="form-check-input" type="checkbox" value="11" id="sdg11" name="sdg11">
                                    <label class="form-check-label" for="sdg12">{{ __('12') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg12" name="sdg12">
                                    <input class="form-check-input" type="checkbox" value="12" id="sdg12" name="sdg12">
                                    <label class="form-check-label" for="sdg13">{{ __('13') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg13" name="sdg13">
                                    <input class="form-check-input" type="checkbox" value="13" id="sdg13" name="sdg13">
                                    <label class="form-check-label" for="sdg14">{{ __('14') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg14" name="sdg14">
                                    <input class="form-check-input" type="checkbox" value="14" id="sdg14" name="sdg14">
                                    <label class="form-check-label" for="sdg15">{{ __('15') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg15" name="sdg15">
                                    <input class="form-check-input" type="checkbox" value="15" id="sdg15" name="sdg15">
                                    <label class="form-check-label" for="sdg16">{{ __('16') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg16" name="sdg16">
                                    <input class="form-check-input" type="checkbox" value="16" id="sdg16" name="sdg16">
                                    <label class="form-check-label" for="sdg17">{{ __('17') }}</label>
                                    <input class="form-check-input" type="hidden" value="" id="sdg17" name="sdg17">
                                    <input class="form-check-input" type="checkbox" value="17" id="sdg17" name="sdg17">
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
                      </div>
</section>
</main>
</body>
</html>
                       
@endsection