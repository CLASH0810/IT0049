<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Record Sale
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                @if ($errors->any())
                    <div class="mb-4 rounded bg-red-100 p-4 text-red-800">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('sales.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="product_id"
                               class="block font-medium text-gray-700">
                            Product
                        </label>

                        <select name="product_id"
                                id="product_id"
                                required
                                class="mt-1 block w-full rounded border-gray-300">
                            <option value="">Select a product</option>

                            @foreach ($products as $product)
                                <option value="{{ $product->id }}"
                                    {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                    — ₱{{ number_format($product->price, 2) }}
                                    — Stock: {{ $product->stock_quantity }}
                                </option>
                            @endforeach
                        </select>

                        @error('product_id')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="customer_id"
                               class="block font-medium text-gray-700">
                            Customer
                        </label>

                        <select name="customer_id"
                                id="customer_id"
                                class="mt-1 block w-full rounded border-gray-300">
                            <option value="">Walk-in customer</option>

                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}"
                                    {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                    {{ $customer->full_name }}
                                </option>
                            @endforeach
                        </select>

                        @error('customer_id')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="quantity"
                               class="block font-medium text-gray-700">
                            Quantity
                        </label>

                        <input type="number"
                               name="quantity"
                               id="quantity"
                               min="1"
                               value="{{ old('quantity', 1) }}"
                               required
                               class="mt-1 block w-full rounded border-gray-300">

                        @error('quantity')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                        Record Sale
                    </button>

                    <a href="{{ route('sales.index') }}"
                       class="ml-2 rounded bg-gray-500 px-4 py-2 text-white hover:bg-gray-600">
                        Cancel
                    </a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>