<!DOCTYPE html>
<html>
<head>
    <title>Users Table</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Users Table</h2>
    <table class="table table-bordered yajra-datatable">
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Organisation</th>
            <th>Address</th>
            <th>Description</th>
            <th>SDG</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->projectTitle }}</td>
                <td>{{ $project->projectOrganisation }}</td>
                <td>{{ $project->projectLocation }}</td>
                <td>{{ $project->projectDetails }}</td>
                <td>{{ $project->sdg }}</td>
                <td>
                    <a href="{{ url('user/projects-edit') }}" class="btn btn-primary btn-sm">Edit</a>
                </td>
                <td><a href="{{ route('projects.index') }}" class="btn btn-primary btn-sm"
                       onclick="event.preventDefault();
                           document.getElementById(
                           'delete-form-{{$project->id}}').submit();">
                        Delete
                    </a>
                </td>
                <form id="delete-form-{{$project->id}}"
                      + action="{{route('projects.destroy', $project->id)}}"
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript"></script>
</html>
