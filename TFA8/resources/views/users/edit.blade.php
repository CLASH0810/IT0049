@extends('layout')

@section('title', 'Edit User')

@section('content')
    <div class="card">
        <h1>Edit User</h1>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST"
              action="{{ route('users.update', $user) }}"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <label>Username:</label><br>
            <input
                type="text"
                name="username"
                value="{{ old('username', $user->username) }}"
            >
            <br><br>

            <label>Full Name:</label><br>
            <input
                type="text"
                name="full_name"
                value="{{ old('full_name', $user->full_name) }}"
            >
            <br><br>

            <label>Email:</label><br>
            <input
                type="email"
                name="email"
                value="{{ old('email', $user->email) }}"
            >
            <br><br>

            <label>Replace Profile Picture:</label><br>
            <input type="file" name="avatar" accept="image/*">
            <br><br>

            @if ($user->avatar)
                <p>Current picture:</p>
                <img
                    src="{{ asset('storage/' . $user->avatar) }}"
                    width="120"
                    alt="Current avatar"
                >
                <br><br>
            @endif

            <button type="submit">Update User</button>
        </form>
    </div>
@endsection