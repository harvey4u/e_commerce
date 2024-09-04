@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Create New Product</h1>

        <!-- Display flash message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
            @csrf

            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ old('product_name') }}">
                @error('product_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="text" class="form-control" id="stock" name="stock" value="{{ old('stock') }}">
                @error('stock')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Product Image:</label>
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-save">Save Product</button>
                <a href="{{ route('products.index') }}" class="btn btn-view">View Products</a>
            </div>
        </form>
    </div>
@endsection

<style>
    body {
        background-color: #f4f4f4; /* Light gray background for the page */
        color: #333; /* Dark text color */
    }

    .container {
        max-width: 60%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ff6347; /* Tomato Border Color */
        border-radius: 10px;
        background-color: #fff; /* White background for container */
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #ff6347; /* Tomato color for heading */
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        text-align: left;
        margin-bottom: 5px;
        color: #333; /* Dark text color for labels */
    }

    .form-control {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        border-radius: 5px;
        border: 1px solid #ff6347; /* Tomato border color */
        color: #333; /* Dark text color for input */
        background-color: #f9f9f9; /* Light background for input */
    }

    .btn-save {
        background-color: #ff0000; /* Red color for Save Product button */
        border: none;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 1em;
        transition: background-color 0.3s;
        text-decoration: none; /* Remove underline from link */
        display: inline-block;
    }

    .btn-save:hover {
        background-color: #cc0000; /* Darker red on hover */
    }

    .btn-view {
        background-color: #000000; /* Black color for View Products button */
        border: none;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 1em;
        transition: background-color 0.3s;
        text-decoration: none; /* Remove underline from link */
        display: inline-block;
        margin-left: 10px;
    }

    .btn-view:hover {
        background-color: #333333; /* Darker black on hover */
    }

    .alert-success {
        margin-top: 20px;
        padding: 10px;
        border-radius: 5px;
        background-color: #d4edda; /* Light green background for success alert */
        border: 1px solid #c3e6cb; /* Light green border for success alert */
        color: #155724; /* Dark green text color for success alert */
    }

    .text-danger {
        color: #d9534f; /* Red color for error text */
        font-size: 0.9em;
    }
</style>
