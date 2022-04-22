
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


                    <div class="card-header">Resources List</div>

                    <div class="card-body">

                        <form class="form-inline" method="GET">
                            <div class="form-group mb-2">
                                <label for="filter" class="col-sm-2 col-form-label">Search Title</label>
                                <input type="text" class="form-control" id="filter" name="filter" value="{{$filter}}">
                            </div>
                            <button type="submit" class="btn btn-default mb-2">Filter</button>
                        </form>

                        <table class="table">
                            <tr>
                                <th>@sortablelink('resource_title', 'Title')</th>
                                <th>@sortablelink('resource_description', 'Description')</th>
                                <th>@sortablelink('cover', 'Download resource')</th>
                                <th>@sortablelink('resource_sdg', 'Language')</th>
                                <th>@sortablelink('resource_language', 'SDG')</th>
                                <th>@sortablelink('resource_added_date', 'Date Added')</th>
                                <th>Delete</th>
                            </tr>
                            @forelse ($resources as $resource)
                                <tr>
                                    <td>{{ $resource->resource_title }}</td>
                                    <td>{{ $resource->resource_description }}</td>
                                    <td><a href="{{ route('resources.download', $resource->uuid) }}">{{ $resource->cover }}</a></td>
                                    <td>{{ $resource->resource_language }}</td>
                                    <td>{{ $resource->resource_sdg }}</td>
                                    <td>{{ $resource->resource_added_date}}</td>
                                    <td><a href="{{ route('resources.index') }}" class="btn btn-primary btn-sm"
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

                                    Title:
                                    <br>
                                    <input type="text" name="resource_title" class="form-control">

                                    <br>

                                    Description:
                                    <br>
                                    <input type="text" name="resource_description" class="form-control">

                                    <br>

                                    Language:
                                    <br>
                                    <input type="text" name="resource_language" class="form-control">

                                    <br>

                                    SDG:
                                    <br>
                                    <input type="text" name="resource_sdg" class="form-control">

                                    <br>

                                    Date:
                                    <br>
                                    <input type="text" name="resource_added_date" placeholder="e.g. 2022-01-01" class="form-control">

                                    <br>

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
