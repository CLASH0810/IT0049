@extends('layout')

@section('title', 'User Accounts')

@section('content')
    <div class="card">
        <h1>User Accounts</h1>

        @if (session('success'))
            <p style="color: green;">
                {{ session('success') }}
            </p>
        @endif

        <a href="{{ route('users.create') }}">
            <button type="button">Add User</button>
        </a>

        <br><br>

        <table>
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>
                            @if ($user->avatar)
                                <img
                                    src="{{ asset('storage/' . $user->avatar) }}"
                                    width="80"
                                    height="80"
                                    alt="{{ $user->full_name }}"
                                    style="object-fit: cover; border-radius: 50%;"
                                >
                            @else
                                <img
                                    src="https://placehold.co/80x80?text=No+Image"
                                    width="80"
                                    height="80"
                                    alt="No avatar"
                                    style="border-radius: 50%;"
                                >
                            @endif
                        </td>

                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->full_name }}</td>
                        <td>{{ $user->email }}</td>

                        <td>
                            <a href="{{ route('users.edit', $user) }}">
                                Edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No user records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection