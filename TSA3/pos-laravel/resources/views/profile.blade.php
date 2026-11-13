@extends('layout')

@section('title', 'Profile')

@section('content')
    <div class="card">
        <h1>User Profile</h1>

        @if ($user)
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Full Name:</strong> {{ $user->full_name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        @else
            <p>No user record found.</p>
        @endif
    </div>
@endsection