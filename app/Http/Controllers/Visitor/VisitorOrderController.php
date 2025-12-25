<?php

namespace App\Http\Controllers\Visitor;

use App\Events\OrderPlaced;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest;
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
            'AL' => 'Alabama',
            'AK' => 'Alaska',
            'AZ' => 'Arizona',
            'AR' => 'Arkansas',
            'CA' => 'California',
            'CO' => 'Colorado',
            'CT' => 'Connecticut',
            'DE' => 'Delaware',
            'FL' => 'Florida',
            'GA' => 'Georgia',
            'HI' => 'Hawaii',
            'ID' => 'Idaho',
            'IL' => 'Illinois',
            'IN' => 'Indiana',
            'IA' => 'Iowa',
            'KS' => 'Kansas',
            'KY' => 'Kentucky',
            'LA' => 'Louisiana',
            'ME' => 'Maine',
            'MD' => 'Maryland',
            'MA' => 'Massachusetts',
            'MI' => 'Michigan',
            'MN' => 'Minnesota',
            'MS' => 'Mississippi',
            'MO' => 'Missouri',
            'MT' => 'Montana',
            'NE' => 'Nebraska',
            'NV' => 'Nevada',
            'NH' => 'New Hampshire',
            'NJ' => 'New Jersey',
            'NM' => 'New Mexico',
            'NY' => 'New York',
            'NC' => 'North Carolina',
            'ND' => 'North Dakota',
            'OH' => 'Ohio',
            'OK' => 'Oklahoma',
            'OR' => 'Oregon',
            'PA' => 'Pennsylvania',
            'RI' => 'Rhode Island',
            'SC' => 'South Carolina',
            'SD' => 'South Dakota',
            'TN' => 'Tennessee',
            'TX' => 'Texas',
            'UT' => 'Utah',
            'VT' => 'Vermont',
            'VA' => 'Virginia',
            'WA' => 'Washington',
            'WV' => 'West Virginia',
            'WI' => 'Wisconsin',
            'WY' => 'Wyoming'
        ];

        return view('visitor.orders.create', compact('cart', 'subtotal', 'tax', 'total', 'states'));
    }


    public function store(OrderStoreRequest $request)
    {

        $validated = $request->all();
        $cart = $this->getCart();
        if ($cart->items->isEmpty()) {
            return redirect()->route('cart.show')->with('error', 'Cart is empty');
        }

        $order = Order::create([
            'user_id' => null, // visitor checkout
            'status' => 'pending',
            'total' => $cart->items->sum(fn($i) => $i->price * $i->quantity),
        ]);
        event(new OrderPlaced($order, $cart, $validated));

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
