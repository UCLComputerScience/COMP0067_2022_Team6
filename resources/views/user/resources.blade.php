@extends('layouts.mainlayout-logged-in')

@section('content')
<!DOCTYPE html>
<?php
$resource_id = Request::segment(2);
$this_resource = DB::Table('resources')->select('resource_id','id','resource_title','resource_language','resource_sdg')->where('resource_id',$resource_id)->get();
$resource_title = $this_resource->pluck('resource_title');
$sdg = $this_resource->pluck('resource_sdg');

$user_id = Auth::id();
?>
<html lang="en">
    <head>
        <style>
            tr td:nth-child(1){
            white-space: nowrap;
            }
            tr td:nth-child(3){
                white-space: nowrap;
            }
            tr td:nth-child(5){
                white-space: nowrap;
            }
            tr td:nth-child(7){
                white-space: nowrap;
            }
            tr th:nth-child(6){
                white-space: nowrap;
            }
        </style>

    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <br><br>
            <!-- Page Content-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                        <h1 class="fw-bolder">Resources</h1>
                        <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
                </div>
            </section>

        </main>

    </body>
</html>
@endsection
