<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Specify the table name if it's different from the pluralized model name
    protected $table = 'products';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'product_name', 'description', 'price', 'stock', 'image',
    ];
    
    /**
     * Relationships (if any)
     * Example: A product may belong to a category or a supplier
     */

    // Example: A product belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Example: A product belongs to a supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Business logic: Calculate a discount price
     *
     * @param float $percentage
     * @return float
     */
    public function calculateDiscount(float $percentage): float
    {
        return $this->price - ($this->price * ($percentage / 100));
    }

    /**
     * Business logic: Check if the product is in stock
     *
     * @return bool
     */
    public function isInStock(): bool
    {
        return $this->stock > 0;
    }
}
