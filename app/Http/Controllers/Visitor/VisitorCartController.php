<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class VisitorCartController extends Controller
{
    protected function getCart()
    {
        $cartId = Session::get('cart_id');

        if ($cartId) {
            return Cart::with('items.product')->findOrFail($cartId);
        }

        $cart = Cart::create([]);
        Session::put('cart_id', $cart->id);
        return $cart->load('items.product');
    }

     public function show()
    {
        $cart = $this->getCart();
        $cartItems = $cart->items;
        
        $subtotal = $cartItems->sum(function($item) {
            return $item->price * $item->quantity;
        });
        
        $tax = $subtotal * 0.08; // 8% tax
        $total = $subtotal + $tax;
        
        return view('visitor.cart.show', compact('cart', 'cartItems', 'subtotal', 'tax', 'total'));
    }
}
