<!-- TODO: 
1. Get filtering to work for projects table
2. After filtering is working, copy-paste projects table section and change columns + contents for reports -->
@extends('layouts.mainlayout-logged-in')

@section('content')
<head>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<!DOCTYPE html>
<html lang="en">
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <br><br><br>
            <!-- Page Content-->
            <section class="py-5">
                <div class="text-center mb-5">
                        <h1 class="fw-bolder">Create Project</h1>
                        <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
 

                        <?php 
                      $username = Session::get('key');
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
                                  <input type="text" class="form-control" name="projectTitle" id="projectTitle" required minlength="10" placeholder="e.g. Well Building - Moldova">
                                  <small id="titleHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> The title of your project (minimum 10 characters).</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="auctionTitle" class="col-sm-2 col-form-label text-right">Organisation</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="projectOrganisation" id="projectOrganisation" required minlength="10" placeholder="e.g. WaterAid">
                                  <small id="titleHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> The organisation of your project (minimum 10 characters).</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="auctionTitle" class="col-sm-2 col-form-label text-right">Address Line 1</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="projectLocation" id="projectLocation" required minlength="5" placeholder="">
                                  <small id="titleHelp" class="form-text text-muted"><span class="text-danger">* Required.</span>(maximum 5 characters)</small>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                                
                                <div class="col-md-6">
                                    <input id="address" type="text" name="address"  class="form-control @error('name') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Enter Address">
                                </div>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="col-md-6">
                              <input id="latitude" type="hidden"  value="" name="latitude" class="form-control">
                          </div>
                      
                          {{-- <div class="form-group row mb-3" id="longtitudeArea"> --}}
                              {{-- <label for="longtitudeArea" class="col-md-4 col-form-label text-md-end"></label> --}}
                              <div class="col-md-6">
                              <input id="longitude" name="longitude" type="hidden" value=""   class="form-control">
                              <div class="col-md-6">
                              <input id="country" name="country" type="hidden" value="" class="form-control">
                          </div>
                          @error('address')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                              <div class="form-group row">
                                <label for="auctionTitle" class="col-sm-2 col-form-label text-right">City</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="projectCity" id="projectCity" placeholder="">
                                  <small id="titleHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="auctionTitle" class="col-sm-2 col-form-label text-right">Country</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="projectCountry" id="projectCountry" placeholder="">
                                  <small id="titleHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="auctionDetails" class="col-sm-2 col-form-label text-right">Description</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control" name="projectDetails" id="projectDetails" rows="4"></textarea>
                                  <small id="detailsHelp" class="form-text text-muted">Detailed description of your project to give insight to members.</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="sdg" class="col-sm-2 col-form-label text-right">SDG</label>
                                <div class="col-sm-10">
                                  <select class="form-control" name="sdg" id="sdg" multiple> <!-- The code under this should auto-update, now working!! -->
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
                              <div class="row mb-6">
                                <div class="col-md-14">
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
                                <input type="file" name="uploadfile"  id="uploadfile" value="" style="float:left">
                               <br>
                                <small id="filesToUploadHelp" class="form-text text-muted" style="float:left"><span class="text-danger">* Required. </span>Please upload one to three images for your project.</small>
                              </div>
                              </div>
                              <button type="submit" id="submit" name="submit" class="btn btn-primary form-control">Create Project</button>
                            </form>
                          </div>
                        </div>
                      </div>
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
                                // $('input[name="country"]').val(place.country.long_name); 

                                $("#latitudeArea").removeClass("d-none");
                                $("#longtitudeArea").removeClass("d-none");
                                $("#country").removeClass("d-none");
                            });
                        }
                    </script>
                </body>
                </html>
                {{-- Google autocomplete --}}
                      </div>
</div>
</section>
</main>
</body>
</html>

                       
@endsection