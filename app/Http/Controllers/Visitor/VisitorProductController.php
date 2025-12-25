<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\Product;

class VisitorProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(12); // Pagination for visitor
        return view('visitor.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('visitor.products.show', compact('product'));
    }
}
