@extends('layouts.app')

@section('content')
    
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card-title">
                        <h5>View Product</h5>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="float-right">
                        <a class="btn btn-info btn-sm" href="{{ route('products.index') }}"> Back</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $product->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Details:</strong>
                        {{ $product->detail }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection