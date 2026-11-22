<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $productCount = Product::where('is_archived', false)->count();
        $customerCount = Customer::count();
        $staffCount = User::count();
        $salesCount = Sale::count();

        $lowStockProducts = Product::where('is_archived', false)
            ->where('stock_quantity', '<=', 5)
            ->orderBy('stock_quantity')
            ->get();

        return view('dashboard', compact(
            'productCount',
            'customerCount',
            'staffCount',
            'salesCount',
            'lowStockProducts'
        ));
    }
}