@extends('layout')

@section('title', 'Create Task')

@section('content')
    <div class="card">
        <h1>Create Task</h1>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf

            <label for="title">Task Title:</label><br>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title') }}"
                required
            >
            <br><br>

            <label for="status">Status:</label><br>
            <select id="status" name="status" required>
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>
                    Done
                </option>
            </select>
            <br><br>

            <label for="task_date">Task Date:</label><br>
            <input
                type="date"
                id="task_date"
                name="task_date"
                value="{{ old('task_date') }}"
                required
            >
            <br><br>

            <button type="submit">Save Task</button>
        </form>
    </div>
@endsection