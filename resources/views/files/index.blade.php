
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Files list</div>

                    <div class="card-body">

                        <a href="{{ route('files.create') }}" class="btn btn-primary">Add new file</a>
                        <br /><br />

                        <table class="table">
                            <tr>
                                <th>Title</th>
                                <th>Download file</th>
                            </tr>
                            @forelse ($files as $file)
                                <tr>
                                    <td>{{ $file->title }}</td>
                                    <td><a href="{{ route('files.download', $file->uuid) }}">{{ $file->cover }}</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">No files found.</td>
                                </tr>
                            @endforelse
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
