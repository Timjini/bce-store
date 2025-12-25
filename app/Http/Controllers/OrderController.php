<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return Order::with('user', 'items.product')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'nullable|string|in:pending,paid,shipped,completed',
        ]);

        $order = Order::create($data);
        return response()->json($order, 201);
    }

    public function show(Order $order)
    {
        return $order->load('user', 'items.product');
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => 'sometimes|string|in:pending,paid,shipped,completed',
        ]);

        $order->update($data);
        return response()->json($order);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(['message' => 'Order deleted']);
    }
}
