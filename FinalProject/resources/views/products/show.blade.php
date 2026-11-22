<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Product Details
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="mb-4 h-48 w-48 rounded object-cover">
                @endif

                <h3 class="text-2xl font-bold">
                    {{ $product->name }}
                </h3>

                <p class="mt-3">
                    <strong>Price:</strong>
                    ₱{{ number_format($product->price, 2) }}
                </p>

                <p class="mt-2">
                    <strong>Stock:</strong>
                    {{ $product->stock_quantity }}
                </p>

                <div class="mt-6">
                    <a href="{{ route('products.edit', $product) }}"
                       class="rounded bg-green-600 px-4 py-2 text-white hover:bg-green-700">
                        Edit Product
                    </a>

                    <a href="{{ route('products.index') }}"
                       class="ml-2 rounded bg-gray-500 px-4 py-2 text-white hover:bg-gray-600">
                        Back to Products
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>