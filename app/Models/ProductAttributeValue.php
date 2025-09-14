<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    protected $fillable = ['product_attribute_id', 'value'];

    public function attribute()
    {
        return $this->belongsTo(ProductAttribute::class, 'product_attribute_id');
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'product_value_product',  // pivot table
            'attr_value_id',
            'product_id'
        );
    }
}
