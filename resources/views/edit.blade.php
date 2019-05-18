@extends('layout')

@section('title', 'Edit Entry | Laravel Database Demo')

@section('content')
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" class="form-control" id="product_name" name="product_name"
                    value="{{ $productEntry->product_name }}">
        </div>
        <div class="form-group">
            <label for="name">Product Type:</label>
            <input type="text" class="form-control" id="product_nametype" name="product_type"
                   value="{{ $productEntry->product_type }}">
        </div>
        <div class="form-group">
            <label for="phone_no">Product Price:</label>
            <input type="text" class="form-control" id="product_price" name="product_price"
                    value="{{ $productEntry->product_price }}">
        </div>
        <button type="submit" class="btn btn-info">Save</button>
        <a class="btn btn-danger" href="/view">Cancel</a>
    </form>
@endsection