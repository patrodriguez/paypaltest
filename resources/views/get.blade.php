@extends('layout')

@section('title', 'View Entry | Dianne')

@section('content')

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
            <div class="col-9"><a class="btn btn-info" href="/view">Go Back</a></div>
        </div>
@endsection