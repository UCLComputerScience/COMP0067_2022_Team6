@extends('layouts.mainlayout-logged-in')

@section('content')




<!DOCTYPE html>
<html lang="en">
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <br><br><br>
            <!-- Page Content-->
            <section class="py-5">
                <div class="text-center mb-5">
 
                        <?php 
                      $project_id = Request::segment(2);
                      $this_project = DB::Table('projects')->select('project_id','projectTitle','projectLocation', 'projectCity', 'projectCountry', 'projectDetails','projectEndDate','sdg','image_name', 'address', 'latitude', 'longitude', 'country', 'projectOrganisation', 'projectValue', 'fundingRequired',
                      'sdg1', 'sdg2', 'sdg3', 'sdg4', 'sdg5', 'sdg6', 'sdg7', 'sdg8', 'sdg9', 'sdg10', 'sdg11', 'sdg12', 'sdg13', 'sdg14', 'sdg15', 'sdg16', 'sdg17')
                      ->where('project_id',$project_id)->get();
                      $project_title = $this_project->pluck('projectTitle');
                      $project_location = $this_project->pluck('projectLocation');
                      $address = $this_project->pluck('address');
                      $latitude = $this_project->pluck('latitude');
                      $longitude = $this_project->pluck('longitude');
                      $country = $this_project->pluck('country');
                      $project_details = $this_project->pluck('projectDetails');
                      $project_end_date = $this_project->pluck('projectEndDate');
                      $project_value = $this_project->pluck('projectValue');
                      $project_funding_required = $this_project->pluck('fundingRequired');
                      $project_organisation = $this_project->pluck('projectOrganisation');
                      $project_description = $this_project->pluck('projectDetails');
                      $image_name = $this_project->pluck('image_name');
                      $sdg1 = $this_project->pluck('sdg1');
                      $sdg2 = $this_project->pluck('sdg2');
                      $sdg3 = $this_project->pluck('sdg3');
                      $sdg4 = $this_project->pluck('sdg4');
                      $sdg5 = $this_project->pluck('sdg5');
                      $sdg6 = $this_project->pluck('sdg6');
                      $sdg7 = $this_project->pluck('sdg7');
                      $sdg8 = $this_project->pluck('sdg8');
                      $sdg9 = $this_project->pluck('sdg9');
                      $sdg10 = $this_project->pluck('sdg10');
                      $sdg11 = $this_project->pluck('sdg11');
                      $sdg12 = $this_project->pluck('sdg12');
                      $sdg13 = $this_project->pluck('sdg13');
                      $sdg14 = $this_project->pluck('sdg14');
                      $sdg15 = $this_project->pluck('sdg15');
                      $sdg16 = $this_project->pluck('sdg16');
                      $sdg17 = $this_project->pluck('sdg17');
                     
                      function strip_text($url){
                        $url = str_replace(array('[',']','"'), '', $url);
                        $url = stripslashes($url);
                
                        return $url;
                    }

                    $project_end_date_stripped = strip_text($project_end_date);
                    $project_end_date_final = str_replace(array(' 00:00:00'), '', $project_end_date_stripped);



                      ?>
                      
                  
                    
                      <div class="container">
                      <br />
                      <br />
                      <!-- Edit project form -->
                      <div style="max-width: 800px; margin: 10px auto">
                      <h1 class="fw-bolder">Edit Your Project: <?php echo strip_text($project_title); ?> </h1>
                        <div class="card">
                          <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="/projects-edit-result">
                                @csrf <!-- {{ csrf_field() }} -->
                                <input type="hidden" name="project_id" value="<?php echo $project_id ?>">
                                <div class="form-group row">
                                <label for="projectTitle" class="col-sm-2 col-form-label text-right">Project Title</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php if (isset($project_title[0])){ print_r($project_title[0]);} else { print_r(""); }?>" name="projectTitle" id="projectTitle" required minlength="10" placeholder="e.g. Well Building - Moldova">
                                  <small id="titleHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> The title of your project (minimum 10 characters).</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="projectOrganisation" class="col-sm-2 col-form-label text-right">Organisation</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php if (isset($project_organisation[0])){ print_r($project_organisation[0]);} else { print_r(""); } ?>" name="projectOrganisation" id="projectOrganisation" required minlength="10" placeholder="e.g. WaterAid">
                                  <small id="titleHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> The organisation of your project (minimum 10 characters).</small>
                                </div>
                              </div>
                              <div class="form-group row mb-3">
                                <label for="address" class="col-sm-2 col-form-label text-right">{{ __('Address') }}</label>
                                
                                <div class="col-sm-10">
                                    <input id="address" type="text" name="address"  class="form-control @error('name') is-invalid @enderror" name="address" value="<?php print_r($address[0]); ?>" required autocomplete="address" autofocus placeholder="Enter Address">
                                </div>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="col-md-6">
                              <input id="latitude" type="hidden" name="latitude" value="<?php print_r($latitude[0]); ?>" class="form-control">                              
                          </div>

                          {{-- <div class="form-group row mb-3" id="longtitudeArea"> --}}
                              {{-- <label for="longtitudeArea" class="col-md-4 col-form-label text-md-end"></label> --}}
                              <div class="col-md-6">
                              <input id="longitude" name="longitude" type="hidden" value="<?php print_r($longitude[0]); ?>"   class="form-control">
                              <div class="col-md-6">
                              <input id="country" name="country" type="hidden" value="<?php print_r($country[0]);?>" class="form-control">
                          </div>
                          @error('address')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                              <div class="form-group row">
                                <label for="countryDetails" class="col-sm-2 col-form-label text-right">Description</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control" name="projectDetails" value="<?php if (isset($project_description[0])){ print_r($project_description[0]);} else { print_r(""); } ?>" id="projectDetails" rows="4"><?php if (isset($project_description[0])){ print_r($project_description[0]);} else { print_r(""); } ?></textarea>
                                  <small id="detailsHelp" class="form-text text-muted">Detailed description of your project to give insight to members.</small>
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
                                <label for="projectValue" class="col-sm-2 col-form-label text-right">Project Value</label>
                                <div class="col-sm-10">
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">??</span>
                                    </div>
                                    <input type="number" min="0" class="form-control" name="projectValue" id="projectValue" value="<?php if (isset($project_value[0])){ print_r($project_value[0]);} else { print_r(""); } ?>" required>
                                  </div>
                                  <small id="startBidHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> How much you expect your project to cost in total.</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="fundingRequired" class="col-sm-2 col-form-label text-right">Funding Required</label>
                                <div class="col-sm-10">
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">??</span>
                                    </div>
                                    <input type="number" min="0" class="form-control" name="fundingRequired" id="fundingRequired" value="<?php if (isset($project_funding_required[0])){ print_r($project_funding_required[0]);} else { print_r(""); } ?>" required>
                                  </div>
                                  <small id="reservePriceHelp" class="form-text text-muted">Optional. Indicate any funding required</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="projectEndDate" class="col-sm-2 col-form-label text-right">End date</label>
                                <div class="col-sm-10">
                                  <input type="date" class="form-control" name="projectEndDate" id="projectEndDate" value='<?= $project_end_date_final; ?>' required>
                                  <small id="endDateHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> Expected end date of the project.</small>
                                </div>
                              </div>
                              <div class="form-group row">
                              <label for="filesToUpload" class="col-sm-2 col-form-label text-right">Image upload</label>
                              <div class="col-sm-10">
                                <input type="file" name="uploadfile"  id="uploadfile" value="<?php echo $image_name ?>" style="float:left">
                               <br>
                                <small id="uploadfile" class="form-text text-muted" style="float:left"><span class="text-danger">* Required. </span>Please upload one to three images for your project.</small>
                              </div>
                              </div>


                              <button type="submit" id="submit" name="submit" class="btn btn-primary form-control">Edit Project</button>
                            
                              {{-- Google  --}}
                 <body>

                        {{-- <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                   --}}
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
                  
                    <script type="text/javascript"
                        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places" ></script>
                    <script>
                        $(document).ready(function () {
                            $("#latitudeArea").addClass("d-none");
                            $("#longtitudeArea").addClass("d-none");
                            $("#country").addClass("d-none");
                        });
                    </script>
                    <script>

                        google.maps.event.addDomListener(window, 'load', initialize);
                  
                        function initialize() {
                            var input = document.getElementById('address');
                            var autocomplete = new google.maps.places.Autocomplete(input);
                  
                            autocomplete.addListener('place_changed', function () {
                                var place = autocomplete.getPlace();
                                $('#latitude').val(place.geometry['location'].lat());
                                $('#longitude').val(place.geometry['location'].lng());
                                $('#country').val(place.address_components.slice(-1)[0].long_name); 

                                $("#latitudeArea").removeClass("d-none");
                                $("#longtitudeArea").removeClass("d-none");
                                $("#country").removeClass("d-none");
                            });
                        }
                    </script>
                </body>
                <br>
                </html>
                {{-- Google autocomplete --}}
                      </div>
</div>
                      </form>
</section>
</main>
</body>
</html>

                       
@endsection