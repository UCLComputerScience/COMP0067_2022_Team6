@extends('layouts.mainlayout-logged-in')

<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8" />

@section('content')
<div class="container">
            
            <!-- Page Content-->
            <section class="py-5">
                <div class="text-center mb-5">
                <h1 class="fw-bolder">Past Events</h1>
                 <p class="lead fw-normal text-muted mb-0">Find past events/p>
                </div>
                <div class="text-center mb-5">
                
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
                <table id='usersTable' width='100%'>
                <thead>
                <tr>
                    <td>#ID</td>
                    <td>#Name</td>
                    <td>#Email</td>
                </tr>
                </thead>
                </table>
                
                <!-- Table -->
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
            </section>
            </div>
                </html>
                
                
          
@endsection