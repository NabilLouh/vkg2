<?php

namespace App\Http\Controllers;

use App\Models\Creation;
use App\Models\Product;
use Illuminate\Http\Request;

class CreationController extends Controller
{
    public function index()
    {
        return view('creation.index', [
            'creations' => Product::where('is_creation', '=', 1)
                ->paginate(6)->withQueryString(),
        ]);
    }

    public function show(Product $creation)
    {
        return view('creation.show', [
            "product" => $creation,
        ]);
    }
}
