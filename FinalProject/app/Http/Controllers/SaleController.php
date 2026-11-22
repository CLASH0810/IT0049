<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class SaleController extends Controller
{
    public function index(): View
    {
        $sales = Sale::with(['product', 'customer', 'staff'])
            ->latest('sold_at')
            ->get();

        return view('sales.index', compact('sales'));
    }

    public function create(): View
    {
        $products = Product::where('is_archived', false)
            ->where('stock_quantity', '>', 0)
            ->orderBy('name')
            ->get();

        $customers = Customer::orderBy('full_name')->get();

        return view('sales.create', compact('products', 'customers'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'customer_id' => ['nullable', 'exists:customers,id'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        DB::transaction(function () use ($validated) {
            $product = Product::whereKey($validated['product_id'])
                ->lockForUpdate()
                ->firstOrFail();

            if ($product->is_archived) {
                throw ValidationException::withMessages([
                    'product_id' => 'This product is archived and cannot be sold.',
                ]);
            }

            if ($validated['quantity'] > $product->stock_quantity) {
                throw ValidationException::withMessages([
                    'quantity' => "Only {$product->stock_quantity} item(s) are available.",
                ]);
            }

            $totalPrice = $product->price * $validated['quantity'];

            Sale::create([
                'product_id' => $product->id,
                'customer_id' => $validated['customer_id'] ?? null,
                'sold_by' => auth()->id(),
                'quantity' => $validated['quantity'],
                'total_price' => $totalPrice,
            ]);

            $product->decrement(
                'stock_quantity',
                $validated['quantity']
            );
        });

        return redirect()
            ->route('sales.index')
            ->with('success', 'Sale recorded and stock updated successfully.');
    }
}