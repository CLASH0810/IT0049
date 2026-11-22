<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Staff Account
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <form action="{{ route('staff.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @include('staff._form', [
                        'buttonText' => 'Save Staff Account'
                    ])

                </form>

            </div>
        </div>
    </div>
</x-app-layout>