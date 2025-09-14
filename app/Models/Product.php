<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'quantity', 'description'];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    // Relationships
    public function attributeValues()
    {
        return $this->belongsToMany(
            ProductAttributeValue::class,
            'product_value_product',  // pivot table
            'product_id',
            'attr_value_id'
        );
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class);
    }
}
