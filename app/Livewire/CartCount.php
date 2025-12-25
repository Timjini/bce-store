<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class CartCount extends Component
{
    public $count = 0;

    protected $listeners = ['cartUpdated' => 'updateCount'];

    public function mount()
    {
        $this->updateCount();
    }

    public function updateCount()
    {
        $cartId = Session::get('cart_id');
        
        if ($cartId) {
            $cart = Cart::with('items')->find($cartId);
            if ($cart) {
                $this->count = $cart->items->sum('quantity');
            }
        }
    }

    public function render()
    {
        return view('livewire.cart-count');
    }
}