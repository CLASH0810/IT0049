@extends('layout')

@section('title', 'Task List')

@section('content')
    <div class="card">
        <h1>Full Task List</h1>

        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Task Date</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->task_date }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No tasks found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection