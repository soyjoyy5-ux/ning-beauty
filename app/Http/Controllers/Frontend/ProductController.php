<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        if (!$product->is_active) {
            abort(404);
        }

        return view('frontend.products.show', compact('product'));
    }
}
