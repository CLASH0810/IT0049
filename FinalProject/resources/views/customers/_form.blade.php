@csrf

<div class="mb-4">
    <label for="full_name" class="block font-medium text-gray-700">
        Full Name
    </label>

    <input type="text"
           name="full_name"
           id="full_name"
           value="{{ old('full_name', $customer->full_name ?? '') }}"
           class="mt-1 block w-full rounded border-gray-300">

    @error('full_name')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="email" class="block font-medium text-gray-700">
        Email
    </label>

    <input type="email"
           name="email"
           id="email"
           value="{{ old('email', $customer->email ?? '') }}"
           class="mt-1 block w-full rounded border-gray-300">

    @error('email')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="phone" class="block font-medium text-gray-700">
        Phone Number
    </label>

    <input type="text"
           name="phone"
           id="phone"
           value="{{ old('phone', $customer->phone ?? '') }}"
           class="mt-1 block w-full rounded border-gray-300">

    @error('phone')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<button type="submit"
        class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
    {{ $buttonText }}
</button>

<a href="{{ route('customers.index') }}"
   class="ml-2 rounded bg-gray-500 px-4 py-2 text-white hover:bg-gray-600">
    Cancel
</a>