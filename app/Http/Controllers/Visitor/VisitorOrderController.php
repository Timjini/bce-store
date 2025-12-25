<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class VisitorOrderController extends Controller
{
    protected function getCart()
    {
        $cartId = Session::get('cart_id');
        return Cart::with('items.product')->findOrFail($cartId);
    }
    

    public function create()
    {
        $cart = $this->getCart();
        
         $cart = $this->getCart();
        if ($cart->items->isEmpty()) {
            return redirect()->route('visitor.cart.show')->with('error', 'Cart is empty');
        }
        
        // Calculate totals
        $subtotal = $cart->items->sum(fn($item) => $item->price * $item->quantity);
        $tax = $subtotal * 0.08; // 8% tax
        $total = $subtotal + $tax;
        
        
         $states = [
        'AL' => 'Alabama', 'AK' => 'Alaska', 'AZ' => 'Arizona', 'AR' => 'Arkansas',
        'CA' => 'California', 'CO' => 'Colorado', 'CT' => 'Connecticut', 'DE' => 'Delaware',
        'FL' => 'Florida', 'GA' => 'Georgia', 'HI' => 'Hawaii', 'ID' => 'Idaho',
        'IL' => 'Illinois', 'IN' => 'Indiana', 'IA' => 'Iowa', 'KS' => 'Kansas',
        'KY' => 'Kentucky', 'LA' => 'Louisiana', 'ME' => 'Maine', 'MD' => 'Maryland',
        'MA' => 'Massachusetts', 'MI' => 'Michigan', 'MN' => 'Minnesota', 'MS' => 'Mississippi',
        'MO' => 'Missouri', 'MT' => 'Montana', 'NE' => 'Nebraska', 'NV' => 'Nevada',
        'NH' => 'New Hampshire', 'NJ' => 'New Jersey', 'NM' => 'New Mexico', 'NY' => 'New York',
        'NC' => 'North Carolina', 'ND' => 'North Dakota', 'OH' => 'Ohio', 'OK' => 'Oklahoma',
        'OR' => 'Oregon', 'PA' => 'Pennsylvania', 'RI' => 'Rhode Island', 'SC' => 'South Carolina',
        'SD' => 'South Dakota', 'TN' => 'Tennessee', 'TX' => 'Texas', 'UT' => 'Utah',
        'VT' => 'Vermont', 'VA' => 'Virginia', 'WA' => 'Washington', 'WV' => 'West Virginia',
        'WI' => 'Wisconsin', 'WY' => 'Wyoming'
    ];

         return view('visitor.orders.create', compact('cart', 'subtotal', 'tax', 'total', 'states'));
    }

    public function store(Request $request)
    {
        $cart = $this->getCart();
        if ($cart->items->isEmpty()) {
            return redirect()->route('cart.show')->with('error', 'Cart is empty');
        }


        // Create order
        $order = Order::create([
            'user_id' => null, // visitor checkout
            'status' => 'pending',
            'total' => $cart->items->sum(fn($i) => $i->price * $i->quantity),
        ]);
        
        // Save order items
        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'subtotal' => $item->quantity * $item->price,
            ]);
        }
        
        // Save addresses
        $shipping = request('shipping');
        $billing = request('billing');
        
        // Shipping address
        Address::create([
            'order_id' => $order->id,
            'type' => 'shipping',
            'address_line1' => $shipping['address'],
            'address_line2' => $shipping['address2'] ?? null,
            'city' => $shipping['city'],
            'state' => $shipping['state'],
            'zip' => $shipping['zip'],
            'country' => $shipping['country'],
            'contact_name' => $shipping['contact_name'] ?? null,
            'contact_phone' => $shipping['contact_phone'] ?? null,
        ]);
        
        
        Address::create([
            'order_id' => $order->id,
            'type' => 'billing',
            'address_line1' => $shipping['address'],
            'address_line2' => $shipping['address2'] ?? null,
            'city' => $shipping['city'],
            'state' => $shipping['state'],
            'zip' => $shipping['zip'],
            'country' => $shipping['country'],
        ]);
        
        // Clear cart
        $cart->items()->delete();
        Session::forget('cart_id');
        
        return redirect()->route('orders.show', $order)->with('success', 'Order placed successfully');
    }

    public function show(Order $order)
    {
        $order->load('items.product');
        return view('visitor.orders.show', compact('order'));
    }
    
    public function cancel(Order $order)
    {
        // Check if order can be cancelled
        if (!in_array($order->status, ['paid', 'processing'])) {
            return response()->json([
                'success' => false,
                'message' => 'Order cannot be cancelled at this stage.'
            ]);
        }
        
        // Update order status
        $order->update(['status' => 'cancelled']);
        
        // Process refund through Chase API if needed
        // $chaseService = new ChasePaymentService();
        // $chaseService->refundPayment($order->payment_id);
        
        return response()->json([
            'success' => true,
            'message' => 'Order cancelled successfully.'
        ]);
    }
}
