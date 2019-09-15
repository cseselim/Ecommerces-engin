<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Product::class, 10)->create();

        $Product = Product::select('id')->get();

        foreach ($Product as $product) {
        	$product->addMediaFromUrl('https://lorempixel.com/640/480/?21512')->toMediaCollection('products');
        }
    }
}
