<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Customers
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
                <a href="{{ route('customers.create') }}"
                   class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                    Add Customer
                </a>
            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto p-6">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-3 text-left">Full Name</th>
                                <th class="border p-3 text-left">Email</th>
                                <th class="border p-3 text-left">Phone</th>
                                <th class="border p-3 text-left">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($customers as $customer)
                                <tr>
                                    <td class="border p-3">
                                        {{ $customer->full_name }}
                                    </td>

                                    <td class="border p-3">
                                        {{ $customer->email }}
                                    </td>

                                    <td class="border p-3">
                                        {{ $customer->phone ?? 'Not provided' }}
                                    </td>

                                    <td class="border p-3">
                                        <a href="{{ route('customers.show', $customer) }}"
                                           class="mr-2 text-blue-600 hover:underline">
                                            View
                                        </a>

                                        <a href="{{ route('customers.edit', $customer) }}"
                                           class="mr-2 text-green-600 hover:underline">
                                            Edit
                                        </a>

                                        <form action="{{ route('customers.destroy', $customer) }}"
                                              method="POST"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    onclick="return confirm('Delete this customer?')"
                                                    class="text-red-600 hover:underline">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="border p-4 text-center text-gray-500">
                                        No customers found.
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