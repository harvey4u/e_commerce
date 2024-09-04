@extends('layouts.app')

<style>
    body {
        background-color: #1c1c1e; /* Dark background for a strong contrast */
        color: #fff;
        font-family: 'Handjet', sans-serif;
    }

    .container {
        background-color: #282828; /* Slightly lighter background for the container */
        border-radius: 15px;
        padding: 30px;
        max-width: 1200px;
        margin: 50px auto;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.6);
    }

    h1 {
        color: #e62429; /* Marvel red */
        text-align: center;
        text-transform: uppercase;
        font-weight: bold;
        margin-bottom: 20px;
        font-size: 2.5em;
    }

    .search-and-add {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    input[type="text"] {
        width: 60%;
        padding: 10px;
        border: 2px solid #e62429; /* Marvel red for search bar border */
        border-radius: 5px;
        background-color: #fff;
        color: #000;
        font-size: 1.1em;
    }

    button {
        background-color: #e62429; /* Marvel red for buttons */
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
        text-transform: uppercase;
        transition: background-color 0.3s ease;
        font-size: 1em;
    }

    button:hover {
        background-color: #c51824; /* Darker Marvel red on hover */
    }

    .alert-success {
        background-color: rgba(230, 36, 41, 0.2);
        color: #e62429; /* Marvel red for success message */
        border: none;
        margin-bottom: 20px;
        font-size: 1.1em;
        text-align: center;
    }

    .product-card {
        background-color: rgba(255, 255, 255, 0.1);
        color: #fff;
        padding: 20px;
        border-radius: 10px;
        display: flex;
        flex-direction: row;
        margin-bottom: 20px;
        align-items: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px); /* Hover effect to make the product card "pop" */
    }

    .product-image {
        flex: 1;
        text-align: center;
    }

    .product-image img {
        max-width: 150px;
        border-radius: 10px;
    }

    .product-details {
        flex: 2;
        padding: 0 20px;
    }

    .product-details h2 {
        font-size: 1.8em;
        color: #f1c40f; /* Gold color inspired by Marvel heroes like Iron Man */
        margin-bottom: 10px;
    }

    .product-details p {
        font-size: 1.1em;
        margin-bottom: 10px;
        color: #dcdcdc; /* Light gray for text */
    }

    .product-details .price {
        font-size: 1.4em;
        color: #e62429; /* Marvel red for price */
        font-weight: bold;
    }

    .actions {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
    }

    .actions .btn {
        margin-bottom: 10px;
        padding: 10px;
        width: 100px;
        text-align: center;
    }

    .actions .btn-primary {
        background-color: #e62429; /* Marvel red for Add Product button */
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease;
        text-decoration: none;
        display: inline-block; /* Ensure it aligns with other buttons */
    }

    .actions .btn-primary:hover {
        background-color: #000000; /* Darker blue for hover effect */
    }

    .pagination {
        display: none; /* Hide pagination */
    }

    .add-product-btn {
        background-color: #e62429; /* Marvel red for Add Product button */
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease;
        text-decoration: none;
        display: inline-block; /* Ensure it aligns with other buttons */
    }

    .add-product-btn:hover {
        background-color: #c51824; /* Darker Marvel red on hover */
        color: #fff;
    }
</style>

@section('content')
    <div class="container">
        <h1>Product List</h1>

        <div class="search-and-add">
            <form action="{{ route('products.index') }}" method="GET">
                <input type="text" name="search" placeholder="Search products..." value="{{ request()->search }}">
                <button type="submit">Search</button>
            </form>
            <a href="{{ route('products.create') }}" class="add-product-btn">Add Product</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @foreach ($products as $product)
            <div class="product-card">
                <div class="product-image">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}">
                    @else
                        <p>No Image</p>
                    @endif
                </div>
                <div class="product-details">
                    <h2>{{ $product->product_name }}</h2>
                    <p>{{ Str::limit($product->description, 100) }}</p> <!-- Limit the description length -->
                    <p class="price">Price: ₱{{ $product->price }}</p>
                    <p>Stock: {{ $product->stock }}</p>
                </div>
                <div class="actions">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                    <!-- Removed Delete button -->
                </div>
            </div>
        @endforeach

        <!-- Pagination is removed -->
    </div>
@endsection
