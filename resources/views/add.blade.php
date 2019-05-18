@extends('layout')

@section('title', 'Add New Entry | Dianne')

@section('content')
    <form method="post">
        @csrf
        <h1>Add New Item</h1>
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" class="form-control" id="product_name" name="product_name">
        </div>

        <div class="form-group">
            <label for="product_type">Product Type:</label>
            <p>
                <select class="form-control" name="product_type" required>
                    <option value="" selected disabled hidden>Select a Product Type...</option>
                    <option value="Food and Beverage">Food and Beverage</option>
                    <option value="Gowns">Gowns</option>
                    <option value="Lights and Sounds">Lights and Sounds</option>
                    <option value="Photography">Photography</option>
                    <option value="Tuxedo">Tuxedo</option>
                    <option value="Others">Others</option>
                </select>
            </p>
        </div>

        <div class="form-group">
            <label for="phone_no">Price:</label>
            <input type="number" class="form-control" id="product_price" name="product_price">
        </div>
        <button type="submit" class="btn btn-info">Add New Product</button>
    </form>
@endsection