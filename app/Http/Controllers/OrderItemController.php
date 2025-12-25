<?php 

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        return OrderItem::with('order', 'product')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $data['subtotal'] = $data['quantity'] * $data['price'];
        $item = OrderItem::create($data);

        return response()->json($item, 201);
    }

    public function show(OrderItem $orderItem)
    {
        return $orderItem->load('order', 'product');
    }

    public function update(Request $request, OrderItem $orderItem)
    {
        $data = $request->validate([
            'quantity' => 'sometimes|integer|min:1',
            'price' => 'sometimes|numeric|min:0',
        ]);

        if (isset($data['quantity']) || isset($data['price'])) {
            $quantity = $data['quantity'] ?? $orderItem->quantity;
            $price = $data['price'] ?? $orderItem->price;
            $data['subtotal'] = $quantity * $price;
        }

        $orderItem->update($data);
        return response()->json($orderItem);
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();
        return response()->json(['message' => 'Order item deleted']);
    }
}
