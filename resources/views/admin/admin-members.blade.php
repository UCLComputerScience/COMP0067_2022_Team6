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
    <div class="table-responsive">
    <br>
    <h1 class="fw-bolder" style="text-align: center;">Manage Members</h1>
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
            <th>@sortablelink('phone', 'Phone')</th>
            <th>@sortablelink('address', 'Address')</th>
            <th>@sortablelink('country', 'Country')</th>
            <th>@sortablelink('number_of_employees', 'Number of Employees')</th>
            <th>@sortablelink('number_of_volunteers', 'Number of Volunteers')</th>
            <th>@sortablelink('sdg1', 'SDG 1')</th>
            <th>@sortablelink('sdg2', 'SDG 2')</th>
            <th>@sortablelink('sdg3', 'SDG 3')</th>
            <th>@sortablelink('sdg4', 'SDG 4')</th>
            <th>@sortablelink('sdg5', 'SDG 5')</th>
            <th>@sortablelink('sdg6', 'SDG 6')</th>
            <th>@sortablelink('sdg7', 'SDG 7')</th>
            <th>@sortablelink('sdg8', 'SDG 8')</th>
            <th>@sortablelink('sdg9', 'SDG 9')</th>
            <th>@sortablelink('sdg10', 'SDG 10')</th>
            <th>@sortablelink('sdg11', 'SDG 11')</th>
            <th>@sortablelink('sdg12', 'SDG 12')</th>
            <th>@sortablelink('sdg13', 'SDG 13')</th>
            <th>@sortablelink('sdg14', 'SDG 14')</th>
            <th>@sortablelink('sdg15', 'SDG 15')</th>
            <th>@sortablelink('sdg16', 'SDG 16')</th>
            <th>@sortablelink('sdg17', 'SDG 17')</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->country }}</td>
                <td>{{ $user->number_of_employees }}</td>
                <td>{{ $user->number_of_volunteers }}</td>
                <td>{{ $user->sdg1 }}</td>
                <td>{{ $user->sdg2 }}</td>
                <td>{{ $user->sdg3 }}</td>
                <td>{{ $user->sdg4 }}</td>
                <td>{{ $user->sdg5 }}</td>
                <td>{{ $user->sdg6 }}</td>
                <td>{{ $user->sdg7 }}</td>
                <td>{{ $user->sdg8 }}</td>
                <td>{{ $user->sdg9 }}</td>
                <td>{{ $user->sdg10 }}</td>
                <td>{{ $user->sdg11}}</td>
                <td>{{ $user->sdg12 }}</td>
                <td>{{ $user->sdg13 }}</td>
                <td>{{ $user->sdg14 }}</td>
                <td>{{ $user->sdg15 }}</td>
                <td>{{ $user->sdg16 }}</td>
                <td>{{ $user->sdg17 }}</td>
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
</div>

</body>
</html>
@endsection
