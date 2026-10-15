<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ShopController extends Controller
{
    public function show()
    {
        return view('shop');
    }

    public function showProduct(Product $product)
    {
        return view('products.detailpagina', [
            'product' => $product->load('categories'),
        ]);
    }
}