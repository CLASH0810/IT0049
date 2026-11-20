@extends('layout')

@section('title', 'Task List')

@section('content')
    <div class="card">
        <h1>Task List</h1>

        @if (session('success'))
            <p style="color: green;">
                {{ session('success') }}
            </p>
        @endif

        @auth
            <a href="{{ route('tasks.create') }}">
                <button type="button">Add Task</button>
            </a>
        @endauth

        <br><br>

        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Task Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>

                        <td>
                            {{ ucfirst($task->status) }}
                        </td>

                        <td>
                            {{ $task->task_date->format('F d, Y') }}
                        </td>

                        <td>
                            <a href="{{ route('tasks.show', $task) }}">
                                View
                            </a>

                            @auth
                                |
                                <a href="{{ route('tasks.edit', $task) }}">
                                    Edit
                                </a>

                                <form
                                    method="POST"
                                    action="{{ route('tasks.destroy', $task) }}"
                                    style="display: inline;"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit">
                                        Archive
                                    </button>
                                </form>
                            @endauth
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            No active tasks found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection