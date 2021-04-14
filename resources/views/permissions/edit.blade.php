@extends('layouts.app')

@section('content')
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card-title">
                        <h5>Edit Permission</h5>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="float-right">
                        <a class="btn btn-info btn-sm" href="{{ url('permissions') }}"> Back</a>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ url('update-permission/'.$permission->id) }}" method="POST">
            @csrf
            
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" value="{{ $permission->name }}" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Guard Name:</strong>
                            <input type="text" name="guard_name" value="{{ $permission->guard_name }}" class="form-control" placeholder="Guard name">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                </div>
            </div>

        </form>
    </div>
@endsection