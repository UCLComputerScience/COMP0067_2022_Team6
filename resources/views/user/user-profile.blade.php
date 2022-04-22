@extends('layouts.mainlayout-logged-in')

@section('content')

{{-- Autocomplete --}}
<?php 
    $userid = Auth::id();
    $my_details = DB::Table('users')->select('name', 'org', 'email', 'phone', 'number_of_employees', 'number_of_volunteers', 'website', 'address', 'latitude', 'longitude', 'city', 'country', 'postcode', 
    'sdg1', 'sdg2', 'sdg3', 'sdg4', 'sdg5', 'sdg6', 'sdg7', 'sdg8', 'sdg9', 'sdg10', 'sdg11', 'sdg12', 'sdg13', 'sdg14', 'sdg15', 'sdg16', 'sdg17' )
    ->where('id', $userid)->get();

    $name = $my_details->pluck('name');
    $email = $my_details->pluck('email');
    $org = $my_details->pluck('org');
    $phone = $my_details->pluck('phone');
    $employees = $my_details->pluck('number_of_employees');
    $volunteers = $my_details->pluck('number_of_volunteers');
    $website = $my_details->pluck('website');
    $address = $my_details->pluck('address');
    $latitude = $my_details->pluck('latitude');
    $longitude = $my_details->pluck('longitude');
    $city = $my_details->pluck('city');
    $country = $my_details->pluck('country');
    $postcode = $my_details->pluck('postcode');
    $sdg1 = $my_details->pluck('sdg1');
    $sdg2 = $my_details->pluck('sdg2');
    $sdg3 = $my_details->pluck('sdg3');
    $sdg4 = $my_details->pluck('sdg4');
    $sdg5 = $my_details->pluck('sdg5');
    $sdg6 = $my_details->pluck('sdg6');
    $sdg7 = $my_details->pluck('sdg7');
    $sdg8 = $my_details->pluck('sdg8');
    $sdg9 = $my_details->pluck('sdg9');
    $sdg10 = $my_details->pluck('sdg10');
    $sdg11 = $my_details->pluck('sdg11');
    $sdg12 = $my_details->pluck('sdg12');
    $sdg13 = $my_details->pluck('sdg13');
    $sdg14 = $my_details->pluck('sdg14');
    $sdg15 = $my_details->pluck('sdg15');
    $sdg16 = $my_details->pluck('sdg16');
    $sdg17 = $my_details->pluck('sdg17');


    function strip_text($url){
        $url = str_replace(array('[',']','"'), '', $url);
        $url = stripslashes($url);

        return $url;}

?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  
<head>
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Google Autocomplete Address Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
{{-- Autcomplete --}}
<div class="container" style="margin-bottom:3%">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mb-5">
                <br>
                <br>
                <br>
                <br>
                <br>
                        <h1 class="fw-bolder">My Profile</h1>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="/user-profile-result">
                        @csrf
                        <input type="hidden" name="id" value="<?php echo $userid ?>">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="<?php print_r($name[0]); ?>" required autocomplete="name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="<?php print_r($email[0]); ?>" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="org" class="col-md-4 col-form-label text-md-end">{{ __('Name of Organisation') }}</label>

                            <div class="col-md-6">
                                <input id="org" type="text" class="form-control @error('org') is-invalid @enderror" name="org" value="<?php print_r($org[0]); ?>" required autocomplete="org" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        


                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('name') is-invalid @enderror" name="phone" value="<?php print_r($phone[0]); ?>" required autocomplete="phone" autofocus>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                            <div class="form-group row mb-3">
                                <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                                
                                <div class="col-md-6">
                                    <input id="address" type="text" name="address"  class="form-control @error('name') is-invalid @enderror" name="address" required autocomplete="address" autofocus value="<?php print_r($address[0]); ?>">
                                </div>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                                
                                {{-- <div class="form-group row mb-3" id="latitudeArea"> --}}
                                    {{-- <label for="latitudeArea" class="col-md-4 col-form-label text-md-end"></label> --}}
                                    <div class="col-md-6">
                                    <input id="latitude" type="hidden"  value="" name="latitude" class="form-control" >
                                </div>
                            
                                {{-- <div class="form-group row mb-3" id="longtitudeArea"> --}}
                                    {{-- <label for="longtitudeArea" class="col-md-4 col-form-label text-md-end"></label> --}}
                                    <div class="col-md-6">
                                    <input id="longitude" name="longitude" type="hidden" value=""  class="form-control">
                                    <div class="col-md-6">
                                    <input id="country" name="country" type="hidden" value="<?php print_r($country[0]); ?>" class="form-control">
                                </div>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
{{-- 
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address Line 1') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('name') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        

                        <div class="row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('name') is-invalid @enderror" name="city" value="" required autocomplete="city" autofocus>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>         --}}

                        {{-- <div class="row mb-3">
                            <label for="location_country" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label> --}}

                            {{-- <div class="col-md-6"> --}}
                                {{-- <input name="location_country" id="location_country" type="text" class="form-control @error('name') is-invalid @enderror" name="location_country" value="<?php print_r($country[0]); ?>" required autocomplete="location_country" autofocus>

                                @error('location_country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                       
                        {{-- <div class="row mb-3">
                            <label for="postcode" class="col-md-4 col-form-label text-md-end">{{ __('Postcode') }}</label>

                            <div class="col-md-6">
                                <input id="postcode" type="text" class="form-control @error('name') is-invalid @enderror" name="postcode" value="<?php print_r($postcode[0]); ?>" autocomplete="postcode" autofocus>

                                @error('postcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="row mb-3">
                            <label for="number_of_employees" class="col-md-4 col-form-label text-md-end">{{ __('Number of Employees') }}</label>

                            <div class="col-md-6">
                                <input id="number_of_employees" type="number" min="0" class="form-control @error('number_of_employees') is-invalid @enderror" name="number_of_employees" value="<?php print_r($employees[0]); ?>" autocomplete="number_of_employees" autofocus>

                                @error('number_of_employees')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="number_of_volunteers" class="col-md-4 col-form-label text-md-end">{{ __('Number of Volunteers') }}</label>

                            <div class="col-md-6">
                                <input id="number_of_volunteers" type="number" min="0" class="form-control @error('number_of_volunteers') is-invalid @enderror" name="number_of_volunteers" value="<?php print_r($volunteers[0]); ?>" autocomplete="number_of_volunteers" autofocus>

                                @error('number_of_volunteers')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="website" class="col-md-4 col-form-label text-md-end">{{ __('Website') }}</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control @error('name') is-invalid @enderror" name="website" value="<?php print_r($website[0]); ?>" autocomplete="website" autofocus>

                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label for="SDGs" class="col-md-4 col-form-label text-md-end"><a href="https://sdgs.un.org/goals" target="_blank">SDGs</a>
                            </label> 
                            <div class="col-md-6">
                            {{-- <div class="col-md-6">
                                <select class="form-control" name="sdg" id="sdg" required> 
                                    <option value="">Choose an option</option>
                                      <?php 
                                    $result = DB::table('categories')->get();    ?>
                                    @foreach ($result as $row)
                                        <option value="{{$row->categoryID}}">{{$row->categoryName}}</option>
                                    @endforeach 
                                      </select>
                                @error('SDGs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                          
                            {{-- SDGS  --}}
                     
                            <div class="row mb-6">
                                <div class="col-md-14">
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
                        </div>
                            {{-- SDGS  --}}
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="submit" id="submit" class="btn btn-primary">
                                    {{ __('Update my profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
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
                </html>
                {{-- Google autocomplete --}}
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</script>
@endsection
