<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $query->where('product_name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        $products = $query->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|min:3|unique:products,product_name',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }
    
        Product::create($data);
    
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }
    
    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Validate the request
        $request->validate([
            'product_name' => 'required|string|min:3|unique:products,product_name,' . $product->id,
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Prepare data for updating
        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($product->image) {
                // Delete old image
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // Update product and set success message
        $product->update($data);

        // Redirect with success message
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        // Delete the product's image if it exists
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        // Delete product and set success message
        $product->delete();

        // Redirect with success message
        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
