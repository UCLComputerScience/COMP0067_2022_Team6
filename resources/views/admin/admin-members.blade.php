@extends('layouts.mainlayout-admin')


@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Users Table</title>

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
<h2 style="text-align: center;">Users Table</h2>
<table id='usersTable' width='100%'>
    <thead>
    <tr>
        <td>#ID</td>
        <td>#Name</td>
        <td>#Email</td>
    </tr>
    </thead>
</table>

<!-- Script -->
<script type="text/javascript">
    $(document).ready(function(){

        // DataTable
        $('#usersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('users.getUsers')}}",
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'email' },
            ]
        });

    });
</script>
</body>
</html>
@endsection