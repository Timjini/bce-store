<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function index()
    {
        return CartItem::with('cart', 'product')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'cart_id' => 'required|exists:carts,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $item = CartItem::create($data);
        return response()->json($item, 201);
    }

    public function show(CartItem $cartItem)
    {
        return $cartItem->load('cart', 'product');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $data = $request->validate([
            'quantity' => 'sometimes|integer|min:1',
            'price' => 'sometimes|numeric|min:0',
        ]);

        $cartItem->update($data);
        return response()->json($cartItem);
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();
        return response()->json(['message' => 'Cart item deleted']);
    }
}
