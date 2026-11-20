@extends('layout')

@section('title', 'Create Customer')

@section('content')
    <div class="card">
        <h1>Create Customer</h1>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('customers.store') }}">
            @csrf

            <label>Full Name:</label><br>
            <input
                type="text"
                name="full_name"
                value="{{ old('full_name') }}"
            >
            <br><br>

            <label>Email:</label><br>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
            >
            <br><br>

            <label>Phone:</label><br>
            <input
                type="text"
                name="phone"
                value="{{ old('phone') }}"
            >
            <br><br>

            <button type="submit">Save Customer</button>
        </form>
    </div>
@endsection