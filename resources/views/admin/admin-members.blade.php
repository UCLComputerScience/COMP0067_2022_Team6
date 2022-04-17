@extends('layouts.mainlayout-admin')


@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Members</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Members Table</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create Member</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card-body">
        <table class="table table-bordered" id="admin-members-datatable">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Created at</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<!-- boostrap company model -->
<div class="modal fade" id="member-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="MemberModal"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="MemberForm" name="MemberForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Member Name" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Member Email" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Member Address" required="">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save">Save changes
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- end bootstrap model -->
</body>
<script type="text/javascript">
    $(document).ready( function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#admin-members-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('admin-members-datatable') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'address', name: 'address' },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action', orderable: false},
                { data: 'delete', name: 'delete', orderable: false},
            ],
            order: [[0, 'desc']]
        });
    });
    function add(){
        $('#MemberForm').trigger("reset");
        $('#MemberModal').html("Add Member");
        $('#member-modal').modal('show');
        $('#id').val('');
    }
    function editFunc(id){
        $.ajax({
            type:"POST",
            url: "{{ url('edit-member') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                $('#MemberModal').html("Edit Member");
                $('#member-modal').modal('show');
                $('#id').val(res.id);
                $('#name').val(res.name);
                $('#address').val(res.address);
                $('#email').val(res.email);
            }
        });
    }
    function deleteFunc(id){
        if (confirm("Delete Record?") == true) {
            var id = id;
// ajax
            $.ajax({
                type:"POST",
                url: "{{ url('delete-member') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    var oTable = $('#admin-members-datatable').dataTable();
                    oTable.fnDraw(false);
                }
            });
        }
    }
    $('#MemberForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "{{ url('store-member')}}",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#member-modal").modal('hide');
                var oTable = $('#admin-members-datatable').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
            },
            error: function(data){
                console.log(data);
            }
        });
    });
</script>
</html>
@endsection
