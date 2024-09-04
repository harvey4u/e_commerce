@extends('layouts.app')

@section('styles')
<style>
    body {
        background: url('https://ibb.co/fk3XK6S') no-repeat center center fixed;
        background-size: cover;
        color: #fff;
        font-family: 'Handjet', sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        background-color: rgba(0, 0, 0, 0.8); /* Semi-transparent background */
        border-radius: 15px;
        padding: 30px;
        max-width: 800px;
        margin: 50px auto; /* Center form horizontally */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.6);
        color: #fff;
    }

    h1 {
        color: #40E0D0; /* Turquoise color */
        text-align: center;
        text-transform: uppercase;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        color: #ff6347; /* Tomato color for labels */
        font-size: 1.2em;
        margin-bottom: 0.5rem;
    }

    .form-control {
        width: 100%;
        padding: 15px;
        border-radius: 5px;
        border: 1px solid #40E0D0; /* Light turquoise border */
        background-color: rgba(255, 255, 255, 0.9);
        color: #000;
        font-size: 1rem;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .form-control-file {
        width: 100%;
        padding: 15px;
        font-size: 1rem;
        border: 1px solid #40E0D0; /* Light turquoise border */
        background-color: rgba(255, 255, 255, 0.9);
        color: #000;
        border-radius: 5px;
    }

    .form-control-textarea {
        width: 100%;
        padding: 15px;
        border-radius: 5px;
        border: 1px solid #40E0D0; /* Light turquoise border */
        background-color: rgba(255, 255, 255, 0.9);
        color: #000;
        font-size: 1rem;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        min-height: 200px; /* Increased height for better visibility */
    }

    .btn-primary {
        background-color: #ff6347; /* Tomato */
        color: #fff;
        border: none;
        width: 100%;
        padding: 15px;
        border-radius: 5px;
        font-weight: bold;
        text-transform: uppercase;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #e55347; /* Darker shade of Tomato */
    }

    .btn-danger {
        background-color: #e55347;
        color: #fff;
        width: 100%;
        padding: 15px;
        border-radius: 5px;
        font-weight: bold;
        text-transform: uppercase;
        border: none;
        margin-top: 10px;
        transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #d43f3a; /* Darker shade of Red for hover */
    }

    .alert-danger {
        background-color: rgba(255, 99, 71, 0.8); /* Semi-transparent Tomato for errors */
        color: #000;
        border: none;
        margin-bottom: 20px;
        font-size: 0.9em;
        padding: 1rem;
        border-radius: 5px;
    }

    .text-danger {
        color: #ff6347; /* Tomato color for error messages */
    }

    img {
        max-width: 100%;
        border-radius: 5px;
    }
</style>
@endsection

@section('content')
    <div class="container">
        <h1>Edit Product</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ old('product_name', $product->product_name) }}">
                @error('product_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control-textarea" id="description" name="description">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}">
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="text" class="form-control" id="stock" name="stock" value="{{ old('stock', $product->stock) }}">
                @error('stock')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Product Image:</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                @if ($product->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}" width="150">
                    </div>
                @else
                    <p>No image available</p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>

        <!-- Delete Button -->
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="margin-top: 20px;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Product</button>
        </form>
    </div>
@endsection
