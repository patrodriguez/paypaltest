@extends('layout')
@section('title', 'View | Laravel Database Demo')
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-success">{{ Session::get('error') }}</div>
    @endif

    <h1>View Products</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Type</th>
                <th>Price</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $productList as $productEntry )
                <tr>
                    <td><a href="/view/{{ $productEntry->id }}">{{ $productEntry->product_name }}</a></td>
                    <td>{{ $productEntry->product_type }}</td>
                    <td>{{ $productEntry->product_price }}</td>
                    <td>
                        <a href="/edit/{{ $productEntry->id }}">Edit</a> |
                        <a href="/delete/{{ $productEntry->id }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection