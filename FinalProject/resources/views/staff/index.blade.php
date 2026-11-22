<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Staff Management
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 rounded bg-green-100 p-4 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 rounded bg-red-100 p-4 text-red-800">
                    {{ session('error') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('staff.create') }}"
                   class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                    Add Staff
                </a>
            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto p-6">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-3 text-left">Avatar</th>
                                <th class="border p-3 text-left">Full Name</th>
                                <th class="border p-3 text-left">Email</th>
                                <th class="border p-3 text-left">Role</th>
                                <th class="border p-3 text-left">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($staff as $member)
                                <tr>
                                    <td class="border p-3">
                                        @if ($member->avatar)
                                            <img src="{{ asset('storage/' . $member->avatar) }}"
                                                 alt="{{ $member->full_name }}"
                                                 class="h-12 w-12 rounded-full object-cover">
                                        @else
                                            <span class="text-gray-500">No avatar</span>
                                        @endif
                                    </td>

                                    <td class="border p-3">
                                        {{ $member->full_name ?? $member->name }}
                                    </td>

                                    <td class="border p-3">
                                        {{ $member->email }}
                                    </td>

                                    <td class="border p-3 capitalize">
                                        {{ $member->role }}
                                    </td>

                                    <td class="border p-3">
                                        <a href="{{ route('staff.show', $member) }}"
                                           class="mr-2 text-blue-600 hover:underline">
                                            View
                                        </a>

                                        <a href="{{ route('staff.edit', $member) }}"
                                           class="mr-2 text-green-600 hover:underline">
                                            Edit
                                        </a>

                                        @if ($member->id !== auth()->id())
                                            <form action="{{ route('staff.destroy', $member) }}"
                                                  method="POST"
                                                  class="inline">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        onclick="return confirm('Delete this staff account?')"
                                                        class="text-red-600 hover:underline">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5"
                                        class="border p-4 text-center text-gray-500">
                                        No staff accounts found.
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