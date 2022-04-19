@extends('layouts.mainlayout-admin')


@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Manage Members</title>

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">

    <!-- Datatables CSS CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Datatables JS CDN -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

</head>
<body>

<div class="container mt-5">
    <br>
    <h1 style="text-align: center;">Manage Members</h1>
    <form class="form-inline" method="GET">
        <div class="form-group mb-2">
            <label for="filter" class="col-sm-2 col-form-label">Filter</label>
            <input type="text" class="form-control" id="filter" name="filter" value="{{$filter}}">
        </div>
        <button type="submit" class="btn btn-default mb-2">Filter</button>
    </form>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>@sortablelink('id', 'Id')</th>
            <th>@sortablelink('name', 'Name')</th>
            <th>@sortablelink('email', 'Email')</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ url('edit-user/'.$user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                </td>
                <td><a href="{{ route('admin-members.index') }}" class="btn btn-primary btn-sm"
                       onclick="event.preventDefault();
                           document.getElementById(
                           'delete-form-{{$user->id}}').submit();">
                        Delete
                    </a>
                </td>
                <form id="delete-form-{{$user->id}}"
                      + action="{{route('admin-members.destroy', $user->id)}}"
                      method="post">
                    @csrf @method('DELETE')
                </form>
            </tr>
        @endforeach
        </thead>
        <tbody>
        </tbody>
    </table>
    {!! $users->appends(Request::except('page'))->render() !!}
</div>

</body>
</html>
@endsection
