@extends('layout')

@section('title', 'Task Details')

@section('content')
    <div class="card">
        <h1>Task Details</h1>

        <p>
            <strong>Title:</strong>
            {{ $task->title }}
        </p>

        <p>
            <strong>Status:</strong>
            {{ ucfirst($task->status) }}
        </p>

        <p>
            <strong>Task Date:</strong>
            {{ $task->task_date->format('F d, Y') }}
        </p>

        <p>
            <strong>Archived:</strong>
            {{ $task->is_archived ? 'Yes' : 'No' }}
        </p>

        <a href="{{ route('tasks.index') }}">Back to Task List</a>

        @auth
            <br><br>

            <a href="{{ route('tasks.edit', $task) }}">
                Edit Task
            </a>

            <form
                method="POST"
                action="{{ route('tasks.destroy', $task) }}"
                style="margin-top: 15px;"
            >
                @csrf
                @method('DELETE')

                <button type="submit">
                    Archive Task
                </button>
            </form>
        @endauth
    </div>
@endsection