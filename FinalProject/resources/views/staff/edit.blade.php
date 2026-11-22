<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Staff Account
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                @if ($staff->avatar)
                    <div class="mb-4">
                        <p class="mb-2 font-medium text-gray-700">
                            Current Avatar
                        </p>

                        <img src="{{ asset('storage/' . $staff->avatar) }}"
                             alt="{{ $staff->full_name }}"
                             class="h-24 w-24 rounded-full object-cover">
                    </div>
                @endif

                <form action="{{ route('staff.update', $staff) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    @include('staff._form', [
                        'buttonText' => 'Update Staff Account'
                    ])

                </form>

            </div>
        </div>
    </div>
</x-app-layout>