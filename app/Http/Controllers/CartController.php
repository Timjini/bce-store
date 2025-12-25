<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return Cart::with('user', 'items.product')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $cart = Cart::create($data);
        return response()->json($cart, 201);
    }

    public function show(Cart $cart)
    {
        return $cart->load('user', 'items.product');
    }

    public function update(Request $request, Cart $cart)
    {
        return response()->json(['message' => 'Cart update not supported directly']);
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return response()->json(['message' => 'Cart deleted']);
    }
}

