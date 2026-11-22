<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Staff Details
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                @if ($staff->avatar)
                    <img src="{{ asset('storage/' . $staff->avatar) }}"
                         alt="{{ $staff->full_name }}"
                         class="mb-4 h-32 w-32 rounded-full object-cover">
                @endif

                <h3 class="text-2xl font-bold">
                    {{ $staff->full_name ?? $staff->name }}
                </h3>

                <p class="mt-3">
                    <strong>Username:</strong>
                    {{ $staff->name }}
                </p>

                <p class="mt-2">
                    <strong>Email:</strong>
                    {{ $staff->email }}
                </p>

                <p class="mt-2">
                    <strong>Role:</strong>
                    <span class="capitalize">{{ $staff->role }}</span>
                </p>

                <div class="mt-6">
                    <a href="{{ route('staff.edit', $staff) }}"
                       class="rounded bg-green-600 px-4 py-2 text-white hover:bg-green-700">
                        Edit Staff
                    </a>

                    <a href="{{ route('staff.index') }}"
                       class="ml-2 rounded bg-gray-500 px-4 py-2 text-white hover:bg-gray-600">
                        Back to Staff
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>