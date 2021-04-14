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
                        <h5>Products</h5>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="float-right">
                        @can('product-create')
                            <a class="btn btn-success btn-sm" href="{{ route('products.create') }}"> Create Product</a>
                        @endcan
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
                        <th>Details</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>    
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->detail }}</td>
                        <td>
                            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('products.show',$product->id) }}">Show</a>
                                @can('product-edit')
                                <a class="btn btn-warning btn-sm" href="{{ route('products.edit',$product->id) }}">Edit</a>
                                @endcan

                                @csrf
                                @method('DELETE')
                                @can('product-delete')
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
            {!! $products->links() !!}
        </div>
    
    </div>
@endsection