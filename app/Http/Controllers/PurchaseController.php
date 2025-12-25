<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        return Purchase::with('supplier', 'items.product')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'reference' => 'nullable|string',
            'status' => 'nullable|string|in:pending,received',
        ]);

        $purchase = Purchase::create($data);
        return response()->json($purchase, 201);
    }

    public function show(Purchase $purchase)
    {
        return $purchase->load('supplier', 'items.product');
    }

    public function update(Request $request, Purchase $purchase)
    {
        $data = $request->validate([
            'reference' => 'sometimes|string',
            'status' => 'sometimes|string|in:pending,received',
        ]);

        $purchase->update($data);
        return response()->json($purchase);
    }

    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return response()->json(['message' => 'Purchase deleted']);
    }
}