<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sales History
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 rounded bg-green-100 p-4 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('sales.create') }}"
                   class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                    Record New Sale
                </a>
            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto p-6">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-3 text-left">Product</th>
                                <th class="border p-3 text-left">Customer</th>
                                <th class="border p-3 text-left">Staff</th>
                                <th class="border p-3 text-left">Quantity</th>
                                <th class="border p-3 text-left">Total Price</th>
                                <th class="border p-3 text-left">Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($sales as $sale)
                                <tr>
                                    <td class="border p-3">
                                        {{ $sale->product->name }}
                                    </td>

                                    <td class="border p-3">
                                        {{ $sale->customer->full_name ?? 'Walk-in customer' }}
                                    </td>

                                    <td class="border p-3">
                                        {{ $sale->staff->name }}
                                    </td>

                                    <td class="border p-3">
                                        {{ $sale->quantity }}
                                    </td>

                                    <td class="border p-3">
                                        ₱{{ number_format($sale->total_price, 2) }}
                                    </td>

                                    <td class="border p-3">
                                        {{ $sale->sold_at->format('M d, Y h:i A') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6"
                                        class="border p-4 text-center text-gray-500">
                                        No sales recorded yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>