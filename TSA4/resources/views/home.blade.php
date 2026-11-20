@extends('layout')

@section('title', 'Tasks for Today')

@section('content')
    <div class="card">
        <h1>Tasks for Today</h1>

        @forelse ($tasks as $task)
            <p>
                <strong>{{ $task->title }}</strong><br>
                Status: {{ $task->status }}<br>
                Date: {{ $task->task_date }}
            </p>
            <hr>
        @empty
            <p>No tasks scheduled for today.</p>
        @endforelse
    </div>
@endsection