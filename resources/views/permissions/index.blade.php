@extends('layouts.app')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h5 class="card-title">Permissions</h5>
            </div>
            <div class="col-md-2">
                <a href="create-permission" class="float-right btn btn-primary">Add</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <!-- <th width="280px">Action</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $permission->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {!! $permissions->links() !!}
    </div>
</div>
@endsection