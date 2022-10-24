<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
       
        return view('products.index', [
            'products' => Product::paginate(6)->withQueryString(),
        ]);
    }

    public function show(Product $product)
    {
        return view('products.show', [
            "product" => $product,
        ]);
        
    }
}
