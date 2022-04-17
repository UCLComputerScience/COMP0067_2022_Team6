@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Edit & Update User
                            <a href="{{ url('admin-members') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('update-user/'.$user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="">User Name</label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">User Email</label>
                                <input type="text" name="email" value="{{$user->email}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">User Address</label>
                                <input type="text" name="email" value="{{$user->address}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update User</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
