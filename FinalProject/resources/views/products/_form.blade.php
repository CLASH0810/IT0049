@csrf

<div class="mb-4">
    <label for="name" class="block font-medium text-gray-700">
        Product Name
    </label>

    <input type="text"
           name="name"
           id="name"
           value="{{ old('name', $product->name ?? '') }}"
           class="mt-1 block w-full rounded border-gray-300">

    @error('name')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="price" class="block font-medium text-gray-700">
        Price
    </label>

    <input type="number"
           name="price"
           id="price"
           step="0.01"
           min="0"
           value="{{ old('price', $product->price ?? '') }}"
           class="mt-1 block w-full rounded border-gray-300">

    @error('price')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="stock_quantity" class="block font-medium text-gray-700">
        Stock Quantity
    </label>

    <input type="number"
           name="stock_quantity"
           id="stock_quantity"
           min="0"
           value="{{ old('stock_quantity', $product->stock_quantity ?? 0) }}"
           class="mt-1 block w-full rounded border-gray-300">

    @error('stock_quantity')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="image" class="block font-medium text-gray-700">
        Product Image
    </label>

    <input type="file"
           name="image"
           id="image"
           accept=".jpg,.jpeg,.png,.webp"
           class="mt-1 block w-full rounded border-gray-300">

    @error('image')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<button type="submit"
        class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
    {{ $buttonText }}
</button>

<a href="{{ route('products.index') }}"
   class="ml-2 rounded bg-gray-500 px-4 py-2 text-white hover:bg-gray-600">
    Cancel
</a>