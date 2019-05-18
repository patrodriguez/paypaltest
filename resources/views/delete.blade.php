@extends('layout')

@section('title', 'Delete Entry | Laravel Database Demo')

@section('content')
        <div class="alert alert-warning">
            <p><b>Warning</b> Are you sure you want to delete this entry?</p>
        </div>
        <div class="row">
            <div class="col-3">Product Name:</div>
            <div class="col-9"><b>{{ $productEntry->product_name }}</b></div>
        </div>
        <div class="row">
            <div class="col-3">Product Type:</div>
            <div class="col-9"><b>{{ $productEntry->product_type }}</b></div>
        </div>
        <div class="row">
            <div class="col-3">Price:</div>
            <div class="col-9"><b>{{ $productEntry->product_price }}</b></div>
        </div>
        <div class="row">
            <div class="col-3">&nbsp;</div>
            <div class="col-9">
                <form method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <a class="btn btn-info" href="/view">Go Back</a>
                </form>
            </div>
        </div>
@endsection