<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VisitorCartItemController extends Controller
{
    protected function getCart()
    {
        $cartId = Session::get('cart_id');
        if ($cartId) return Cart::findOrFail($cartId);
        $cart = Cart::create([]);
        Session::put('cart_id', $cart->id);
        return $cart;
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = $this->getCart();
        $product = Product::findOrFail($data['product_id']);

        $cartItem = CartItem::updateOrCreate(
            ['cart_id' => $cart->id, 'product_id' => $product->id],
            ['quantity' => \DB::raw("quantity + {$data['quantity']}"), 'price' => $product->price]
        );

        return redirect()->route('cart.show')->with('success', 'Product added to cart');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $data = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem->update($data);
        return redirect()->route('cart.show')->with('success', 'Cart updated');
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->route('cart.show')->with('success', 'Item removed from cart');
    }
}
