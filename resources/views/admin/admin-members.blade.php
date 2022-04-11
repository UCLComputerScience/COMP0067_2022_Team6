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

    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Datatables JS CDN -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

</head>
<body>

<div class="container mt-5">
    <h2 style="text-align: center;">Users Table</h2>
    <table class="table table-bordered yajra-datatable">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
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
</div>

</body>
</html>
@endsection
