<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class AddToCartButton extends Component
{
    public $productId;
    public $quantity = 1;
    public $inCart = false;
    public $cartQuantity = 0;
    public $loading = false;

    // Listen for cart update events
    protected $listeners = ['cartUpdated' => 'updateCartStatus'];

    public function mount($productId)
    {
        $this->productId = $productId;
        $this->updateCartStatus();
    }

    public function updateCartStatus()
    {
        $cart = $this->getCart();
        $cartItem = $cart->items()->where('product_id', $this->productId)->first();
        
        $this->inCart = $cartItem ? true : false;
        $this->cartQuantity = $cartItem ? $cartItem->quantity : 0;
    }

    private function getCart()
    {
        $cartId = Session::get('cart_id');
        
        if (!$cartId) {
            $cart = Cart::create();
            Session::put('cart_id', $cart->id);
            return $cart;
        }
        
        return Cart::firstOrCreate(['id' => $cartId]);
    }

    public function addToCart()
    {
        $this->loading = true;
        
        $cart = $this->getCart();
        $product = Product::findOrFail($this->productId);
        
        // Check if item already in cart
        $cartItem = $cart->items()->where('product_id', $this->productId)->first();
        
        if ($cartItem) {
            // Update quantity
            $cartItem->quantity += $this->quantity;
            $cartItem->save();
        } else {
            // Add new item
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $this->productId,
                'quantity' => $this->quantity,
                'price' => $product->price,
            ]);
        }
        
        $this->loading = false;
        $this->updateCartStatus();
        
        // Dispatch event for Livewire v3
        $this->dispatch('cartUpdated');
        
        // Dispatch browser event for toast notification
        $this->dispatch('cart-added', 
            message: 'Added to cart successfully!',
            productName: $product->name
        );
    }

    public function removeFromCart()
    {
        $cart = $this->getCart();
        $cart->items()->where('product_id', $this->productId)->delete();
        
        $this->updateCartStatus();
        
        // Dispatch event for Livewire v3
        $this->dispatch('cartUpdated');
        
        $this->dispatch('cart-removed', 
            message: 'Removed from cart'
        );
    }

    public function render()
    {
        return view('livewire.add-to-cart-button');
    }
}