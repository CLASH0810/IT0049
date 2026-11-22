<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Products
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
                <a href="{{ route('products.create') }}"
                   class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                    Add Product
                </a>
            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto p-6">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-3 text-left">Image</th>
                                <th class="border p-3 text-left">Name</th>
                                <th class="border p-3 text-left">Price</th>
                                <th class="border p-3 text-left">Stock</th>
                                <th class="border p-3 text-left">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td class="border p-3">
                                        @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                 alt="{{ $product->name }}"
                                                 class="h-16 w-16 rounded object-cover">
                                        @else
                                            <span class="text-gray-500">No image</span>
                                        @endif
                                    </td>

                                    <td class="border p-3">
                                        {{ $product->name }}
                                    </td>

                                    <td class="border p-3">
                                        ₱{{ number_format($product->price, 2) }}
                                    </td>

                                    <td class="border p-3">
    <span class="{{ $product->stock_quantity <= 5
        ? 'font-bold text-red-600'
        : 'text-green-600' }}">
        {{ $product->stock_quantity }}
    </span>

    @if ($product->stock_quantity <= 5)
        <span class="ml-2 rounded bg-red-100 px-2 py-1 text-xs text-red-700">
            Low stock
        </span>
    @endif
</td>

                                    <td class="border p-3">
                                        <a href="{{ route('products.show', $product) }}"
                                           class="mr-2 text-blue-600 hover:underline">
                                            View
                                        </a>

                                        <a href="{{ route('products.edit', $product) }}"
                                           class="mr-2 text-green-600 hover:underline">
                                            Edit
                                        </a>

                                        <form action="{{ route('products.destroy', $product) }}"
                                              method="POST"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    onclick="return confirm('Archive this product?')"
                                                    class="text-red-600 hover:underline">
                                                Archive
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border p-4 text-center text-gray-500">
                                        No products found.
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