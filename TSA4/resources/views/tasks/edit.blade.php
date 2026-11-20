@extends('layout')

@section('title', 'Edit Task')

@section('content')
    <div class="card">
        <h1>Edit Task</h1>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('tasks.update', $task) }}">
            @csrf
            @method('PUT')

            <label for="title">Task Title:</label><br>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $task->title) }}"
                required
            >
            <br><br>

            <label for="status">Status:</label><br>
            <select id="status" name="status" required>
                <option value="pending"
                    {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="done"
                    {{ old('status', $task->status) == 'done' ? 'selected' : '' }}>
                    Done
                </option>
            </select>
            <br><br>

            <label for="task_date">Task Date:</label><br>
            <input
                type="date"
                id="task_date"
                name="task_date"
                value="{{ old('task_date', $task->task_date->format('Y-m-d')) }}"
                required
            >
            <br><br>

            <button type="submit">Update Task</button>
        </form>
    </div>
@endsection