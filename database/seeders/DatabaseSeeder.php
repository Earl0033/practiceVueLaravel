<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use App\Models\CartItem;
use App\Models\Purchase;
use App\Models\PurchaseItem;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // --- USERS ---
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $user = User::create([
            'name' => 'Normal User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Product::factory(10)->create();
        // --- PRODUCTS ---
        $product1 = Product::create([
            'name' => 'T-Shirt',
            'price' => 19.99,
            'quantity' => 50,
            'description' => 'Basic cotton t-shirt.',
        ]);

        $product2 = Product::create([
            'name' => 'Sneakers',
            'price' => 59.99,
            'quantity' => 20,
            'description' => 'Comfortable running shoes.',
        ]);

        // --- ATTRIBUTES ---
        $colorAttr = ProductAttribute::create(['name' => 'Color']);
        $sizeAttr  = ProductAttribute::create(['name' => 'Size']);

        $red   = ProductAttributeValue::create(['product_attribute_id' => $colorAttr->id, 'value' => 'Red']);
        $blue  = ProductAttributeValue::create(['product_attribute_id' => $colorAttr->id, 'value' => 'Blue']);
        $small = ProductAttributeValue::create(['product_attribute_id' => $sizeAttr->id, 'value' => 'Small']);
        $large = ProductAttributeValue::create(['product_attribute_id' => $sizeAttr->id, 'value' => 'Large']);

        // Attach attribute values to products
        $product1->attributeValues()->attach([$red->id, $small->id]);
        $product2->attributeValues()->attach([$blue->id, $large->id]);

        // --- CART ITEMS (for user) ---
        CartItem::create([
            'user_id' => $user->id,
            'product_id' => $product1->id,
            'quantity' => 2,
        ]);

        // --- PURCHASE DEMO ---
        $purchase = Purchase::create([
            'user_id' => $user->id,
            'total_amount' => 39.98,
            'status' => 'completed',
        ]);

        PurchaseItem::create([
            'purchase_id' => $purchase->id,
            'product_id' => $product1->id,
            'quantity' => 2,
            'price' => 19.99,
        ]);
    }
}
