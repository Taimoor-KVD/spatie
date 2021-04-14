@extends('layouts.app')

@section('content')
    
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card-title">
                        <h5>View Role</h5>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="float-right">
                        <a class="btn btn-info btn-sm" href="{{ route('roles.index') }}"> Back</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ ucfirst($role->name) }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Permissions:</strong>
                        @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                                <label class="label label-success"><input type="checkbox" checked onclick="return false;"> {{ ucfirst($v->name) }},</label>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection