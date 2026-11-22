<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            POS Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">

            <div class="grid gap-6 md:grid-cols-4">
                <div class="rounded-lg bg-blue-600 p-6 text-white shadow">
                    <p class="text-sm">Active Products</p>
                    <p class="mt-2 text-3xl font-bold">
                        {{ $productCount }}
                    </p>
                </div>

                <div class="rounded-lg bg-green-600 p-6 text-white shadow">
                    <p class="text-sm">Customers</p>
                    <p class="mt-2 text-3xl font-bold">
                        {{ $customerCount }}
                    </p>
                </div>

                <div class="rounded-lg bg-purple-600 p-6 text-white shadow">
                    <p class="text-sm">Staff Accounts</p>
                    <p class="mt-2 text-3xl font-bold">
                        {{ $staffCount }}
                    </p>
                </div>

                <div class="rounded-lg bg-orange-500 p-6 text-white shadow">
                    <p class="text-sm">Total Sales</p>
                    <p class="mt-2 text-3xl font-bold">
                        {{ $salesCount }}
                    </p>
                </div>
            </div>

            <div class="rounded-lg bg-white p-6 shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold">
                        Low Stock Products
                    </h3>

                    <a href="{{ route('products.index') }}"
                       class="text-blue-600 hover:underline">
                        View Products
                    </a>
                </div>

                @if ($lowStockProducts->isEmpty())
                    <p class="mt-4 text-gray-500">
                        No products currently have low stock.
                    </p>
                @else
                    <div class="mt-4 overflow-x-auto">
                        <table class="w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border p-3 text-left">Product</th>
                                    <th class="border p-3 text-left">Stock</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($lowStockProducts as $product)
                                    <tr>
                                        <td class="border p-3">
                                            {{ $product->name }}
                                        </td>

                                        <td class="border p-3 font-semibold text-red-600">
                                            {{ $product->stock_quantity }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>