@extends('layout')

@section('title', 'Create User')

@section('content')
    <div class="card">
        <h1>Create User</h1>

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
              action="{{ route('users.store') }}"
              enctype="multipart/form-data">

            @csrf

            <label>Username:</label><br>
            <input type="text" name="username" value="{{ old('username') }}">
            <br><br>

            <label>Full Name:</label><br>
            <input type="text" name="full_name" value="{{ old('full_name') }}">
            <br><br>

            <label>Email:</label><br>
            <input type="email" name="email" value="{{ old('email') }}">
            <br><br>

            <label>Profile Picture:</label><br>
            <input type="file" name="avatar" accept="image/*">
            <br><br>

            <button type="submit">Save User</button>
        </form>
    </div>
@endsection