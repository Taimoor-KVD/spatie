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
            @can('permission-create')
            <div class="col-md-2">
                <div class="float-right">
                    <a href="create-permission" class="btn btn-success btn-sm">Create Permission</a>
                </div>
            </div>
            @endcan
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>
                        
                        <form action="{{ url('delete-permission/'.$permission->id) }}" method="POST">
                            <a class="btn btn-info btn-sm" href="{{ url('show-permission/'.$permission->id) }}">
                                Show
                            </a>
                            @can('permission-edit')
                                <a class="btn btn-warning btn-sm" href="{{ url('edit-permission/'.$permission->id) }}">
                                    Edit
                                </a>
                            @endcan

                            @csrf
                            @can('permission-delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            @endcan
                        </form>

                    </td>
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