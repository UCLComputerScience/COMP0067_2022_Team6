<!-- TODO:
1. Get filtering to work for projects table
2. After filtering is working, copy-paste projects table section and change columns + contents for reports -->
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
                        <h1 class="fw-bolder">Manage Resources</h1>
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
                            </div>
                        </div>


                    <div class="card-header">Resources List</div>

                    <div class="card-body">

                        <table class="table">
                            <tr>
                                <th>Download resource</th>
                                <th>Delete</th>
                            </tr>
                            @forelse ($resources as $resource)
                                <tr>
                                    <td><a href="{{ route('resources.download', $resource->uuid) }}">{{ $resource->cover }}</a></td>
                                    <td><a href="{{ route('admin-members.index') }}" class="btn btn-primary btn-sm"
                                           onclick="event.preventDefault();
                                               document.getElementById(
                                               'delete-form-{{$resource->uuid}}').submit();">
                                            Delete
                                        </a>
                                    </td>
                                    <form id="delete-form-{{$resource->uuid}}"
                                          + action="{{route('resources.destroy', $resource->uuid)}}"
                                          method="post">
                                        @csrf @method('DELETE')
                                    </form>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">No files found.</td>
                                </tr>
                            @endforelse
                        </table>

                    </div>

                        <div class="card">
                            <div class="card-header">Add new resources</div>

                            <div class="card-body">

                                <form action="{{ route('resources.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    File:
                                    <br>
                                    <input type="file" name="cover">

                                    <br><br>

                                    <input type="submit" value=" Upload file " class="btn btn-primary">

                                </form>

                            </div>
                        </div>
                </div>

            </section>
        </main>
    </div>
    </body>
</html>

@endsection
