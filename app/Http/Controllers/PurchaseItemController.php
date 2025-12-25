<?php 

namespace App\Http\Controllers;

use App\Models\PurchaseItem;
use Illuminate\Http\Request;

class PurchaseItemController extends Controller
{
    public function index()
    {
        return PurchaseItem::with('purchase', 'product')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'purchase_id' => 'required|exists:purchases,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'cost_price' => 'required|numeric|min:0',
        ]);

        $data['subtotal'] = $data['quantity'] * $data['cost_price'];
        $item = PurchaseItem::create($data);

        return response()->json($item, 201);
    }

    public function show(PurchaseItem $purchaseItem)
    {
        return $purchaseItem->load('purchase', 'product');
    }

    public function update(Request $request, PurchaseItem $purchaseItem)
    {
        $data = $request->validate([
            'quantity' => 'sometimes|integer|min:1',
            'cost_price' => 'sometimes|numeric|min:0',
        ]);

        if (isset($data['quantity']) || isset($data['cost_price'])) {
            $quantity = $data['quantity'] ?? $purchaseItem->quantity;
            $cost_price = $data['cost_price'] ?? $purchaseItem->cost_price;
            $data['subtotal'] = $quantity * $cost_price;
        }

        $purchaseItem->update($data);
        return response()->json($purchaseItem);
    }

    public function destroy(PurchaseItem $purchaseItem)
    {
        $purchaseItem->delete();
        return response()->json(['message' => 'Purchase item deleted']);
    }
}
