@extends('layout')

@section('title', 'Edit Customer')

@section('content')
    <div class="card">
        <h1>Edit Customer</h1>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('customers.update', $customer) }}">
            @csrf
            @method('PUT')

            <label>Full Name:</label><br>
            <input
                type="text"
                name="full_name"
                value="{{ old('full_name', $customer->full_name) }}"
            >
            <br><br>

            <label>Email:</label><br>
            <input
                type="email"
                name="email"
                value="{{ old('email', $customer->email) }}"
            >
            <br><br>

            <label>Phone:</label><br>
            <input
                type="text"
                name="phone"
                value="{{ old('phone', $customer->phone) }}"
            >
            <br><br>

            <button type="submit">Update Customer</button>
        </form>
    </div>
@endsection