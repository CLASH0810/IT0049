<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Customer Details
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <h3 class="text-2xl font-bold">
                    {{ $customer->full_name }}
                </h3>

                <p class="mt-3">
                    <strong>Email:</strong>
                    {{ $customer->email }}
                </p>

                <p class="mt-2">
                    <strong>Phone:</strong>
                    {{ $customer->phone ?? 'Not provided' }}
                </p>

                <div class="mt-6">
                    <a href="{{ route('customers.edit', $customer) }}"
                       class="rounded bg-green-600 px-4 py-2 text-white hover:bg-green-700">
                        Edit Customer
                    </a>

                    <a href="{{ route('customers.index') }}"
                       class="ml-2 rounded bg-gray-500 px-4 py-2 text-white hover:bg-gray-600">
                        Back to Customers
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>