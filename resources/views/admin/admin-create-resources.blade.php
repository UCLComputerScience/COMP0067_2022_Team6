@extends('layouts.mainlayout-admin')
@section('content')

<!DOCTYPE html>
<html lang="en">
    <body class="d-flex flex-column h-100">
    <div class="container">
        <main class="flex-shrink-0">
        
            <!-- Page Content-->
            <section class="py-5">
                <div class="text-center mb-5">
                        <h1 class="fw-bolder">Create Resources</h1>
                        <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
 

                        
                        <div class="row mb-3">
                            <label for="number_of_employees" class="col-md-4 col-form-label text-md-end">{{ __('Number of Employees') }}</label>

                            <div class="col-md-6">
                                <input id="number_of_employees" type="text" class="form-control @error('number_of_employees') is-invalid @enderror" name="number_of_employees" value="{{ old('number_of_employees') }}" required autocomplete="number_of_employees" autofocus>

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
                                <input id="number_of_volunteers" type="text" class="form-control @error('number_of_volunteers') is-invalid @enderror" name="number_of_volunteers" value="{{ old('number_of_volunteers') }}" required autocomplete="number_of_volunteers" autofocus>
</section>
</main>
</div>
</body>
</html>
                                
@endsection