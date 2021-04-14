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
      <div class="col-lg-10">
        <div class="card-title">
            <h5>Users Management</h5>
        </div>
      </div>
      <div class="col-lg-2">
        <div class="float-right">
            <a class="btn btn-success btn-sm" href="{{ route('users.create') }}">Create User</a>
        </div>
      </div>
    </div>
  </div>
  
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Roles</th>
          <th width="280px">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $key => $user)
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                  <label class="badge badge-info">{{ ucfirst($v) }}</label>
                @endforeach
              @endif
            </td>
            <td>
              <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}">
                Show
              </a>
              @can('user-edit')
              <a class="btn btn-warning btn-sm" href="{{ route('users.edit',$user->id) }}">
                Edit
              </a>
              @endcan
              @can('user-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}
              @endcan
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="card-footer">
    {!! $data->render() !!}
  </div>
</div>
@endsection